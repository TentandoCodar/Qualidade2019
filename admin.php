<?php 
    session_start();
    if(!isset($_SESSION['admin'])) {
        header('Location: login.php');
    }

    require 'Classes/User.php';
    require 'config/Consts.php';

    $user = new User();

    $data = $user -> adminReceiveUsers();

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="imgs\logos\Tmod18_Logo_Egipcia2.png" type="image/ico">
    <meta charset="UTF-8">
    <meta name="description" content="O site da Biblioteca Alexandria">
    <meta name="keywords" content="Biblioteca, Alexandria, Ensino, Livro">
    <meta name="author" content="MSG-5672">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">


    <link rel="stylesheet" type="text/css" href="css/master.css">
</head>
<body>
    <?php
        require('php/functions.php');

        _header();

    // <ul class="nav flex-column col-sm-2">
    //
    // <li class="sub nav-item">
    //   <label class="container-checkbox aventura">Aventura
    //     <input type="checkbox">
    //     <span class="checkmark"></span>
    //   </label>
    // </li>
    ?>

    <main>
        <?php 
            foreach($data as $value) {
                echo "<form action='makeAdmin.php' method='POST'>
                    <input  hidden name='id' value=".$value['id'].">
                    <h3>".$value['email']."</h3>
                    <input type='submit' value='tornar administrador'>
                </form>
                
                
                
                ";
            }
        
        
        ?>
    
    
    </main>
</body>
</html>