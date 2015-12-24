<?php

class Export
{
    public function toXml($data)
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="workers.xlsx"');
        header('Cache-Control: max-age=0');


        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'Имя')
            ->setCellValue('C1', 'Фамилия');

        for ($i = 0; $i < count($data); $i++) {
            $y = $i + 2;

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $y, $data[$i]['id_worker'])
                ->setCellValue('B' . $y, $data[$i]['name'])
                ->setCellValue('C' . $y, $data[$i]['second_name']);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

}