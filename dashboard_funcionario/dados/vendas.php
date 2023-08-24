<?php

//Vendas total
$vendas_total = $pdo->prepare("SELECT * from pedidos");
$vendas_total->execute();

$qnt_vendas_total = $vendas_total->rowCount();

//Vendas de Janeiro
$vendas_janeiro = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-01-01' AND '2022-01-31'");
$vendas_janeiro->execute();

$qnt_vendas_janeiro = $vendas_janeiro->rowCount();

//Vendas de Fevereiro
$vendas_fevereiro = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-02-01' AND '2022-02-30'");
$vendas_fevereiro->execute();

$qnt_vendas_fevereiro = $vendas_fevereiro->rowCount();

//Vendas de Março
$vendas_marco = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-03-01' AND '2022-03-31'");
$vendas_marco->execute();

$qnt_vendas_marco = $vendas_marco->rowCount();

//Vendas de Abril
$vendas_abril = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-04-01' AND '2022-04-30'");
$vendas_abril->execute();

$qnt_vendas_abril = $vendas_abril->rowCount();

//Vendas de Maio
$vendas_maio = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-05-01' AND '2022-05-31'");
$vendas_maio->execute();

$qnt_vendas_maio = $vendas_maio->rowCount();

//Vendas de Junho
$vendas_junho = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-06-01' AND '2022-06-30'");
$vendas_junho->execute();

$qnt_vendas_junho = $vendas_junho->rowCount();

//Vendas Julho
$vendas_julho = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-07-01' AND '2022-07-31'");
$vendas_julho->execute();

$qnt_vendas_julho = $vendas_julho->rowCount();

//Vendas de Agosto
$vendas_agosto = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-08-01' AND '2022-08-31'");
$vendas_agosto->execute();

$qnt_vendas_agosto = $vendas_agosto->rowCount();

//Vendas de Setembro
$vendas_setembro = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-09-01' AND '2022-09-30'");
$vendas_setembro->execute();

$qnt_vendas_setembro = $vendas_setembro->rowCount();

//Vendas de Outubro
$vendas_outubro = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-10-01' AND '2022-10-31'");
$vendas_outubro->execute();

$qnt_vendas_outubro = $vendas_outubro->rowCount();

//Vendas de Novembro
$vendas_novembro = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-11-01' AND '2022-11-30'");
$vendas_novembro->execute();

$qnt_vendas_novembro = $vendas_novembro->rowCount();

//Vendas de Dezembro
$vendas_dezembro = $pdo->prepare("SELECT * from pedidos where ped_data between '2022-12-01' AND '2022-12-31'");
$vendas_dezembro->execute();

$qnt_vendas_dezembro = $vendas_dezembro->rowCount();

?>