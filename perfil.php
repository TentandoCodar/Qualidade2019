<?php 
    session_start();

    if(isset($_SESSION['user'])) {
        require 'config/Consts.php';
        require 'Classes/User.php';
        $id = $_SESSION['user'];

        $User = new User();
        
        $userData = $User -> index($id);

        
        
    }
    else {
        header('Location: login.php');
    }

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
        require 'php/functions.php';

        _header();
    
    ?>

    <main>
        <form>
            <input id="name" type="text" name="name" value='<?php echo $userData['name'];?>'>
            <input id="email" type="email" name="email" value='<?php echo $userData['email'];?>'>
            <input id="user" type="text" name="user" value='<?php echo $userData['user'];?>'>
            <input id="phone" type="number" name="phone" value='<?php echo $userData['phone'];?>'>
            <input type="password" id="new_pass" name="new_pass" value="" placeholder="Nova senha">
            <input type="password" id="pass" name="pass" value="" placeholder="Senha atual">
            <input id="Edit" type="submit" value="Editar">
            <input id="Delete" type="submit" value="Deletar">
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        
        $('#Edit').on('click', () => {
            event.preventDefault();
            const name = $('#name').val();
            const email = $('#email').val();
            const user = $('#user').val();
            const phone = $('#phone').val();
            const pass = $('#pass').val();
            const new_pass = $('#new_pass').val();
            
            $.ajax({
                method:'POST',
                url: './editAction.php',
                data: {name,email,user,phone,new_pass, pass}
            }).success((msg) => {
                console.log(msg);
            }).fail((err) => {
                console.log("Deu errado");
                console.log(err);
            })
        })

        $('#Delete').on('click', () => {
            event.preventDefault();
            $.ajax({
                method:'POST',
                url: 'deleteAction.php',
                
            }).done((msg) => {
                document.location.href = "authLogout.php";
            }).fail((err) => {
                console.log("Deu errado");
                console.log(err);
            })
        })
    </script>
</body>


</html>