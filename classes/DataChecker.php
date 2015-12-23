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
        if ($manufactured>$amountToDevelop) throw new Exception('Неправильно введено кількість виготовлених ');
    }
    static function checkWorker($worker)
    {
        $sql = ['field' => 'id_worker', 'value' => $worker];
        $db = new DB();
        $data = $db->getOneFrom($sql, 'worker');
        if ($data['id_worker'] != $worker) throw new Exception('Неправильно введений робітник ');
    }

}