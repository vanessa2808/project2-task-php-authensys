<?php
session_start();
ob_start();
?>
<?php

include 'controller/frontend_controller.php';

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
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
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
    $front = new FrontendControler();
    $front->handleRequest();
  ?>

</body>
</html>

