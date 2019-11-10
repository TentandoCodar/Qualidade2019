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
        session_start();

        
        require('php/functions.php');

        _header();
    
    ?>

    <main>
        <form enctype="multipart/form-data" action="newBookAction.php" method="POST">
            <input type="text" name="name" placeholder="Digite o nome do livro" >
            <input type="text" name="tags" placeholder="Digite as tags do livro" >
            <input type="text" name="color" placeholder="Digite a cor do livro">
            <input type="text" name="description" placeholder="Digite a descrição do livro">
            <input type="text" name="author" placeholder="Digite a autor do livro">
            <input type="file" name="pdf" placeholder="Enviar arquivo">
            <input type="submit" value="Cadastrar" >
        </form>
    </main>
</body>
</html>