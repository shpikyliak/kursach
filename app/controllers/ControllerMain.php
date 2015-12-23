<?php


class ControllerMain extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelMain();
    }
    //
    //default
    //
    public function actionIndex()
    {
        $data = $this->model->getDataAll();
        $this->view->generate('MainView.php', 'TemplateView.php',$data);

    }

    public function actionGet()
    {
        $data=$this->model->getTable($_GET['table']);
        echo (json_encode($data));
    }

}