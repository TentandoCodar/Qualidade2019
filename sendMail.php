

<?php
  require('php/functions.php');
  if(isset($_POST['Email']) && isset($_POST['Content']) && $_POST['Type']){
    $Content = $_POST['Email'].' enviou uma menssagem-------------> '.$_POST['Content'];
    email('bibliotecaalexandriagrupo18@gmail.com','',$_POST['Type'],$Content);
    header('location:index.php');

  }
  else{
    header('location:index.php');
  }











 ?>
