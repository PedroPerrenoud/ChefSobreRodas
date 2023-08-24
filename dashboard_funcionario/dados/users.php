<?php

$usuario = $pdo->prepare("SELECT *FROM nivel WHERE niv_categoria = 1");

$usuario->execute();

if (isset($usuario)) {
    $nome_usuario = "Usuário";
}

$admin = $pdo->prepare("SELECT *FROM nivel WHERE niv_categoria = 5");

$admin->execute();

if (isset($admin)) {
    $nome_admin = "Admin";
}

// SUPER ADMIN
// $super_admin = $pdo->prepare("SELECT *FROM nivel WHERE niv_categoria = 10");

// $super_admin->execute();

// if (isset($usuario)) {
//     $nome_super_admin = "Super Admin";
// } 

?>