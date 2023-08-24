<?php

//Chama a conexão 
// require "./conexao.php";

//Faz o requerimento dos usuários
include "dados/users.php";

//Fuso-Horário(São Paulo)
date_default_timezone_set('America/Sao_Paulo');

require "dados/traducMeses.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="./css/dashboard_styles.css">
    <link rel="stylesheet" href="./css/darkMode_styles.css">
    <!-- Boxicons CDN Link -->
    <link rel="shortcut icon" href="dashboard/img/iconeDash.svg">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="css/tabela.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Configurações</title>
</head>

<body id="body-pd">
    <!-- Header -->
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="btn-dark-mode">
            <div class="checkbox">
                <input type="checkbox" id="switch" value="1" onclick="darkMode()">
                <label for="switch"></label>
            </div>
        </div>  
    </header>
    <!-- Navbar Lateral -->
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">Dashboard Admin</span>
                </a>
                <div class="nav_list">
                    <a href="index.php?page=dashboard/painel" class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Painel de Controle</span>
                    </a>
                    <a href="index.php?page=dashboard/pedidos" class="nav_link">
                        <i class='bx bx-message-check'></i>
                        <span class="nav_name">Pedidos</span>
                    </a>
                    <a href="index.php?page=dashboard/funcionarios" class="nav_link">
                        <i class='bx bx-face'></i>
                        <span class="nav_name">Funcionários</span>
                    </a>
                    <a href="index.php?page=dashboard/config" class="nav_link active">
                        <i class='bx bx-cog'></i>
                        <span class="nav_name">Configurações</span>
                    </a>
                </div>
            </div>
            <!-- Botão de sair -->
            <a href="./index.php?page=perfil" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">Sair</span>
            </a>
        </nav>
    </div>
    <!--Container Principal-->
    <div class="height-100">
        <div class="title">
            <h1 class="text-start">Configurações</h1>
        </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inserir funcionário</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_usu_login" action="index.php?page=dashboard/dados/registra_funcionario" class="form" method="post" >
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control outline-none mb-3" placeholder="Nome" name="usu_nome">
                                    <input type="text" class="form-control outline-none mb-3" id="celular" placeholder="Telefone" name="usu_login">
                                    <script type="text/javascript">
                                        $("#telefone, #celular").mask("(00) 00000-00000");
                                    </script>
                                    <input type="password" class="form-control outline-none mb-3" placeholder="Senha" name="usu_senha">
                                    <div class="col-10 m-auto d-none text-dark">
                                        <input type="radio" id="1" name="usu_niv" value="1">
                                        <input type="radio" id="2" name="usu_niv" value="2">
                                        <input type="radio" id="4" name="usu_niv" value="4" checked>
                                    </div>
                                    <button class="btn bg-success text-light outline-none" type="submit" value="Inserir">Inserir</button>
                                </div>
                            </form>
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
                        </div>
                    </div>
                </div>


                <!-- Inserir Produto -->
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inserir produto</h4>
                        </div>
                        <div class="card-body">
                            <form name="cad_lanche" action="index.php?page=dashboard/dados/upload" class="form" method="post" >
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control outline-none mb-3" placeholder="Nome" name="lan_nome" required>
                                    <input type="text" class="form-control outline-none mb-3" placeholder="Descrição" name="lan_desc" required>
                                    <input type="text" class="form-control outline-none mb-3" placeholder="Preço" name="lan_preco" required>
                                    <input type="file" class="form-control outline-none mb-3" name="lan_img" id="lan_img" required>
                                    
                                    <button class="btn bg-success text-light outline-none" type="submit" value="Cadastrar" name="SalvarFoto">Inserir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Inserir Produto -->

            </div>
    </div>

    <script src="dashboard/js/darkMode.js"></script>
    <script src="dashboard/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</body>

</html>