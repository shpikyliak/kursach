<?php

class ModelDefect extends Model
{
    public function getDefect()
    {
        $db = new DB();

        return $db->getAllFrom('defect');
    }
}