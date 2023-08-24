<?php

    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $status = $data['status'];

    $update = $pdo->prepare("UPDATE pedidos SET ped_status = 1 WHERE ped_id = " . $status);
    $update->execute();

    header("LOCATION: index.php?page=dashboard_funcionario/inicial");
?>