<?php

//Compras total
$compras_total = $pdo->prepare("SELECT * from compras");
$compras_total->execute();

$qnt_compras_total = $compras_total->rowCount();

//Compras de Janeiro
$compras_janeiro = $pdo->prepare("SELECT * from compras where com_data between '2022-01-01' AND '2022-01-31'");
$compras_janeiro->execute();

$qnt_compras_janeiro = $compras_janeiro->rowCount();

//Compras de Fevereiro
$compras_fevereiro = $pdo->prepare("SELECT * from compras where com_data between '2022-02-01' AND '2022-02-30'");
$compras_fevereiro->execute();

$qnt_compras_fevereiro = $compras_fevereiro->rowCount();

//Compras de Março
$compras_marco = $pdo->prepare("SELECT * from compras where com_data between '2022-03-01' AND '2022-03-31'");
$compras_marco->execute();

$qnt_compras_marco = $compras_marco->rowCount();

//Compras de Abril
$compras_abril = $pdo->prepare("SELECT * from compras where com_data between '2022-04-01' AND '2022-04-30'");
$compras_abril->execute();

$qnt_compras_abril = $compras_abril->rowCount();

//Compras de Maio
$compras_maio = $pdo->prepare("SELECT * from compras where com_data between '2022-05-01' AND '2022-05-31'");
$compras_maio->execute();

$qnt_compras_maio = $compras_maio->rowCount();

//Compras de Junho
$compras_junho = $pdo->prepare("SELECT * from compras where com_data between '2022-06-01' AND '2022-06-30'");
$compras_junho->execute();

$qnt_compras_junho = $compras_junho->rowCount();

//Compras Julho
$compras_julho = $pdo->prepare("SELECT * from compras where com_data between '2022-07-01' AND '2022-07-31'");
$compras_julho->execute();

$qnt_compras_julho = $compras_julho->rowCount();

//Compras de Agosto
$compras_agosto = $pdo->prepare("SELECT * from compras where com_data between '2022-08-01' AND '2022-08-31'");
$compras_agosto->execute();

$qnt_compras_agosto = $compras_agosto->rowCount();

//Compras de Setembro
$compras_setembro = $pdo->prepare("SELECT * from compras where com_data between '2022-09-01' AND '2022-09-30'");
$compras_setembro->execute();

$qnt_compras_setembro = $compras_setembro->rowCount();

//Compras de Outubro
$compras_outubro = $pdo->prepare("SELECT * from compras where com_data between '2022-10-01' AND '2022-10-31'");
$compras_outubro->execute();

$qnt_compras_outubro = $compras_outubro->rowCount();

//Compras de Novembro
$compras_novembro = $pdo->prepare("SELECT * from compras where com_data between '2022-11-01' AND '2022-11-30'");
$compras_novembro->execute();

$qnt_compras_novembro = $compras_novembro->rowCount();

//Compras de Dezembro
$compras_dezembro = $pdo->prepare("SELECT * from compras where com_data between '2022-12-01' AND '2022-12-31'");
$compras_dezembro->execute();

$qnt_compras_dezembro = $compras_dezembro->rowCount();

?>