<div class="fundo">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <link rel="stylesheet" href="css/header_styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <?php


    $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
    //echo $get['error'],
    if (!empty($get['error'])) :

        // echo "Login ou Senha inválidos";
    ?>
        <script>
            $(document).ready(function() {
                $('#exampleModalCenteredScrollable').modal('show');
            });
        </script>
    <?php

    endif;
    ?>

    <!-- LOGIN EM FORMATO DE POPOUT -->
    <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" style="display: none; " aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffc90e !important;">
                    <!-- <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Tomou? Dudu!!!</h5> -->
                    <h3 class="text-center text-black" style="font-family: 'Poppins', sans-serif;">Login</h3>
                    <button id="buttonmodal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form name="form_alunos_login" action="index.php?page=logar" method="post">
                        <div class="col-10 m-auto d-flex text-black align-items-center">
                            <i class='bx bxs-phone mx-1 ilogin' style="color:#9e9e9e"></i>
                            <input type="text" class="form-control my-4" id="celular" name="usu_login" placeholder="Celular">
                            <script type="text/javascript">
                                $("#telefone, #celular").mask("(00) 00000-00000");
                            </script>

                        </div>
                        <div class="col-10 m-auto d-flex text-black align-items-center">
                            <i class='bx bxs-lock-alt mx-1 ilogin' style="color:#9e9e9e"></i>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="usu_senha" placeholder="Senha">
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
                            <button type="submit" class="p-2 px-4 botao-logar" value="Logar" data-bs-toggle="modal">Logar</button>
                        </div>
                        <div class="mb-3 mt-3 text-center">
                            <h6>Não possui uma conta? <a href="index.php?page=login"> Cadastre-se!</a></h6>
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
                    <a href="index.php?page=home">Chef Sobre Rodas</a>
                </div>


                <ul class="d-none d-md-block d-lg-block d-xxl-block d-xl-block">
                    <li><a href="index.php?page=home"><i class="bi bi-house" style="margin-right: 5px;"></i>Pagina Inicial</a></li>
                    <li><a href="index.php?page=cardapio"><i class="bi bi-list-ul" style="margin-right: 7px;"></i>Cardápio</a></li>
                    <li><a href="index.php?page=sobre"><i class="bi bi-geo-alt" style="margin-right: 5px;"></i>Sobre</a></li>
                    <li><a href="index.php?page=perfil"><i class="bi bi-person-circle" style="margin-right: 5px;"></i>Perfil</a></li>
                    <?php
                    if (isset($_SESSION['login'])) {
                    ?>
                        <li><a class="nav-link" href="index.php?page=carrinho" style="border-radius: 80px; background-color: #ffc90e; padding: 10px; padding-left: 30px; padding-right: 30px; color: #fff;"> Carrinho </a></li>
                    <?php
                    } else {
                    ?>
                        <!-- <li><a class="nav-link" href="carrinho.php" style="border-radius: 80px; background-color: #ffc90e; padding: 10px; padding-left: 30px; padding-right: 30px; color: #fff;"> Cadastre-se </a></li> -->

                        <li><button type="button" class="btn botao-logar" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                                Logar
                            </button></li>

                    <?php
                    }
                    if (isset($_SESSION['login'])) :
                    ?>
                        <li><a href="index.php?page=logout" class="bi bi-box-arrow-left" style="margin-right: 5px;"></a></li>
                    <?php
                    endif;
                    ?>
                </ul>
                <div class="box d-md-none d-lg-none d-xxl-none d-xl-none">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon" style="width:40px; height:40px; background-color: #fff;">MENU</span> -->
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav" style="display: flex; text-align:right;">
                            <a class="nav-link active" aria-current="page" href="index.php?page=home">Pagina Inicial</a>
                            <a class="nav-link" href="index.php?page=cardapio">Cardápio</a>
                            <a class="nav-link" href="index.php?page=sobre">Sobre</a>
                            <a class="nav-link" href="index.php?page=perfil">Perfil</a>
                            <?php
                            if (isset($_SESSION['login'])) {
                            ?>
                                <a class="nav-link" href="index.php?page=carrinho"> Carrinho </a>
                            <?php
                            } else {
                            ?>
                                <!-- <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable" style="border-radius: 30px; background-color: #ffc90e; padding-left: 8px; padding-right: 8px; "> Cadastre-se </a> -->

                                <button type="button" class="btn botao-logar" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable" style="margin-left: 15px ;">
                                    Logar
                                </button>

                            <?php
                            }
                            if (isset($_SESSION['login'])) :
                            ?>
                                <a class="nav-link" href="index.php?page=logout">Logout</a>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>




            </nav>
        </header>
    </section>