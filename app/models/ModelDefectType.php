<?php

class ModelDefectType extends Model
{
    public function getDefectType()
    {
        $db = new DB();

        return $db->getAllFrom('defect_type');
    }
}