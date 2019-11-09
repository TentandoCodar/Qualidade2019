<?php 
    if(isset($_POST['name']) 
    && isset($_POST['email'])
    && isset($_POST['user'])
    && isset($_POST['phone'])
    && isset($_POST['password'])
    )
    {
        require 'Classes/User.php';
        require 'config/Consts.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $phone = $_POST['phone'];
        $pass = $_POST['password'];
        $pass = md5($pass);
        $User = new User();

        $User -> signUp($email, $pass, $name, $phone, $user);
        header('Location: login.php');
    }

    else {
        header('Location: signUp.php');
    }


?>