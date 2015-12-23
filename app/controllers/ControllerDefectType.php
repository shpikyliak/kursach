<?php

class ControllerDefectType extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelDefectType();
    }
    public function actionIndex()
    {
        $data = $this->model->getDefectType();
        $this->view->generate('DefectTypeView.php', 'TableSingleView.php',$data);
    }
    public function actionExport()
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="defect_types.xlsx"');
        header('Cache-Control: max-age=0');

        $data = $this->model->getDefectType();
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'id')
                    ->setCellValue('B1', 'Вид');

        for ($i=0;$i<count($data);$i++){
            $y = $i + 2;

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$y, $data[$i]['id_defect_type'])
                        ->setCellValue('B'.$y, $data[$i]['defect_type']);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }
}