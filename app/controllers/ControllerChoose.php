<?php

/**
 * Created by PhpStorm.
 * User: shpikyliak
 * Date: 24.12.15
 * Time: 10:42
 */
class ControllerChoose extends  Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelChoose();
    }
    public  function actionWorkerAZ()
    {

        $data = $this->model->getWorkerAZ();
        $this->view->generate('WorkerAZView.php','ChooseView.php',$data);
    }
    public  function actionDefectToType()
    {
        $data = $this->model->getDefectToType();
        $this->view->generate('DefectToTypeView.php','ChooseView.php',$data);
    }



}