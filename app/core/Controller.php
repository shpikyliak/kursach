<?php

/**
 * Created by PhpStorm.
 * User: shpikyliak
 * Date: 08.12.15
 * Time: 22:45
 */
class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {

    }
}