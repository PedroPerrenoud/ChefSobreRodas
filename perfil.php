<?php
// session_start();
// include 'conexao.php';

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['login'])) :
    header('LOCATION: index.php?page=login');
    die;
endif;

$sql = "SELECT * FROM pedidos where ped_usuid = " . $_SESSION['login']['usu_id'];
$result = $pdo->query($sql);


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
    <link rel="stylesheet" href="css/perfil_styles.css">
    <!-- Título -->
    <title>Chef Sobre Rodas</title>
</head>

<body>

    <?php require_once 'header.php' ?>

    <div class="bemvindo">

        <h5 style="color: #fff;"> Seu</h5>
        <h5 style=" margin-left: 10px;">Perfil </h5>



    </div>



    <div class="textin">
        <h4 style="color: #fff; border: none;">Suas informações para entrega do lanche</h4>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center text-center p-5">
            <h1 class="text-center ">Bem Vindo</h1>
            <div class="col-4 mt-3">
                <i class='bx bxs-user rounded-circle bg-secondary p-2 text-center' style="font-size: 5rem; z-index: 1000;"></i>
                <br>
                <h3 class="mt-3"><?= $_SESSION['login']['usu_nome'] ?></h3>
                <ul class="list-group col-12">
                    <li>Telefone: <?= $_SESSION['login']['usu_login']?></li>
                    <li>Endereço: <?= $_SESSION['login']['usu_end']?></li>
                </ul>
            </div>
            <?php
            if ($_SESSION['login']['niv_id'] == 2) {
            ?>
                <div class="col-12 mt-3">
                    <a class="text-center bg-danger p-2 px-3 text-white text-decoration-none rounded-2" href="index.php?page=dashboard/painel">Dashboard do Chef</a>
                </div>
            <?php
            } elseif ($_SESSION['login']['niv_id'] == 4) {
            ?>
                <div class="col-12 mt-3">
                    <a class="text-center bg-danger p-2 px-3 text-white text-decoration-none rounded-2" href="index.php?page=dashboard_funcionario/inicial" style="color:red;">Painel Funcionários</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center text-center">
            <h2>Histórico de Pedidos</h2>
            <div class="col-12 col-md-8 col-sm-12">
                <ul class="list-group col-sm-12">
                    <?php
                    if ($result->rowCount() > 0) {
                        while ($user_data = $result->fetch(PDO::FETCH_ASSOC)) {
                            
                            if($user_data['ped_status'] > 0){
                                
                                $status = "Sendo entregue / Entregado";
                                
                            }else{
                                $status = "Sendo Feito";
                            }

                            echo "<li class='col-12 mt-3 border p-2 shadow-sm rounded border-warning'>" . 
                                "<div class='row'>" . 
                                    "<div class='col-4'>" . 
                                        $user_data['ped_data'] . 
                                    "</div>" . 
                                    "<br>" . 
                                    "<div class='col-4'>" .
                                        "R$ " . $user_data['ped_valor'] . 
                                    "</div>" . 
                                    "<div class='col-4'>" .
                                    "Status: " . $status . 
                                "</div>" .
                                "</div>" . 
                            "</li>";
                            

                            
                        }
                    } else {
                        echo "<p class='fs-5 mt-3'>Você não realizou nenhum pedido.</p>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <?php require_once 'footer.php' ?>
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