<?php

class ControllerPlan extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelPlan();
    }
    public function actionIndex()
    {
        $data = $this->model->getPlan();
        $this->view->generate('PlanView.php', 'TableSingleView.php',$data);
    }
    public function actionAdd()
    {
        try{
            $this->model->check($_POST['data']);
            //$this->model->add($_POST['data']);
            //echo json_encode(array('success'=>'true'));
        }catch (Exception $e)
        {
            echo json_encode(array('error'=>$e->getMessage()));
        }

    }
    public function actionExport()
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="plans.xlsx"');
        header('Cache-Control: max-age=0');

        $data = $this->model->getPlan();
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'id')
                    ->setCellValue('B1', 'Дата')
                    ->setCellValue('C1', 'Количество')
                    ->setCellValue('D1', 'Вид')
                    ->setCellValue('E1', 'Размер')
                    ->setCellValue('F1', 'Изготовлено')
                    ->setCellValue('G1', 'Робочий');

        for ($i=0;$i<count($data);$i++){
            $y = $i + 2;

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$y, $data[$i]['id_plan'])
                        ->setCellValue('B'.$y, $data[$i]['date'])
                        ->setCellValue('C'.$y, $data[$i]['amount_to_develop'])
                        ->setCellValue('D'.$y, $data[$i]['id_style'])
                        ->setCellValue('E'.$y, $data[$i]['id_size'])
                        ->setCellValue('F'.$y, $data[$i]['manufactured'])
                        ->setCellValue('G'.$y, $data[$i]['id_worker']);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
}