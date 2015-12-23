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
                DataChecker::checkStyle($data[$i]['style']);
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

}