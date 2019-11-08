<?php
    session_start();
    if(isset($_POST['data']) && isset($_POST['password'])) {
        require 'Classes/User.php';
        require 'config/Consts.php';
        $data = $_POST['data'];
        $password = $_POST['password'];
        $user = new User();
        $return = $user -> login($data,md5($password));
        if($return['count'] == 1) {
            if($return['admin'] == false) {
                $_SESSION['user'] = 1;
                $_SESSION['admin'] = $return['id'];
                header('Location: acervo.php');
            }
            else {
                $_SESSION['user'] = 1;
                header('Location: Admin.php');
            }
        }
        else {
            header('Location: login.php');
        }
    }
    else {
        echo "Nao tem dados";
        exit;
    }


?>
