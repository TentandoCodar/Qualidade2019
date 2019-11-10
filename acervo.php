
<?php

  session_start();
  if(isset($_SESSION['user'])) {

  }
  else {
    header('Location:login.php');
  }

  require 'Classes/Books.php';
  require 'config/Consts.php';

  $books = new Books();

  $return = $books -> index();

  $data = $return['data'];
  $numRows = $return['count'];


?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
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
  <body class="acervo">

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


      <div class="row">


        <ul class="nav flex-column col-sm-2" style="z-index: -1;">
          <li class="nav-item">

          </li>
          <li class="nav-item label">
            <h3>Filtro</h3>

          </li>

          <form action="acervo.php" method="post">
            <li class="sub nav-item">
              <label class="container-checkbox aventura">Aventura
                <input  name="Adventure" type="checkbox">
                <span class="checkmark"></span>
              </label>
            </li>
            <li class="sub nav-item">
              <label class="container-checkbox epico">Epico
                <input  name="Epic" type="checkbox">
                <span class="checkmark"></span>
              </label>
            </li>

            <li class="sub nav-item">
              <label class="container-checkbox romance">Romance
                <input  name="Romance" type="checkbox">
                <span class="checkmark"></span>
              </label>
            </li>
            <li class="sub nav-item">
              <label class="container-checkbox tragedia">Tragedy
                <input  name="Tragedy" type="checkbox">
                <span class="checkmark"></span>
              </label>
            </li>
            <li class="sub nav-item">
              <label class="container-checkbox poesia">Poetry
                <input  name="Poetry" type="checkbox">
                <span class="checkmark"></span>
              </label>
            </li>
            <!-- <input id="PlaceholderSearch" name="Filter" type="text" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon1">
            <input class="btn btn-light verde btn-pesquisa" type="submit" value="Aplicar" > -->

            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <input class="btn btn btn-light verde btn-pesquisa   btn-default" type="submit">Go!</input>
              </span>
            </div><!-- /input-group -->


          </form>


        </ul>

        <!-- <div class="card-container">
          <div class="card-image-frame">
              <img src="imgs/cp_22.png" class="card-img-top" alt="...">
          </div>

          <div class="card-text-frame">
            <div class="card-title"> <p class="card-text">exibe['name']</p> </div>

            <div class="card-paragraph"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </div>

            <div class="card-opt-title">   <a target="_blank" href="livros/pdf" tabindex="-1">Baixar</a> </div>
          </div>
        </div> -->


      <main class="card-list">
          <center>
            <ol class="custom-row">
              <?php 
                if($numRows > 0) {
                  foreach($data as $value) {
                    echo '<li class="custom-card-container custom-column">
                      <div class="custom-card-image-frame">
                          <img width="100%" src="imgs/'.'" alt="...">
                      </div>
                      <div class="custom-card-text-frame">
                        <div class="custom-card-title">'.$value['name'].'</div>
                        <div class="custom-card-paragraph"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </div>
                        <div class="custom-card-opt-title">   <a target="_blank" href="Download.php?book='.$value['pdf_path'].'&id='.$value['id'].'" tabindex="-1">Baixar</a> </div>
                      </div>
                    </li>';
                  }
                }
              
              ?>

            </ol>
          </center>
          <br>

        </main>
</div>
<?php

      if($numRows < 4){
        echo '<div style="height: 500px;"></div>';
      };

      _footer();

     ?>

  </body>
    <script src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
