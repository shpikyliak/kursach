<?php

class ModelChoose extends Model
{
    public function getWorkerAZ()
    {
        $db = new DB();
        $data = $db->workerAZ();
        return $data;
    }
    public function getDefectToType()
    {
        $db = new DB();
        $data = $db->defectOnType();
        return $data;
    }
}