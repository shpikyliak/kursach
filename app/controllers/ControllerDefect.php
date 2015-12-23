<?php

class ControllerDefect extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelDefect();
    }
    public function actionIndex()
    {
        $data = $this->model->getDefect();
        $this->view->generate('DefectView.php', 'TableSingleView.php',$data);
    }
    public function actionExport()
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="defects.xlsx"');
        header('Cache-Control: max-age=0');

        $data = $this->model->getDefect();
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'id')
                    ->setCellValue('B1', 'id плана')
                    ->setCellValue('C1', 'Вид брака')
                    ->setCellValue('D1', 'Количество');

        for ($i=0;$i<count($data);$i++){
            $y = $i + 2;

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$y, $data[$i]['id_defect'])
                        ->setCellValue('B'.$y, $data[$i]['id_plan'])
                        ->setCellValue('C'.$y, $data[$i]['id_defect_type'])
                        ->setCellValue('D'.$y, $data[$i]['amount']);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }
}