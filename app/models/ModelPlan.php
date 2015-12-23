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
        try{
            $row = 0;
            for($i=0;$i<count($data);$i++)
            {
                $row++;
                DataChecker::checkDate($data[$i]['date']);
                DataChecker::checkAmount($data[$i]['amount_to_develop']);
                DataChecker::checkStyle($data[$i]['id_style']);
                DataChecker::checkSize($data[$i]['id_size']);
                DataChecker::checkManufactured($data[$i]['manufactured'],$data[$i]['amount_to_develop']);
                DataChecker::checkWorker($data[$i]['id_worker']);
            }
        }catch (Exception $e)
        {
            throw new Exception($e->getMessage().'в строчці '.$row);
        }


        return true;

    }
    public function add($data)
    {
        $db = new DB();
        $db->addInTable($data,'plan');
    }
    public function delete($data)
    {
        $db = new DB();
        for ($i = 0; $i < count($data); $i++) {
            $db->delete($data[$i], 'plan');
        }
    }
}