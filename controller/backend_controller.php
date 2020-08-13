<?php
include 'model/backend_model.php';
class Controller {

    function handleRequest(){
        $model = new backEndModel();
        $controller = isset($_GET['controller'])?$_GET['controller']:'home';
        $action = isset($_GET['action'])?$_GET['action']:'index';

        switch ($controller) {
            case 'home':
                # code...
                echo "HOME PAGE";
                break;
            case 'users':
                # code...
                $this->handleUser($action, $model);
                break;

            default:
                # code...
                break;
        }
    }

    function handleUser($action, $model) {
        switch ($action) {

            case 'list_users':
                $this->checkLoginSession();
                # code...
                $listUsers = $model->listUsers();
                include 'view/list_users.php';
                break;
            case 'delete_user':
                $id = $_GET['id'];
                if($model->deleteUser($id)===TRUE){
                    header("Location: admin.php?controller=users&action=list_users");
                }


            default:
                # code...
                break;
        }
    }


    function checkLoginSession() {
        if (!isset($_SESSION['login'])) {
            header("Location: admin.php?controller=users&action=login");
        }
    }






}
?>
