<?php
session_start();
include '../conexao.php';

// if (!isset($_SESSION['login'])) :
//     header('LOCATION: login.php');
//     die;
// endif;

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
    <link rel="stylesheet" href="../css/carrinho_styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Título -->
    <title>Chef Sobre Rodas</title>
</head>

<body>

    <div class="fundo">
          <!-- LOGIN EM FORMATO DE POPOUT -->
        <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" style="display: none; " aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Tomou? Dudu!!!</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form_alunos_login" action="logar.php" method="post">
                            <h1 class="mb-5 text-center text-black">Login <i class="bi bi-lock-fill" style="font-size: 50px;"></i></h1>
                            <div class="col-10 m-auto d-block text-black">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control" name="usu_login">
                            </div>
                            <div class="col-10 m-auto d-block text-black">
                                <label for="exampleInputPassword1" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="usu_senha">
                            </div>

                            <?php


                            $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
                            //echo $get['error'],
                            if (!empty($get['error'])) :

                                // echo "Login ou Senha inválidos";
                            ?>
                                <h6 class="text-danger text-center mb-3 mt-3">Login ou Senha inválidos</h6>
                            <?php

                            endif;

                            ?>
                            <div class="mb-3 mt-3 text-center">
                                <button type="submit" class="btn btn-primary" id="buttonmenu" value="Logar">Logar</button>
                            </div>
                            <div class="mb-3 mt-3 text-center">
                                <h6>Não possui login? <a href="login.php"> Cadastre-se!</a></h6>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN EM FORMATO DE POPOUT -->

        <section class="cover-main" id="home">
            <header>

                <nav class="nav-wrapper">
                    <div class="logo d-none d-xxl-block d-xl-block">
                        <!-- <a href="index.php"><img src="img/logo/CHEFE SOBRE RODAS LOGO (1).png"  style="width: 50px;"></a> -->
                        <a href="index.php">Chef Sobre Rodas</a>
                    </div>


                    <ul class="d-none d-xxl-block d-xl-block ">
                        <li><a href="index.php"><i class="bi bi-house" style="margin-right: 5px;"></i>Pagina Inicial</a></li>
                        <li><a href="cardapio.php"><i class="bi bi-list-ul" style="margin-right: 7px;"></i>Cardápio</a></li>
                        <li><a href="sobre.php"><i class="bi bi-geo-alt" style="margin-right: 5px;"></i>Sobre</a></li>
                        <li><a href="perfil.php"><i class="bi bi-person-circle" style="margin-right: 5px;"></i>Perfil</a></li>
                        <?php
                        if (isset($_SESSION['login'])) {
                        ?>
                            <li><a class="nav-link" href="carrinho.php" style="border-radius: 80px; background-color: #ffc90e; padding: 10px; padding-left: 30px; padding-right: 30px; color: #fff;"> Carrinho </a></li>
                        <?php
                        } else {
                        ?>
                            <!-- <li><a class="nav-link" href="carrinho.php" style="border-radius: 80px; background-color: #ffc90e; padding: 10px; padding-left: 30px; padding-right: 30px; color: #fff;"> Cadastre-se </a></li> -->

                            <li><button type="button" class="btn btn-primary" id="buttonmenu" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable" style="border-radius: 30px; background-color: #ffc90e; padding-left: 30px; padding-right: 30px; ">
                                    Logar
                                </button></li>

                        <?php
                        }
                        if (isset($_SESSION['login'])) :
                        ?>
                            <li><a href="logout.php" class="bi bi-box-arrow-left" style="margin-right: 5px;"></a></li>
                        <?php
                        endif;
                        ?>
                    </ul>
                    <div class="box d-xxl-none d-xl-none">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <!-- <span class="navbar-toggler-icon" style="width:40px; height:40px; background-color: #fff;">MENU</span> -->
                            <ion-icon name="menu-outline"></ion-icon>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav" style="display: flex; text-align:right;">
                                <a class="nav-link active" aria-current="page" href="index.php">Pagina Inicial</a>
                                <a class="nav-link" href="cardapio.php">Cardápio</a>
                                <a class="nav-link" href="sobre.php">Sobre</a>
                                <a class="nav-link" href="perfil.php">Perfil</a>
                                <?php
                                if (isset($_SESSION['login'])) {
                                ?>
                                    <a class="nav-link" href="carrinho.php" style="border-radius: 30px; background-color: #ffc90e; padding-left: 8px; padding-right: 8px; "> Carrinho </a>
                                <?php
                                } else {
                                ?>
                                    <!-- <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable" style="border-radius: 30px; background-color: #ffc90e; padding-left: 8px; padding-right: 8px; "> Cadastre-se </a> -->

                                    <button type="button" class="btn btn-primary" id="buttonmenu" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable" style="border-radius: 30px; background-color: #ffc90e; padding-left: 8px; padding-right: 8px; margin-left: 30px;">
                                        Logar
                                    </button>

                                <?php
                                }
                                if (isset($_SESSION['login'])) :
                                ?>
                                    <a class="nav-link" href="logout.php">Logout</a>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>




                </nav>
            </header>
        </section>
        <div class="bemvindo">

            <h5 style="color: #fff;"> </h5>
            <h5 style=" margin-left: 10px;">Carrinho </h5>



        </div>



        <div class="textin">
            <h4 style="color: #fff; border: none;">O que desejas?</h4>
        </div>
















        <!-- Footer -->
        <footer>
            <div class="footer-content">
                <h2>Chef Sobre Rodas</h2>
                <div class="links">
                    <p>
                        <a href="index.php" style="border-right: #ffc90e solid 1px; padding-right: 20px;">Home</a>
                        <a href="sobre.php" style="border-right: #ffc90e solid 1px; padding-right: 20px;">Sobre nós</a>
                        <a href="perfil.php">Minha conta</a>
                    </p>
                </div>
                <div class="foot-icons">
                    <a href="sobre.php">
                        <ion-icon name="logo-whatsapp"></ion-icon>
                    </a>
                    <a href="https://pt-br.facebook.com/chefsobrerodasfood/">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="https://www.instagram.com/chefsobrerodas/">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </div>
                <p class="copyright">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> Todos os direitos reservados |
                    <i class="ion-ios-heart" aria-hidden="true"></i>
                    <a href="https://chefesobrerodas" target="_blank" style="text-decoration: none;">Chefesobrerodas.com</a>
                </p>
            </div>
        </footer>
    </div>


    <!-- Frameworks/Links -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.6.10/keen-slider.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="scripts/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>