<?php
// session_start();
// include 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo/logo.png">
    <!-- BANNER LINK (TROCAR PARA DOWLOAD) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/keen-slider@6.6.10/keen-slider.min.css" />
    <!-- FIM DO LINK BANNER -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home_styles.css">
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Título -->
    <title>Chef Sobre Rodas</title>
</head>

<body id='body'>

    <?php require_once 'header.php' ?>


    <div class="bemvindo">

        <h5>Bem vindo </h5>
        <h5 style="color: #fff; margin-left: 10px;"> ao Chef!</h5>


    </div>

    <div class="textin">

        <h4 style="color: #fff;"> O trailer mais conhecido de Guaratinguetá criou um site para que você, cliente, do conforto <br> da sua casa possa comprar as nossas maravilhosas porções, lanches e bebidas.</h4>


    </div>

</div>

    <div class="container my-5">
            <!-- <div class="col-8">
                <div id="carouselExampleCaptions" class="carousel slide d-none d-lg-block" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/banners/8.jpg" class="w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="index.php?page=cardapio" class="bg-warning p-2 text-dark text-decoration-none rounded px-3">Eu quero</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/banners/10.jpg" class="w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="index.php?page=cardapio" class="bg-warning p-2 text-dark text-decoration-none rounded px-3">Eu quero</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/banners/12.jpg" class="w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="index.php?page=cardapio" class="bg-warning p-2 text-dark text-decoration-none rounded px-3">Eu quero</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/banners/11.jpg" class="w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="index.php?page=cardapio" class="bg-warning p-2 text-dark text-decoration-none rounded px-3">Eu quero</a>
                            </div>
                        </div>
                    </div>    
                </div>
            </div> -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                <img src="img/banners/8.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-block text-center p-2">
                        <p class="card-text">Os clássicos lanches, mas claro, com um sabor único que apenas o CHEFE sabe dar</p>
                        <a href="index.php?page=cardapio" class="bg-warning p-2 text-dark text-decoration-none rounded px-3">Eu quero</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <img src="img/banners/10.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-block text-center p-2">
                        <p class="card-text">Os combos mais loucos e incríveis que você vai encontrar, uma verdadeira explosão de sabores para você aproveitar</p>
                        <a href="index.php?page=cardapio" class="bg-warning p-2 text-dark text-decoration-none rounded px-3">Eu quero</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <img src="img/banners/12.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-block text-center p-2">
                        <p class="card-text">Lanche bom é aqui mesmo, sabor único? Aqui também!! Os melhores ingredientes, as melhores combinações</p>
                        <a href="index.php?page=cardapio" class="bg-warning p-2 text-dark text-decoration-none rounded px-3">Eu quero</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <img src="img/banners/11.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-block text-center p-2">
                        <p class="card-text">venha conhecer nosso Burguer mais pedido, tá todo mundo louco querendo comer ele, vai ficar sem experimentar essa?</p>
                        <a href="index.php?page=cardapio" class="bg-warning p-2 text-dark text-decoration-none rounded px-3">Eu quero</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <img src="img/banners/tuto.png">
    </div>
    
    <?php require_once 'footer.php' ?>


</body>

    <!-- Frameworks/Links -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.6.10/keen-slider.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="scripts/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>