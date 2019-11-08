<?php
session_start();

if(!isset($_SESSION['Login'])){
  echo '
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark verde">
        <a class="navbar-brand" href="index.php"> <img src="imgs\logos\Tmod18_Logo_Branca.png" height="30px" alt=""> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="nos.php">Quem somos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="artigos.php">Artigos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contato.php">Fale Conosco</a>
            </li>


          </ul>

          <div class="my-2 my-lg-0">
            <a href="login.php" class="btn btn-outline-light" role="button" aria-pressed="true">Login</a>
          </div>

        </div>
      </nav>
  </header>



  ';
}
else{
  echo '
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark verde">
        <a class="navbar-brand" href="index.php"> <img src="imgs\logos\Tmod18_Logo_Branca.png" height="30px" alt=""> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="nos.php">Quem somos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="artigos.php">Artigos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contato.php">Fale Conosco</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="acervo.php">Acervo</a>
            </li>


          </ul>

          <div class="my-2 my-lg-0">
            <a href="authLogout.php" class="btn btn-outline-light" role="button" aria-pressed="true">Logout</a>
          </div>

        </div>
      </nav>
  </header>
  ';
}
?>
