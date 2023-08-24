<?php
// session_start();
// include 'conexao.php';

?>

<?php
// The amounts of products to show on each page
$num_products_on_each_page = 999;
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM lanches ORDER BY lan_id ASC LIMIT ?,?');
// $stmt2 = $pdo->prepare('SELECT * FROM bebidas ORDER BY beb_nome ASC LIMIT ?,?');
// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
// $stmt2->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
// $stmt2->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// $stmt2->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $products2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM lanches')->rowCount();
// $total_products2 = $pdo->query('SELECT * FROM bebidas')->rowCount();

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
    <link rel="stylesheet" href="css/cardapio_styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Título -->
    <title>Chef Sobre Rodas</title>
</head>

<body>


    <?php require_once 'header.php' ?>



    <div class="bemvindo">

        <h5 style="color: #fff; "> Nosso</h5>
        <h5 style="margin-left: 10px;"> Cardápio</h5>


    </div>

    <div class="textin">
        <h4 style="color: #fff; border: none;">Peça as melhores iguarias de Guará!</h4>
    </div>


    <!-- Cards -->
    <div class="container">
        <div class="container-cards">
            <div class="row lanches" id="lanches">
                <h1>
                    Produtos
                </h1>
                <?php foreach ($products as $product) : ?>
                    <div class="card col-3 m-2">
                        <div class="card-body ">
                            <img src="img/cardapio/<?= $product['lan_img'] ?>" width="200" height="200" alt="<?= $product['lan_nome'] ?>">
                            <h1 class="nome"><?= $product['lan_nome'] ?></h1>
                            <p class="preco">
                                R$ <?= $product['lan_preco'] ?>
                                <?php if ($product['lan_rrp'] > 0) : ?>
                                    <span class="rrp">R$ <?= $product['lan_rrp'] ?></span>
                                <?php endif; ?>
                            </p>
                            <a href="index.php?page=lanche&lan_id=<?= $product['lan_id'] ?>" class="product btn btn-cardapio">Comprar</a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <!-- <div class="row bebidas" id="bebidas">
                <h1>
                    Bebidas
                </h1>
                <?php foreach ($products2 as $product) : ?>
                    <div class="card col-3 m-2">
                        <div class="card-body ">
                            <img src="img/cardapio/<?= $product['beb_img'] ?>" width="200" height="200" alt="<?= $product['beb_nome'] ?>">
                            <h1 class="nome"><?= $product['beb_nome'] ?></h1>
                            <p class="preco">
                                R$ <?= $product['beb_preco'] ?>
                                <?php if ($product['beb_rrp'] > 0) : ?>
                                    <span class="rrp">R$ <?= $product['beb_rrp'] ?></span>
                                <?php endif; ?>
                            </p>
                            <a href="index.php?page=lanche&lan_id=<?= $product['beb_id'] ?>" class="product btn btn-cardapio">Comprar</a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div> -->
            <!-- <div class="row" id="cardapio-kids">
                <h1>
                    Kids
                </h1>
                <div class="card col-3 m-2">
                    <div class="card-body">
                        <img src="img/cardapio/6chefinho.png" alt="">
                        <h1>Chefinho</h1>
                        <p> descrição do lanche</p>
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>

                <div class="card col-3 m-2">
                    <div class="card-body">
                        <img src="img/cardapio/12chefsalada.png" alt="">
                        <h1>Doguinho</h1>
                        <p> descrição do lanche</p>
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>

                <div class="card col-3 m-2">
                    <div class="card-body">
                        <img src="img/cardapio/12chefsalada.png" alt="">
                        <h1>Franguito</h1>
                        <p> descrição do lanche</p>
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>

                <div class="card col-3 m-2">
                    <div class="card-body">
                        <img src="img/cardapio/12chefsalada.png" alt="">
                        <h1>Tirinhas de Frango</h1>
                        <p> descrição do lanche</p>
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>

                <div class="card col-3 m-2">
                    <div class="card-body">
                        <img src="img/cardapio/12chefsalada.png" alt="">
                        <h1>Combinho de Batata</h1>
                        <p> descrição do lanche</p>
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>
            </div>
            <div class="row" id="bebidas">
                <h1>
                    Bebidas
                </h1>
                <div class="card col-2 m-2">
                    <div class="card-body">
                        <h2>Água</h2>
                        <img src="img/cardapio/2agua_n.png" id="bebidas" alt="">
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>

                <div class="card col-2 m-2">
                    <div class="card-body">
                        <h2>Água com gás</h2>
                        <img src="img/cardapio/1aguacomgas_n.png" id="bebidas" alt="">
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>

                <div class="card col-2 m-2">
                    <div class="card-body">
                        <h2>Fanta</h2>
                        <img src="img/cardapio/3fanta_n.png" id="bebidas" alt="">
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>

                <div class="card col-2 m-2">
                    <div class="card-body">
                        <h2>Fanta Uva</h2>
                        <img src="img/cardapio/4fantauva_n.png" id="bebidas" alt="">
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>

                <div class="card col-2 m-2">
                    <div class="card-body">
                        <h2>Coca-cola</h2>
                        <img src="img/cardapio/5coca_n.png" id="bebidas" alt="">
                        <a href="cardapio.php" class="btn btn-cardapio">Comprar</a>
                    </div>
                </div>


            </div> -->

        </div>
    </div>
    <!-- Cards -->







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