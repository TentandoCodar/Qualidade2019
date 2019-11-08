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
  <body class="artigos">

    <?php
      require('php/functions.php');
      session_start();
      _header();



     ?>
  <center>
      <main class=" col-sm">

            <h1 style="color: white">Confira as Noticias do mundo da literatura</h1>


              <div class="card mb-3">
                  <img src="imgs/art_euclides.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Euclides da Cunha. Os sertões, testemunho e apocalipse</h5>
                    <p class="card-text">A Biblioteca Nacional inaugurou a exposição “Euclides da Cunha. Os sertões, testemunho e apocalipse” no último dia 4 de julho por ocasião dos 110 anos da morte do escritor.</p>
                    <p class="card-text"><a href="https://www.bn.gov.br/acontece/exposicoes/2019/07/euclides-cunha-sertoes-testemunho-apocalipse" class="text-muted">Ler mais</a></p>
                  </div>
                </div>

              <div class="card mb-3">
                  <img src="imgs/art_premio.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Biblioteca Nacional divulga os vencedores do Prêmio Literário</h5>
                    <p class="card-text">Nesta segunda-feira, 27 de novembro, a Biblioteca Nacional divulgou os nomes dos vencedores do Prêmio Literário Biblioteca Nacional em suas nove categorias, com destaque para ao autor J.P. Cuenca, com “Descobri que estava morto”, obra editada pela Tusques Editores.</p>
                    <p class="card-text"><a href="https://www.bn.gov.br/acontece/noticias/2017/11/biblioteca-nacional-divulga-vencedores-premio" class="text-muted">Ler mais</a></p>
                  </div>
                </div>

              <div class="card mb-3">
                  <img src="imgs/art_chico.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Chico Buarque é o grande vencedor do Prêmio Camões 2019</h5>
                    <p class="card-text">O músico, dramaturgo, escritor e autor brasileiro Chico Buarque de Hollanda é o grande vencedor da 31ª edição do Prêmio Camões. O anúncio foi feito nesta terça-feira, 21 de maio, às 16h, no prédio sede da Biblioteca Nacional, no Rio de Janeiro, pelos membros do júri composto por seis integrantes após reunião que durou pouco mais de uma hora.</p>
                    <p class="card-text"><a href="https://www.bn.gov.br/acontece/noticias/2019/05/chico-buarque-grande-vencedor-premio-camoes-2019" class="text-muted">Ler mais</a></p>
                  </div>
                </div>


              <div class="card mb-3">
                  <img src="imgs/art_manus.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Frederico Abdalla e o manuscrito inédito do pseudônimo Boniface Bellons</h5>
                    <p class="card-text">O pesquisador Frederico Tavares de Mello Abdalla, bolsista do Programa Nacional de Apoio à Pesquisa da Biblioteca Nacional, realiza, em sua pesquisa, a transcrição e análise de um manuscrito inédito intitulado ‘Description of a Voyage to Bahia’, sob autoria do pseudônimo britânico Boniface Bellons. Trata-se de um relato de viagem Inglaterra-Brasil (1824), guardado no acervo da Biblioteca Nacional, e até o presente momento totalmente desconhecido dos estudiosos.</p>
                    <p class="card-text"><a href="https://www.bn.gov.br/acontece/noticias/2019/06/frederico-abdalla-manuscrito-inedito-pseudonimo" class="text-muted">Ler mais</a></p>
                  </div>
                </div>

        </main>
         </center>
</div>
    <?php _footer(); ?>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
