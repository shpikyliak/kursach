<?php

class ControllerStyle extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelStyle();
    }
    public function actionIndex()
    {
        $data = $this->model->getStyle();
        $this->view->generate('StyleView.php', 'TableSingleView.php',$data);
    }
    public function actionExport()
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="styles.xlsx"');
        header('Cache-Control: max-age=0');

        $data = $this->model->getStyle();
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'id')
                    ->setCellValue('B1', 'Вид');

        for ($i=0;$i<count($data);$i++){
            $y = $i + 2;

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$y, $data[$i]['id_style'])
                        ->setCellValue('B'.$y, $data[$i]['style']);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }
}