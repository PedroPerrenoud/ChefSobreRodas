<?php

$usu_total = $pdo->prepare("SELECT * from usuarios");
$usu_total->execute();

$qnt_usu_total = $usu_total->rowCount();

$car_total = $pdo->prepare("SELECT * from lanches");
$car_total->execute();

$qnt_car_total = $car_total->rowCount();

$fun_total = $pdo->prepare("SELECT * from usuarios where usu_niv = 4");
$fun_total->execute();

$qnt_fun_total = $fun_total->rowCount();

$qnt_vendas_janeiro = rand(0, 100);
$qnt_vendas_fevereiro = rand(0, 100);
$qnt_vendas_marco = rand(0, 100);
$qnt_vendas_abril = rand(0, 100);
$qnt_vendas_maio = rand(0, 100);
$qnt_vendas_junho = rand(0, 100);
$qnt_vendas_julho = rand(0, 100);
$qnt_vendas_agosto = rand(0, 100);
$qnt_vendas_setembro = rand(0, 100);
$qnt_vendas_outubro = rand(0, 100);
$qnt_vendas_novembro = rand(0, 100);
$qnt_vendas_dezembro = rand(0, 100);

$qnt_compras_janeiro = rand(0, 100);
$qnt_compras_fevereiro = rand(0, 100);
$qnt_compras_marco = rand(0, 100);
$qnt_compras_abril = rand(0, 100);
$qnt_compras_maio = rand(0, 100);
$qnt_compras_junho = rand(0, 100);
$qnt_compras_julho = rand(0, 100);
$qnt_compras_agosto = rand(0, 100);
$qnt_compras_setembro = rand(0, 100);
$qnt_compras_outubro = rand(0, 100);
$qnt_compras_novembro = rand(0, 100);
$qnt_compras_dezembro = rand(0, 100);

$qnt_ven_total = $qnt_vendas_janeiro + 
$qnt_vendas_fevereiro + 
$qnt_vendas_marco + 
$qnt_vendas_abril +
$qnt_vendas_maio + 
$qnt_vendas_junho +
$qnt_vendas_julho +
$qnt_vendas_agosto +
$qnt_vendas_setembro + 
$qnt_vendas_outubro +
$qnt_vendas_novembro +
$qnt_vendas_dezembro;

$qnt_com_total = $qnt_compras_janeiro + 
$qnt_compras_fevereiro + 
$qnt_compras_marco + 
$qnt_compras_abril +
$qnt_compras_maio + 
$qnt_compras_junho +
$qnt_compras_julho +
$qnt_compras_agosto +
$qnt_compras_setembro + 
$qnt_compras_outubro +
$qnt_compras_novembro +
$qnt_compras_dezembro;

?>