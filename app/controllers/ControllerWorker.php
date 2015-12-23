<?php

class ControllerWorker extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelWorker();
    }
    public function actionIndex()
    {
        $data = $this->model->getWorker();
        $this->view->generate('WorkerView.php', 'TableSingleView.php',$data);

    }
    public function actionAdd()
    {
        try{
            $this->model->check($_POST['data']);
            $this->model->add($_POST['data']);
            echo json_encode(array('success'=>'true'));
        }catch (Exception $e)
        {
            echo json_encode(array('error'=>$e->getMessage()));
        }

    }
    public function actionDelete()
    {
        try{
            $this->model->delete($_POST['data']);
            echo json_encode(array('success'=>'true'));
        }catch (Exception $e)
        {
            echo json_encode(array('error'=>$e->getMessage()));
        }
    }
}