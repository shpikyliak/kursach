<?php

class ControllerSize extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelDefect();
    }
    public function actionIndex()
    {
        $data = $this->model->getSize();
        $this->view->generate('SizeView.php', 'TableSingleView.php',$data);
    }
    public function actionExport()
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="sizes.xlsx"');
        header('Cache-Control: max-age=0');

        $data = $this->model->getSize();
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'id')
                    ->setCellValue('B1', 'Размер');

        for ($i=0;$i<count($data);$i++){
            $y = $i + 2;

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$y, $data[$i]['id_size'])
                        ->setCellValue('B'.$y, $data[$i]['size']);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }
}