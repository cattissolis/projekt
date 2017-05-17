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
        //Visar allt från databasen 
       $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($page))
            require('view/viewDjur.php');
        elseif ($page === "view") {
                header('Location: /projektarbete.dev/index.php');
                exit();
            
            require('view/viewDjur.php');
        } elseif ($page === 'create') {
            require('view/djurCreate.php');
       
       //gör det möjligt att addera/lägga till djur till databasen
        } elseif ($page === 'add') {
            $djur = new Djur($_POST['name'], $_POST['year'], $_POST['legs'], $_POST['type']);
            $success = $this->createDjur($djur);
            header('Location: /projektarbete.dev/index.php');
            
        
        //tar bort objekten från databasen 
        } elseif ($page === 'delete') {
            $id = $_GET['id'];
            $this->deleteById($id);
            header('Location: /projektarbete.dev/index.php');
            exit;
        }
    } 
    
    //public function använder jag i model.php, 
    //där kopplar jag funktionerna till databasen, genom att använda mig av SQL-quieres. 
    public function getAllDjur()
    {
        return $this->model->getAllDjur();
    }
   
     public function deleteById($id){
        return $this->model->deleteById($id);
    }
    public function createDjur($djur){
        return $this->model->createDjur($djur);
    }
}