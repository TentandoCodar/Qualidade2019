<?php 
    if(isset($_POST['id'])) {
        require 'config/Consts.php';
        require 'Classes/User.php';
        $id = $_POST['id'];
        $user = new User();
        $user -> makeAdmin($id);
        header('Location: admin.php');
        exit;

    }

    else {
        header('Location: admin.php');
    }

?>