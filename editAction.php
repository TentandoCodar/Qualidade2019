<?php 
    if(isset($_POST['email']) && $_POST['user']  && $_POST['pass']
        && isset($_POST['name']) && isset($_POST['phone'])
    )
    
    {
        session_start();
        require 'Classes/User.php';
        require 'config/Consts.php';
        $new_pass = '';

        if(isset($_POST['new_pass'])) {
            $new_pass = md5($_POST['new_pass']);
        }

        $id = $_SESSION['user'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);
        $name = $_POST['name'];
        $phone = $_POST['phone'];

        $User = new User();
        $return = $User -> update($name,$email, $phone,$user, $pass,$new_pass, $id);
        
        echo $return;
        exit;
    }
    else {
        echo "Error, data is incorrect";
        exit;
    }

?>