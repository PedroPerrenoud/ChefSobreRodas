<?php
// session_start();
// include 'conexao.php';

// if(!isset($_SESSION['login'])):  IMPORTANTE
//     echo "acesso negado <br/>";
//     echo "<a href = '../index.php'> Voltar </a>";
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- FIM DO LINK BANNER -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/login_styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Título -->
    <title>Chef Sobre Rodas</title>
</head>

<body>

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
                            <i class='bx bxs-phone mx-1' style="color:#9e9e9e"></i>
                            <input type="text" class="form-control my-4" id="celular" name="usu_login" placeholder="Celular">
                            <script type="text/javascript">
                                $("#telefone, #celular").mask("(00) 00000-00000");
                            </script>

                        </div>
                        <div class="col-10 m-auto d-flex text-black align-items-center">
                            <i class='bx bxs-lock-alt mx-1' style="color:#9e9e9e"></i>
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

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="fundo">
        <div class="row w-100 gx-0" style="height: 100vh;">
            <div class="col-6 h-100 d-none d-md-block"></div>
            <div class="col-md-6 col-12 bg-white h-100">
                <div class="container">
                    <a href="index.php?page=home"><i class='bx bx-left-arrow-alt' style="color:#9e9e9e"></i></a>
                    <div class="row d-flex justify-content-center align-items-center">
                        <form name="form_usu_login" action="index.php?page=cadastro" method="post" class="mt-5">
                            <h1 class="mb-5 text-center text-dark">Cadastro no Chef</h1>
                            <div class="col-10 my-3 m-auto d-block text-dark">
                                <label for="exampleInputEmail1" class="form-label">Usuário</label>
                                <input type="text" class="form-control" name="usu_nome" required>
                            </div>
                            <div class="col-10 my-3 m-auto d-block text-dark">

                                <label for="exampleInputEmail1" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="celular" name="usu_login" required>
                                <script type="text/javascript">
                                    $("#telefone, #celular").mask("(00) 00000-00000");
                                </script>

                            </div>
                            <div class="col-10 my-3 m-auto d-block text-dark">
                                <label for="exampleInputEmail1" class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="usu_end" required>
                            </div>
                            <div class="col-10 my-3 m-auto d-block text-dark">
                                <label for="exampleInputPassword1" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="usu_senha" required>
                            </div>

                            <div class="col-10 m-auto d-none text-dark">
                                <input type="radio" id="1" name="usu_niv" value="1" checked>
                                <input type="radio" id="2" name="usu_niv" value="2">
                            </div>

                            <?php


                            $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
                            //echo $get['error'],
                            if (!empty($get['error'])) :

                                // echo "email ja registrado";
                            ?>
                                <h6 class="text-danger text-center mb-3 mt-3">Número já cadastrado ou algum dado vazio!</h6>
                            <?php

                            endif;

                            ?>


                            <div class="col-10 my-3 m-auto d-block text-dark">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mt-2"> <button class="btn btn-warning btn-block" type="submit" class="col-6 btn btn-warning" value="Logar">Cadastrar</button> </div>
                                    </div>                                
                                        <div class="col-6">
                                            <div class="d-flex justify-content-end">
                                                <a class="text-decoration-none text-warning text-end" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">Já possui uma conta?</a>
                                            </div>
                                        </div>
                                    </div>   
                                </div>      
                            </div>                  
                        </form>        

                        <?php
                        // if ($_POST) {
                        //     $senha          = $_POST['usu_senha'];
                        //     $senhaConfirma  = $_POST['senha_confirma'];
                        //     if ($senha == "") {
                        //         $mensagem = "<span class='aviso'><b>Aviso</b>: Senha não foi alterada!</span>";
                        //     } else if ($senha == $senhaConfirma) {
                        //         $mensagem = "<span class='sucesso'><b>Sucesso</b>: As senhas são iguais: " . $senha . "</span>";
                        //     } else {
                        //         $mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
                        //     }
                        //     echo "<p id='mensagem'>" . $mensagem . "</p>";
                        // }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="container">
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6 h-100">
                <h1></h1>
                <div class="col m-auto d-block mt-5 border shadow rounded">

                    <form name="form_usu_login" action="index.php?page=cadastro" method="post" class="mt-5">
                        <h1 class="mb-5 text-center text-white"><i class="bi bi-lock-fill"></i>Cadastro</h1>
                        <div class="col-10 m-auto d-block text-white">
                            <label for="exampleInputEmail1" class="form-label">Usuário</label>
                            <input type="text" class="form-control" name="usu_nome">
                        </div>
                        <div class="col-10 m-auto d-block text-white">

                            <label for="exampleInputEmail1" class="form-label">Celular</label>
                            <input type="text" class="form-control" id="celular" name="usu_login">
                            <script type="text/javascript">
                                $("#telefone, #celular").mask("(00) 00000-00000");
                            </script>

                        </div>
                        <div class="col-10 m-auto d-block text-white">
                            <label for="exampleInputPassword1" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="usu_senha">
                        </div>

                        <div class="col-10 m-auto d-none text-white">
                            <input type="radio" id="1" name="usu_niv" value="1" checked>
                            <input type="radio" id="2" name="usu_niv" value="2">
                        </div>

                        <?php


                        $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
                        //echo $get['error'],
                        if (!empty($get['error'])) :

                            // echo "email ja registrado";
                        ?>
                            <h6 class="text-danger text-center mb-3 mt-3">Número já registrado!</h6>
                        <?php

                        endif;

                        ?>
                        <div class="mb-3 mt-3 text-center">
                            <button type="submit" class="btn btn-primary" value="Logar">Cadastrar</button>
                        </div>
                    </form>

                    <?php
                    if ($_POST) {
                        $senha          = $_POST['usu_senha'];
                        $senhaConfirma  = $_POST['senha_confirma'];
                        if ($senha == "") {
                            $mensagem = "<span class='aviso'><b>Aviso</b>: Senha não foi alterada!</span>";
                        } else if ($senha == $senhaConfirma) {
                            $mensagem = "<span class='sucesso'><b>Sucesso</b>: As senhas são iguais: " . $senha . "</span>";
                        } else {
                            $mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
                        }
                        echo "<p id='mensagem'>" . $mensagem . "</p>";
                    }
                    ?>


                    </div>
                </div>
            </div>
        </div> -->
    </div>
    
    </div>

    <!-- Frameworks/Links -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.6.10/keen-slider.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="scripts/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



</body>

</html>