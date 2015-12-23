<?php

class DataChecker
{

    static function checkDate($date)
    {
        $parts = explode('-',$date);
        if (count($parts)!=3) throw new Exception('Неправильно введена дата');
    }
    static function checkAmount($amount)
    {
        if (!preg_match('/^[\d]*$/', $amount)) throw new Exception('Неправильно введена кількість');
    }
    static function checkStyle($style)
    {
        $sql = ['field'=>'id_style','value'=>$style];
        $db = new DB();
        $data = $db->getOneFrom($sql,'style');
        var_dump($data);
    }

}