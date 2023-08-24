<?php

if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=remove');
    exit;
}



$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();

var_dump($_SESSION['form']);

var_dump($products_in_cart);
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

        if (!empty($_SESSION['cart']['subtotal']) && !empty($product['lan_id']) && !empty($products_in_cart[$product['lan_id']])) {

            try {
                $sql = "INSERT INTO pedidos (ped_id, ped_usuid, ped_valor, ped_forma) VALUES (null, :u, :v, :f)";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':u', $_SESSION['login']['usu_id']);
                $sth->bindValue(':v', $_SESSION['cart']['subtotal']);
                $sth->bindValue(':f', $_SESSION['form']['ped_forma']);
                $sth->execute();

                unset($_SESSION["cart"]['subtotal']);
            } catch (PDOException $e) {
                echo 'Mensagem: ' . $e->getMessage();
                echo ' Erro do pedidos';
            }
        }

        if (!empty($product['lan_id']) && !empty($products_in_cart[$product['lan_id']])) {

            try {
                $pedido = array();
                $ped = $pdo->prepare("SELECT * FROM pedidos ORDER BY ped_data DESC");
                $ped->execute();
                $pedido = $ped->fetchAll(PDO::FETCH_ASSOC);
                extract($pedido);

                $sql = "INSERT INTO pedidos_lanches (id_exp, id_pedidos, id_lanches, pl_qtd) VALUES (null, :p, :l, :q)";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':p', $pedido[0]['ped_id']);
                $sth->bindValue(':l', $product['lan_id']);
                $sth->bindValue(':q', $products_in_cart[$product['lan_id']]);
                $sth->execute();

            } catch (PDOException $e) {
                echo 'Mensagem: ' . $e->getMessage();
                echo ' Erro do Associativo';
            }
        }
    }

    header('LOCATION: index.php?page=confirmacao');
    unset($_SESSION['cart']);

}

?>

<form action="index.php?page=placeorder" method="post">
    <div class="buttons" style="margin-top: 3vh ;">
        <input type="submit" value="Comprar" name="placeorder">
    </div>
</form>