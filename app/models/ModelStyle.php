<?php

class ModelStyle extends Model
{
    public function getStyle()
    {
        $db = new DB();

        return $db->getAllFrom('style');
    }
}