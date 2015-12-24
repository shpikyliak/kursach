<?php

class ModelPlan extends Model
{
    public function getPlan()
    {
        $db = new DB();

        return $db->getAllFrom('plan');
    }

    public function check($data)
    {
        try {
            $row = 0;
            for ($i = 0; $i < count($data); $i++) {
                $row++;
                if (isset($data[$i]['date'])) DataChecker::checkDate($data[$i]['date']);
                if (isset($data[$i]['amount_to_develop'])) DataChecker::checkAmount($data[$i]['amount_to_develop']);
                if (isset($data[$i]['id_size'])) DataChecker::checkSize($data[$i]['id_size']);
                if ($data[$i]['id_style']) DataChecker::checkStyle($data[$i]['id_style']);
                if (isset($data[$i]['manufactured'])) DataChecker::checkManufactured($data[$i]['manufactured'], $data[$i]['amount_to_develop']);
                if (isset($data[$i]['id_worker'])) DataChecker::checkWorker($data[$i]['id_worker']);


            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage() . 'в строчці ' . $row);
        }


        return true;

    }

    public function add($data)
    {
        $db = new DB();
        $db->addInTable($data, 'plan');
    }

    public function delete($data)
    {
        $db = new DB();
        for ($i = 0; $i < count($data); $i++) {
            $db->delete($data[$i], 'plan');
        }
    }

    public function exportXLSX($data)
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="plans.xlsx"');
        header('Cache-Control: max-age=0');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'Дата')
            ->setCellValue('C1', 'Количество')
            ->setCellValue('D1', 'Вид')
            ->setCellValue('E1', 'Размер')
            ->setCellValue('F1', 'Изготовлено')
            ->setCellValue('G1', 'Робочий');
        for ($i = 0; $i < count($data); $i++) {
            $y = $i + 2;
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $y, $data[$i]['id_plan'])
                ->setCellValue('B' . $y, $data[$i]['date'])
                ->setCellValue('C' . $y, $data[$i]['amount_to_develop'])
                ->setCellValue('D' . $y, $data[$i]['id_style'])
                ->setCellValue('E' . $y, $data[$i]['id_size'])
                ->setCellValue('F' . $y, $data[$i]['manufactured'])
                ->setCellValue('G' . $y, $data[$i]['id_worker']);
        }
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function update($data)
    {
        $db = new DB();
        foreach ($data as $key => $value) {
            $db->updateInTable($value, 'plan', $key);
        }
    }
}