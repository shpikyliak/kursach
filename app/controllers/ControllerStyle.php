<?php

class ControllerStyle extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelStyle();
    }
    public function actionIndex()
    {
        $data = $this->model->getStyle();
        $this->view->generate('StyleView.php', 'TableSingleView.php',$data);
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
        try {
            $this->model->delete($_POST['data']);
            echo json_encode(array('success' => 'true'));
        } catch (Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
    public function actionExport()
    {
        $data = $this->model->getStyle();
        $this->model->exportXLSX($data);
    }

    public function actionUpdate()
    {

        try {
            $this->model->check($_POST['data']);
            $this->model->update($_POST['data']);
            echo json_encode(array('success'=>'true'));
        } catch (Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
}