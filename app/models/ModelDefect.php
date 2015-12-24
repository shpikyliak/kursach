<?php

class ModelDefect extends Model
{
    public function getDefect()
    {
        $db = new DB();

        return $db->getAllFrom('defect');
    }

    public function check($data)
    {
        try {
            $row = 0;
            for ($i = 0; $i < count($data); $i++) {
                $row++;
                DataChecker::checkDefectType($data[$i]['id_defect_type']);
                DataChecker::checkPlan($data[$i]['id_plan']);
                DataChecker::checkAmountDefect($data[$i]['amount'], $data[$i]['id_plan']);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage() . 'в строчці ' . $row);
        }
    }

    public function add($data)
    {
        $db = new DB();
        $db->addInTable($data, 'defect');
    }

    public function export($data)
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="defects.xlsx"');
        header('Cache-Control: max-age=0');
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
    public function delete($data)
    {
        $db = new DB();
        for ($i = 0; $i < count($data); $i++) {
            $db->delete($data[$i], 'defect');
        }
    }
    public function update($data)
    {
        $db = new DB();
        foreach ($data as $key => $value) {
            $db->updateInTable($value, 'defect', $key);
        }
    }
}