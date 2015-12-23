<?php

class ControllerPlan extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelPlan();
    }
    public function actionIndex()
    {
        $data = $this->model->getPlan();
        $this->view->generate('PlanView.php', 'TableSingleView.php',$data);
    }
    public function actionAdd()
    {
        try{
            $this->model->check($_POST['data']);
            //$this->model->add($_POST['data']);
            //echo json_encode(array('success'=>'true'));
        }catch (Exception $e)
        {
            echo json_encode(array('error'=>$e->getMessage()));
        }

    }
}