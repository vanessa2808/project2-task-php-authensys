<?php
include 'model/frontend_model.php';
include 'libs/function.php';
class FrontendControler {

    function handleRequest(){
        $frontModel = new Model();
        $libs = new LibCommon();

        $controller = isset($_GET['controller'])?$_GET['controller']:'front';
        $action = isset($_GET['action'])?$_GET['action']:'home';

        switch ($controller) {
            case 'front':
                $this->handleFront($action, $frontModel, $libs);
                break;

            case 'users':
                $this->handleUsers($action, $frontModel, $libs);
                break;
            default:
                # code...
                break;
        }
    }

    function handleFront($action, $frontModel, $libs){

    }


    function checkLoginSession() {
        if (!isset($_SESSION['login'])) {
            header("Location: index.php?controller=users&action=login");
        }
    }

    function handleUsers($action, $frontModel, $libs){
        switch ($action) {
            case 'login':
                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);
                    $checklogin = $frontModel->login($email, $password);
                    if ($checklogin->num_rows > 0) {
                        $role_id = $checklogin->fetch_assoc();
                        $login['email'] = $email;
                        $login['role_id'] = $role['role_id'];
                        $_SESSION['login'] = $login;
                        header("Location: index.php");
                    }
                }
                include 'view/login.php';
                # code...
                break;
            case 'register':
                if (isset($_POST['register'])) {

                    $name = $_POST['name'];
                    $password = md5($_POST['password']);
                    $address = $_POST['address'];
                    $role_id = 1;
                    $email = $_POST['email'];
                    if ( $frontModel->register($name, $password, $role_id, $address, $email) === TRUE);
                    $_SESSION['email'] = $email;
                    $login['role_id'] = $role_id;
                    $_SESSION['login'] = $login;
                    $libs->redirectPage('index.php?controller=front&action=home');
                }


                include 'view/register.php';
                break;

            case 'logout':
                unset($_SESSION['login']);
                session_destroy();
                $libs->redirectPage('index.php?controller=front&action=home');
                break;
            default:
                # code...
                break;
        }
    }

    function handleNews($action, $frontModel, $libs){

    }

}
?>
