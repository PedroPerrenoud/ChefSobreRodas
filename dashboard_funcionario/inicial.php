<?php

require "dados/traducMeses.php";

//Fuso-Horário(São Paulo)
date_default_timezone_set('America/Sao_Paulo');

$sql = "SELECT *FROM pedidos WHERE ped_status = 0";
$result = $pdo->query($sql);

$sql2 = "SELECT *FROM pedidos_lanches ORDER BY id_pedidos ASC";
$result2 = $pdo->query($sql2);

$sql3 = "SELECT *FROM pedidos_lanches INNER JOIN lanches ON lan_id = id_lanches";
$result3 = $pdo->query($sql3);

$sql4 = "SELECT *FROM lanches";
$result4 = $pdo->query($sql4);

$sql5 = "SELECT *FROM usuarios";
$result5 = $pdo->query($sql5);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <!-- Link CSS Geral -->
  <link rel="stylesheet" href="./css/dashboard_styles.css">
  <link rel="stylesheet" href="./css/darkMode_styles.css">
  <!-- Link Boxicons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.css" />
  <link rel="shortcut icon" href="dashboard/img/iconeDash.svg">
  <link rel="stylesheet" href="./css/tabela.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel de Pedidos</title>
</head>

<body id="body-pd" class="dark">
  <!-- Header -->
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i></div>
  </header>
  <!-- Navbar Lateral -->
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="#" class="nav_logo">
          <i class='bx bx-layer nav_logo-icon'></i>
          <span class="nav_logo-name">Funcionário</span>
        </a>
        <div class="nav_list">
          <a href="index.php?page=dashboard_funcionario/inicial" class="nav_link active">
            <i class='bx bx-message-alt-check'></i>
            <span class="nav_name">Painel de Pedidos</span>
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
  <div class="height-100 p-3">
    <div class="title mb-4">
      <h1 class="text-start">Painel de pedidos</h1>
      <div class="date text-end">
        <h2 class="text-end"><?= $today . " de " . $mes ?></h2>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
      <?php
      $ped = $result->fetchAll(PDO::FETCH_ASSOC);
      $pedidos = $result2->fetchAll(PDO::FETCH_ASSOC);
      $lanches = $result3->fetchAll(PDO::FETCH_ASSOC);
      $lanchin = $result4->fetchALL(PDO::FETCH_ASSOC); 
      $usuario = $result5->fetchALL(PDO::FETCH_ASSOC); 

      foreach ($ped as $peds) {
        echo "<div class='col'>" .
          "<div class='card p-3'>" .
          "<h3 class='preto text-center'>Pedido " . $peds['ped_id'] . "</h3>" .
          "<br>";
          foreach ($usuario as $usu){
            if ($peds['ped_usuid'] == $usu['usu_id']) {
            echo "<h5 class='preto text-center'>Endereço: " . $usu['usu_end'] .
            "<br>" . "<br>" . "<h5 class='preto text-center'>Forma de Pagamento: " . $peds['ped_forma'] ."<br>" . "<br>" ;
            }
          }
        foreach ($pedidos as $pedido) {
          if ($peds['ped_id'] == $pedido['id_pedidos']) {
            foreach ($lanches as $lanche) {
              if ($peds['ped_id'] == $lanche['id_pedidos']) {
                echo "<br>" .
                     "<div class='row' id='lan'>" .
                      "<h3 class='preto col-8'>" . $lanche['lan_nome'] . "</h6>" .
                      "<h3 class='preto col-4'>" . " x " . $lanche['pl_qtd'] . "</h6>" .
                      "</div>";
              }
            }
            break;
          }
        }
        echo "<div class='row g-2 mt-3'>" .
          "<form action='index.php?page=dashboard_funcionario/dados/update' method='POST'>" . 
            "<div class='col-10 m-auto d-none text-dark'>" . 
              "<input type='radio' name='status' value=' " . $peds['ped_id'] . " ' checked>" .
            "</div>" .
            "<button class='btn btn-success col-12' type='submit'>Saiu para entrega</button>" . 
          "</form>" .
          "</div>" .
          "</div>" .
          "</div>";
      }

      header("refresh: 3");
      ?>
    </div>

    <!--Container Main end-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="dashboard/js/entrega.js"></script>
    <script src="dashboard/js/script.js"></script>
    <script src="dashboard/js/remover.js"></script>
  </div>
</body>

</html>