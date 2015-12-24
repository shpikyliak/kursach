<?php

class ModelDefect extends Model
{
    public function getSize()
    {
        $db = new DB();

        return $db->getAllFrom('size');
    }
    public function check($data)
    {
        $db = new DB();
        $table =  $db->getAllFrom('size');
        foreach($data as $key => $value){
            for ($j=0;$j<count($table);$j++)
            {
                if ($value['size']==$table[$j]['size'])
                {
                    throw new Exception('Размер '.$value['size'].' уже существует!');
                }
            }
        }
        return true;

    }
    public function add($data)
    {
        $db = new DB();
        $db->addInTable($data,'size');
    }
    public function delete($data)
    {

        $db = new DB();
        for($i=0;$i<count($data);$i++)
        {
            $db->delete($data[$i],'size');
        }

    }
    public function update($data)
    {
        $db = new DB();
        foreach($data as $key=>$value)
        {
            $db->updateInTable($value,'size',$key);
        }
    }
    public function exportXLSX($data)
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="sizes.xlsx"');
        header('Cache-Control: max-age=0');
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