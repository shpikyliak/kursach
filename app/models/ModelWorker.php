<?php

/**
 * Created by PhpStorm.
 * User: shpikyliak
 * Date: 23.12.15
 * Time: 00:11
 */
class ModelWorker extends Model
{
    public function getWorker()
    {
        $db = new DB();

        return $db->getAllFrom('worker');
    }
    public function check($data)
    {
        $db = new DB();
        $table =  $db->getAllFrom('worker');
        for($i=0;$i<count($data);$i++){
            for ($j=0;$j<count($table);$j++)
            {
                if ($data[$i]['name']==$table[$j]['name'] && $data[$i]['second_name']==$table[$j]['second_name'])
                {
                    throw new Exception('Работник '.$data[$i]["name"].' '.$data[$i]["second_name"].'уже существует!');
                }
            }
        }
        return true;

    }
    public function add($data)
    {
        $db = new DB();
        $db->addInTable($data,'worker');
    }
    public function delete($data)
    {
        $db = new DB();
        for($i=0;$i<count($data);$i++)
        {
            $db->delete($data[$i],'worker');
        }

    }

}