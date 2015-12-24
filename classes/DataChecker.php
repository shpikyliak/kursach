<?php

class DataChecker
{

    static function checkDate($date)
    {
        $parts = explode('-', $date);
        if (count($parts) != 3) throw new Exception('Неправильно введена дата ');
    }

    static function checkAmount($amount)
    {
        if (!preg_match('/^[\d]*$/', $amount)) throw new Exception('Неправильно введена кількість ');
    }

    static function checkStyle($style)
    {
        var_dump($style);
        $sql = ['field' => 'id_style', 'value' => $style];
        $db = new DB();
        $data = $db->getOneFrom($sql, 'style');
        if ($data['id_style'] != $style) throw new Exception('Неправильно введений вид ');

    }

    static function checkSize($size)
    {
        $sql = ['field' => 'id_size', 'value' => $size];
        $db = new DB();
        $data = $db->getOneFrom($sql, 'size');
        if ($data['id_size'] != $size) throw new Exception('Неправильно введений розмір ');
    }

    static function checkManufactured($manufactured, $amountToDevelop)
    {
        if (!preg_match('/^[\d]*$/', $manufactured)) throw new Exception('Неправильно введено кількість виготовлених ');
        if ($manufactured > $amountToDevelop) throw new Exception('Неправильно введено кількість виготовлених ');
    }

    static function checkWorker($worker)
    {
        $sql = ['field' => 'id_worker', 'value' => $worker];
        $db = new DB();
        $data = $db->getOneFrom($sql, 'worker');
        if ($data['id_worker'] != $worker) throw new Exception('Неправильно введений робітник ');
    }

    static function checkDefectType($defect_type)
    {
        $sql = ['field' => 'id_defect_type', 'value' => $defect_type];
        $db = new DB();
        $data = $db->getOneFrom($sql, 'defect_type');
        if ($data['id_defect_type'] != $defect_type) throw new Exception('Неправильно введений тип ');
    }

    static function checkPlan($id_plan)
    {
        $sql = ['field' => 'id_plan', 'value' => $id_plan];
        $db = new DB();
        $data = $db->getOneFrom($sql, 'plan');
        if ($data['id_plan'] != $id_plan) throw new Exception('Неправильно введений номер плану ');
    }

    static function checkAmountDefect($amount, $id_plan)
    {
        $sql = ['field' => 'id_plan', 'value' => $id_plan];
        $db = new DB();
        $data = $db->getOneFrom($sql, 'plan');
        $amountSum = $db->sumAmount();
        if ($amountSum['id_plan'] == $id_plan) {
            if (intval($data['manufactured']) < intval($amount ) || ($amountSum['SUM(`amount`)'] + $amount) > intval($data['manufactured'])) {
                throw new Exception('Неправильно введений кількість ');
            }

        }
    }

}