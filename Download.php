<?php 
    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if(!isset($_GET['book']) || !isset($_GET['id'])) {
        header('Location: acervo.php');
    }

    require 'config/Consts.php';

    
    require 'Classes/Books.php';

    

    $books = new Books();
    $file_url = 'uploads/'.$_GET['book'];
    $id = $_GET['id'];
    

    $books -> download($id, $_SESSION['user']);

    header('Content-Type: application/pdf');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
    readfile($file_url);



?>