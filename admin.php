<?php
ob_start();
?>
<?php

include 'controller/backend_controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">MyWebPage</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a></li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                </ul>
            </li>
            <li><a href="#">Page 2</a></li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['login']['email'])){?>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hi, <?php echo $_SESSION['login']['email'];?></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?controller=users&action=logout" class="nav-link"> Logout</a><span class="caret"></span></a></li>
                    <li class="nav-item"><a href="admin.php?controller=users&action=list_users" class="nav-link">Manage</a></li>
                    <?php }else {?>


                        <li class="nav-item"><a href="index.php?controller=users&action=login" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="index.php?controller=users&action=register" class="nav-link">Register</a></li>
                    <?php }?>

                </ul>
            </li>






        </ul>







    </div>
</nav>


<?php
if(isset($_SESSION['login']) && $_SESSION['login']['role_id'] == 0){
    $backendController = new Controller();
    $backendController->handleRequest();
} else {
    header('Location: index.php');
}
?>

</body>
</html>

