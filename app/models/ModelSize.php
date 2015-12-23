<?php

class ModelDefect extends Model
{
    public function getSize()
    {
        $db = new DB();

        return $db->getAllFrom('size');
    }
}