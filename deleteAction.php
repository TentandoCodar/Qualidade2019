<?php 
    
        session_start();
    
        require 'Classes/User.php';
        require 'config/Consts.php';


        $User = new User();

        $id = $_SESSION['user'];

        $User -> delete($id);
        echo 'Usuario: '.$id.' deletado';
        exit;


?>