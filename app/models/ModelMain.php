<?php


class ModelMain extends Model
{
    public $error;

    public function getDataAll()
    {
        $db = new DB();
        $all = $db->getAll();
        return $all;

    }

    public function getTable($table)
    {
        $db = new DB();
        $data = $db->getAllFrom($table);
        return $data;
    }
}