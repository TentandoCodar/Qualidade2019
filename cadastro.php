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

        if(isset($_SESSION['user'])) {
            header('Location: acervo.php');
        }
        require('php/functions.php');

        _header();
    
    ?>
    <br>
    <main>
        <form action="signUpAction.php" method="POST">
            <input type="text" name="name" placeholder="Digite seu nome">
            <input type="email" name="email" placeholder="Digite seu email">
            <input type="text" name="user" placeholder="Digite seu usuario">
            <input type="number" name="phone" placeholder="Digite seu telefone">
            <input type="password" name="password" placeholder="Digite sua senha">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>