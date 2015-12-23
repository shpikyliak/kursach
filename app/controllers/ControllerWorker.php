<?php

class ControllerWorker extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelWorker();
    }
    public function actionIndex()
    {
        $data = $this->model->getWorker();
        $this->view->generate('WorkerView.php', 'TableSingleView.php',$data);

    }
    public function actionAdd()
    {
        try{
            $this->model->check($_POST['data']);
            $this->model->add($_POST['data']);
            echo json_encode(array('success'=>'true'));
        }catch (Exception $e)
        {
            echo json_encode(array('error'=>$e->getMessage()));
        }

    }
    public function actionDelete()
    {
        try{
            $this->model->delete($_POST['data']);
            echo json_encode(array('success'=>'true'));
        }catch (Exception $e)
        {
            echo json_encode(array('error'=>$e->getMessage()));
        }
    }
    public function actionExport()
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="workers.xlsx"');
        header('Cache-Control: max-age=0');

        $data = $this->model->getWorker();
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'id')
                    ->setCellValue('B1', 'Имя')
                    ->setCellValue('C1', 'Фамилия');

        for ($i=0;$i<count($data);$i++){
            $y = $i + 2;

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$y, $data[$i]['id_worker'])
                        ->setCellValue('B'.$y, $data[$i]['name'])
                        ->setCellValue('C'.$y, $data[$i]['second_name']);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
}