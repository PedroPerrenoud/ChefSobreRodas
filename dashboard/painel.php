<?php

//Chama a conexão 
// require "dados/conexao.php";

//chama os dados das vendas
include "dados/vendas.php";

//chama os dados das compras
include "dados/compras.php";

include "dados/dados_gerais.php";

require "dados/traducMeses.php";

//Fuso-Horário(São Paulo)
date_default_timezone_set('America/Sao_Paulo');

$sql = "SELECT *FROM lanches ORDER BY lan_id ASC";

$result = $pdo->query($sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Link CSS Geral -->
  <link rel="stylesheet" href="./css/dashboard_styles.css">
  <link rel="stylesheet" href="./css/darkMode_styles.css">
  <!-- Link Boxicons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.css"/>
  <link rel="shortcut icon" href="dashboard/img/iconeDash.svg">
  <link rel="stylesheet" href="./css/tabela.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel de controle</title>
</head>

<body id="body-pd">
  <!-- Header -->
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i></div>
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
          <a href="index.php?page=dashboard/painel" class="nav_link active">
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
  <div class="height-100">
    <div class="title">
      <h1 class="text-start">Painel de Controle</h1>
      <div class="date text-end">
        <h2 class="text-end"><?= $today . " de " . $mes ?></h2>
      </div>
    </div>
    <!-- Boxes -->
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-4 mt-1 mb-4 row-cols-xl-4">
      <div class="col">
        <div class="card" style="--clr: #17a2b8;">
          <div class="card-body p-2">
          <div class="info-box" style="--clr: #17a2b8;">
            <div class="info-box-icon">
              <i class='bx bx-user'></i> 
            </div>
            <div class="content">
              <h3>Usuários</h3>
              <p><?= $qnt_usu_total ?></p>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body p-2">
            <div class="info-box" style="--clr: #28a745;">
              <div class="info-box-icon">
                <i class='bx bx-face'></i>
              </div>
              <div class="content">
                <h3>Funcionários</h3>
                <p><?= $qnt_fun_total ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body p-2">
            <div class="info-box" style="--clr: #dc3545;">
              <div class="info-box-icon">
                <i class='bx bx-food-menu'></i>
              </div>
              <div class="content">
                <h3>Cardápio</h3>
                <p><?= $qnt_car_total ?></p>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body p-2">
            <div class="info-box" style="--clr: #ffc107;">
              <span class="info-box-icon"><i class='bx bx-package'></i></span>
              <div class="content">
                <h3>Pedidos</h3>
                <p><?= $qnt_vendas_total?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card -->
    <div class="card mb-4">
      <div class="card-header">
        <h4>Receita e Despesas mensais <?= date("Y"); ?></h4>
      </div>
      <div class="card-body">
        <div class="row row-cols-sm-2 g-4 mt-3 mb-4 row-cols-md-2">
          <div class="col-8 col-12">
            
            <div class="graph">
              <canvas id="myChart1"></canvas>
            </div>
          </div>
          <div class="col-4 col-12">
              <div class="col-12">
                <div class="card data">
                  <div class="card-body data">
                    <h3>Receita</h3>
                    <h2 style="--clr: #28a745;">R$ <?php echo $qnt_ven_total;?></h2>
                    <p><?= $today . " de " . $mes ?></p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card data mt-5">
                  <div class="card-body data">
                      <h3>Despesas</h3>
                      <h2 style="--clr: #dc3545;">R$ <?php echo $qnt_com_total?></h2>
                      <p><?= $today . " de " . $mes ?></p>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
        <div class="row mb-4 row-cols-md-2 g-4">
          <div class="col-12 col-md-12 col-xl-8">
            <div class="card">
              <div class="card-header">
                <h4>Produtos</h4>
              </div>
              <div class="card-body">
                <table class="tabela" id="produtosTabela">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Valor</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                          while ($user_data = $result->fetch(PDO::FETCH_ASSOC)) {
                              echo "<tr>";
                              echo "<td data-titulo='#'>" . $user_data['lan_id'] . "</td>";
                              echo "<td data-titulo='Nome'>" . $user_data['lan_nome'] . "</td>";
                              echo "<td data-titulo='Descrição'>" . $user_data['lan_desc'] . "</td>";
                              echo "<td data-titulo='Preço'>" . $user_data['lan_preco'] . "</td>";
                              echo "</tr>";
                          }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-12 col-xl-4 col-md-12">
            <div class="card mb-4">
              <div class="card-header">
                  <h4>Público</h4>
              </div>
              <div class="card-body">
                <div class="graph2">
                  <canvas id="myChart2"></canvas>
                </div>
                <div class="row">
                  <div class="col-6">
                      <div class="rounded-circle"></div>
                  </div>
                  <div class="col-6">

                  </div>
                </div>
              </div>
              </div> 
              <div class="card">
                <div class="card-header">
                    <h4>Metas</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <p class="text-bold">Produtos adicionados ao carrinho</p>
                    </div>
                    <div class="col-6">
                      <p class="text-end">320/200</p>
                    </div>
                  </div>
                  <div class="progress mb-3 rounded-0">
                    <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <p class="text-bold">Visitas ao site</p>
                    </div>
                    <div class="col-6">
                      <p class="text-end">150/200</p>
                    </div>
                  </div>
                  <div class="progress mb-3 rounded-0">
                    <div class="progress-bar bg-danger" role="progressbar" aria-label="Basic example" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <p class="text-bold">Compras finalizadas</p>
                    </div>
                    <div class="col-6">
                      <p class="text-end">50/200</p>
                    </div>
                  </div>
                  <div class="progress mb-3 rounded-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-label="Basic example" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <p class="text-bold">Boas avaliações</p>
                    </div>
                    <div class="col-6">
                      <p class="text-end">100/200</p>
                    </div>
                  </div>
                  <div class="progress mb-3 rounded-0">
                    <div class="progress-bar bg-warning" role="progressbar" aria-label="Basic example" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  </div>
              </div>
          </div>

          <div class="col-12 col-xl-4 mb-4">
              
          </div>

          <!-- <div class="col">
            <div class="card">
              <div class="card-header">
                <h4>Mais Vendidos</h4>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div> -->

        </div>
        
        
    <!--Container Main end-->
    <script src="dashboard/js/script.js"></script>
    <script src="dashboard/js/darkMode.js"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#produtosTabela').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_",
                    "zeroRecords": "Nada encontrado",   
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)"
                  },
              });
          });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="js/Chart.min.js "></script>
    <script>
      const labels = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro',
      ];

      const data = {
        labels: labels,
        datasets: [{
            label: "Receita",
            fill: false,
            borderColor: '#28a745',
            backgroundColor: '#28a745',
            data: [
              <?= $qnt_vendas_janeiro ?>,
              <?= $qnt_vendas_fevereiro ?>,
              <?= $qnt_vendas_marco ?>,
              <?= $qnt_vendas_abril ?>,
              <?= $qnt_vendas_maio ?>,
              <?= $qnt_vendas_junho ?>,
              <?= $qnt_vendas_julho ?>,
              <?= $qnt_vendas_agosto ?>,
              <?= $qnt_vendas_setembro ?>,
              <?= $qnt_vendas_outubro ?>,
              <?= $qnt_vendas_novembro ?>,
              <?= $qnt_vendas_dezembro ?>
            ],
          },
          {
            label: "Despesas",
            fill: false,
            borderColor: '#dc3545',
            backgroundColor: '#dc3545',
            data: [
              <?= $qnt_compras_janeiro?>,
              <?= $qnt_compras_fevereiro?>,
              <?= $qnt_compras_marco?>,
              <?= $qnt_compras_abril?>,
              <?= $qnt_compras_maio?>,
              <?= $qnt_compras_junho?>,
              <?= $qnt_compras_julho?>,
              <?= $qnt_compras_agosto?>,
              <?= $qnt_compras_setembro?>,
              <?= $qnt_compras_outubro?>,
              <?= $qnt_compras_novembro?>,
              <?= $qnt_compras_dezembro?>,
            ],
          },
        ]
      }

      const config = {
        type: 'bar',
        data: data,
        options: {
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      const myChart1 = new Chart(
        document.getElementById("myChart1"),
        config
      );
      
      const labels2 = [
        'Presencial',
        'Online'
      ];

      const data2 = {
        labels: labels2,
        datasets: [{
            label: 'Tipos de Compras realizadas',
            fill: false,
            backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
            data: [
              <?= rand(0, 100)?>, <?= rand(0, 100)?>
            ],
         },
        ],
      }

      const config2 = {
        type: 'doughnut',
        data: data2,
        options: {
          maintainAspectRatio: false,
          scales: {
            y: {
              display: false
            },
            x: {
              display: false
            }
          }
        }
      };

      const myChart2 = new Chart(
        document.getElementById("myChart2"),
        config2
      );
    </script>

  </div>  
</body>

</html>