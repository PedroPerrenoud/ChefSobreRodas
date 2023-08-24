<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['lan_id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM lanches WHERE lan_id = ?');
    $stmt->execute([$_GET['lan_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo/logo.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/lanche_styles.css">
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Título -->
    <title>Chef Sobre Rodas</title>
</head>

<body>

    <?php require_once 'header.php' ?>

    <div class='container-fluid '>
        <div class="card mx-auto col-md-6 col-10 mt-5 pt-4">
            <img class='mx-auto img-thumbnail'
            src="img/cardapio/<?= $product['lan_img'] ?>" alt="<?= $product['lan_nome'] ?>"
                width="auto" height="auto"/>
            <div class="card-body text-center mx-auto">
                <h1 class="card-title"style="font-family:'Pacifico', cursive;"><?= $product['lan_nome'] ?></h1>
                <h4 style="font-family: Poppins, sans-serif;"><?= $product['lan_desc'] ?></h4>
                <h5 class="card-text">R$ <?= $product['lan_preco'] ?></h5>

                <form class="forms" action="index.php?page=carrinho" method="post">
                <div class="row align-items-center mb-5">
                    <div class="col-md-6 mb-2">
                        <input type="number" name="quantity" class="form-control border" value="1" min="1" max="99" placeholder="Quantidade" required>
                        <input type="hidden" name="product_id" class="form-control" value="<?= $product['lan_id'] ?>">
                    </div>

                    <div class="col-md-6 mb-2">
                        <button type="submit" class="form-control" style="border-radius: 40px; background-color: #ffc90e; color: #000; font-family: Poppins, sans-serif;" value="Adicionar no Carrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
                   


    <?php require_once 'footer.php' ?>

    <!-- Frameworks/Links -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.6.10/keen-slider.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="scripts/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>