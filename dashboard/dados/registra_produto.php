<?php
// require 'conexao.php';
// session_start();


$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// $data['usu_senha'] = MD5($data['usu_senha']); ISSO AQUI É PRA CRIPTOGRAFAR
$fields = implode(', ', array_keys($data));
$Places = ':' . implode(', :', array_keys($data));
$Tabela = 'produtos';
$Create = "INSERT INTO {$Tabela} ({$fields}) VALUES ({$Places})";
$sth = $pdo->prepare($Create);
$sth->execute($data);

$sth = $pdo->prepare("SELECT * FROM produtos where pro_nome = :pro_nome and  pro_qnt = :pro_qnt");
$sth->bindValue(':pro_nome', $data['pro_nome']);
$sth->bindValue(':pro_qnt', $data['pro_qnt']);
$sth->execute();

header('LOCATION: index.php?page=dashboard/config');
?>