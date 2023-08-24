<?php
// session_start();
// include 'conexao.php';

if (!isset($_SESSION['login'])) :
    header('LOCATION: index.php?page=login');
    die;
endif;

?>

<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $pdo->prepare('SELECT * FROM lanches WHERE lan_id = ?');
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=carrinho');
    exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=carrinho');
    exit;
}

// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $_SESSION['form'] = $form;

    header('Location: index.php?page=placeorder');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM lanches WHERE lan_id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['lan_preco'] * (int)$products_in_cart[$product['lan_id']];
        $_SESSION['cart']['subtotal'] = $subtotal;
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="css/carrinho_compra_styles.css">
    <!-- <link rel="stylesheet" href="css/carrinho_styles.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
    <!-- Título -->
    <title>Chef Sobre Rodas</title>
</head>

<body>

    <?php require_once 'header.php' ?>      

<div class="main">
    <div class="container">
        <div class="row g-2">
        <div class="table-responsive">
        <table class="table">
        <h2>Seu Carrinho</h2>
            <form action="index.php?page=carrinho" method="post">
                
                    <thead>
                        <tr>
                            <th scope="col"><h1>Produto</h1></th>
                            <th scope="col"><h1>Preço</h1></th>
                            <th scope="col"><h1>Quantidade</h1></th>
                            <th scope="col"><h1>Total</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)) : ?>
                            <tr>
                                <th scope="col" style="text-align:center;">Você não possui produtos inseridos no carrinho!</th>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td>
                                        <a><?= $product['lan_nome'] ?></a>
                                        <br>
                                    </td>
                                    <td class="price"><a>R$ <?= $product['lan_preco'] ?></a></td>
                                    <td class="quantity">
                                        <input type="number" name="quantity-<?= $product['lan_id'] ?>" value="<?= $products_in_cart[$product['lan_id']] ?>" min="1" max="9999" placeholder="Quantidade" required>
                                    </td>
                                    <td class="price"><a>R$ <?= $product['lan_preco'] * $products_in_cart[$product['lan_id']] ?></a>
                                    <a class="btn btn-danger col-auto remove ms-5" role="button" href="index.php?page=carrinho&remove=<?= $product['lan_id'] ?>"><ion-icon class="fs-5 mt-1" name="trash-bin-outline"></ion-icon></a>
                                    </td>
                                </tr>

                                
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                </div>
                </div>
                
                <div class="col-md-12 mt-5 justify-content-md-end">
                            
                            <!-- <p>Subtotal:  R$ <?= $subtotal ?></p>
                            <a>Total:  R$ <?= $subtotal ?></a> -->
                            <hr>
                            <!-- <button class="btn btn-sm btn-carrinho mb-3" type="submit" name="placeorder">Finalizar Compra!</button> -->
                            <div class="row g-2">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ped_forma" id="ped_forma" value="Dinheiro" required>
                                    <label class="form-check-label" for="exampleRadios1">
                                    <a>Dinheiro</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ped_forma" id="ped_forma" value="Cartão" required>
                                    <label class="form-check-label" for="exampleRadios2">
                                    <a>Cartão</a>
                                    </label>
                                </div>
                                <div class="form-check me-5">
                                    <input class="form-check-input" type="radio" name="ped_forma" id="ped_forma" value="Pix" required>
                                    <label class="form-check-label" for="exampleRadios2">
                                    <a>PIX</a>
                                    </label>
                                </div>
                                <a>Subtotal</a>
                                <a>R$ <?= $subtotal ?></a>
                                <button class="btn btn-sm btn-carrinho update" type="update" name="update"><ion-icon class="mt-1" name="refresh-outline"></ion-icon></button>
                                <li class="btn btn-sm btn-carrinho"><a href="index.php?page=cardapio"><ion-icon class="mt-1" name="return-up-back-outline"></ion-icon></a></li>
                                <button class="btn btn-sm btn-carrinho" type="submit" name="placeorder">Finalizar Compra!</button>
                            </div>
                            </div>
                    </div>
            </form>
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