<?php

class Controller
{
    private $model;
    public function __construct(PDO $db)
    {
        $this->model = new Model($db);
    }
    public function index()
    {

       $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($page))
            require('view/viewDjur.php');
        elseif ($page === "view") {
                header('Location: /projektarbete.dev/index.php');
                exit();
            
            require('view/viewDjur.php');
        } elseif ($page === 'create') {
            require('model/createDjur.php');
       
        } elseif ($page === 'add') {
            $djur = new Djur($_POST['name'], $_POST['year'], $_POST['legs'], $_POST['type']);
            $success = $this->createDjur($djur);
            header('Location: /projektarbete.dev/');
            exit;
        
        } elseif ($page === 'delete') {
            $id = $_GET['id'];
            $this->deleteById($id);
            header('Location: /projektarbete.dev/index.php');
            exit;
        }
    } 
    

    public function getAllDjur()
    {
        return $this->model->getAllDjur();
    }
    public function updateDjur(){
        return $this->model->updateDjur();
    }

    public function deleteById($id){
        return $this->model->deleteById($id);
    }

    public function createDjur($djur){
        return $this->model->createDjur($djur);
    }
}