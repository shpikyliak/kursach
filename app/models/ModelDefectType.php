<?php

class ModelDefectType extends Model
{
    public function getDefectType()
    {
        $db = new DB();

        return $db->getAllFrom('defect_type');
    }
    public function check($data)
    {
        $db = new DB();
        $table =  $db->getAllFrom('defect_type');
        foreach($data as $key => $value){
            for ($j=0;$j<count($table);$j++)
            {
                if ($value['defect_type']==$table[$j]['defect_type'])
                {
                    throw new Exception('Вид брака '.$value['defect type'].' уже существует!');
                }
            }
        }
        return true;
    }

    public function add($data)
    {
        $db = new DB();
        $db->addInTable($data, 'defect_type');
    }

    public function exportXLSX($data)
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="defect_types.xlsx"');
        header('Cache-Control: max-age=0');

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
    public function delete($data)
    {
        $db = new DB();
        for ($i = 0; $i < count($data); $i++) {
            $db->delete($data[$i], 'defect_type');
        }
    }
    public function update($data)
    {
        $db = new DB();
        foreach ($data as $key => $value) {
            $db->updateInTable($value, 'defect_type', $key);
        }
    }
}