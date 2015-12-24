<?php

class ModelStyle extends Model
{
    public function getStyle()
    {
        $db = new DB();

        return $db->getAllFrom('style');
    }
    public function check($data)
    {

        $db = new DB();
        $table =  $db->getAllFrom('style');
        foreach($data as $key => $value){
            for ($j=0;$j<count($table);$j++)
            {
                if ($value['style']==$table[$j]['style'])
                {
                    throw new Exception('Вид '.$value['style'].' уже существует!');
                }
            }
        }
        return true;

    }
    public function add($data)
    {
        $db = new DB();
        $db->addInTable($data,'style');
    }
    public function exportXLSX($data)
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="styles.xlsx"');
        header('Cache-Control: max-age=0');
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
    public function update($data)
    {

        $db = new DB();
        foreach($data as $key=>$value)
        {
            $db->updateInTable($value,'style',$key);
        }
    }
    public function delete($data)
    {
        $db = new DB();
        for($i=0;$i<count($data);$i++)
        {
            $db->delete($data[$i],'style');
        }

    }
}