<?php

//Chama a conexão 
// require "../conexao.php";    

require "dados/traducMeses.php";

//Fuso-Horário(São Paulo)
date_default_timezone_set('America/Sao_Paulo');

$sql = "SELECT *FROM pedidos ORDER BY ped_id ASC";

$result = $pdo->query($sql);

?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="./css/dashboard_styles.css">
    <link rel="stylesheet" href="./css/darkMode_styles.css">
    <!-- Boxicons CDN Link -->
    <link rel="shortcut icon" href="dashboard/img/iconeDash.svg">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/tabela.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
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
                    <a href="index.php?page=dashboard/pedidos" class="nav_link active">
                        <i class='bx bx-message-check'></i>
                        <span class="nav_name">Pedidos</span>
                    </a>
                    <a href="index.php?page=dashboard/funcionarios" class="nav_link">
                        <i class='bx bx-face'></i>
                        <span class="nav_name">Funcionários</span>
                    </a>       
                    <a href="index.php?page=dashboard/config" class="nav_link">
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
    <div class="height-100 bg-light">
        <div class="title">
            <h1 class="text-start">Pedidos</h1>
            <div class="date text-end">
                <h2 class="text-end"><?= $today . " de " . $mes ?></h2>
            </div>
        </div>
        <div class="w-100">
            <div class="tabelas">
                <table id="minhaTabela">
                    <div class="table-header">
                        <h2>Histórico de Pedidos</h2>
                    </div>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuário ID</th>
                            <th>Valor</th>
                            <th>Hora</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                        while ($user_data = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td data-titulo='#'>" . $user_data['ped_id'] . "</td>";
                            echo "<td data-titulo='Nome'>" . $user_data['ped_usuid'] . "</td>";
                            echo "<td data-titulo='Valor'>" . $user_data['ped_valor'] . "</td>";
                            echo "<td data-titulo='Hora'>" . $user_data['ped_data'] ."</td>";
                            echo "<td>" . '<a href="#"><i class="bx bx-trash"></i></a>' . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#minhaTabela').DataTable({
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por página",
                        "zeroRecords": "Nada encontrado",   
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro disponível",
                        "infoFiltered": "(filtrado de _MAX_ registros no total)"
                    },
                });
            });
        </script>
    </div>

    <script src="dashboard/js/darkMode.js"></script>
    <script src="dashboard/js/script.js"></script>
</body>

</html>