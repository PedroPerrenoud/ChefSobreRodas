<?php
// require 'conexao.php';
// session_start();
//verifica se os dados do form estão chegando nessa página
//var_dump($_POST);
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT); //Recebe todos os dados do form
//Select Alunos
$sth = $pdo->prepare("SELECT * FROM usuarios where usu_login = :usu_login and  usu_senha = :usu_senha");
$sth->bindValue(':usu_login', $data['usu_login']);
$sth->bindValue(':usu_senha', $data['usu_senha']);
// $sth->bindValue(' :usu_senha' , MDS($data['usu_senha'])) ISSO AQUI DEIXA CODIFICADO
$sth->execute();
//rowCount -> Retorna a quantidade de registros do select
if ($sth->rowCount() > 0) {
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    extract($row);
    //criação de sessão
    $_SESSION['login']['usu_id'] = $usu_id;
    $_SESSION['login']['usu_login'] = $usu_login;
    $_SESSION['login']['usu_nome'] = $usu_nome;
    $_SESSION['login']['usu_end'] = $usu_end;

    //Select nivel -> CODIGO DO NIVEL :
    $sth_nivel = $pdo->prepare("SELECT * FROM nivel where niv_id = :niv_id");
    $sth_nivel->bindValue(':niv_id', $usu_niv);
    $sth_nivel->execute();
    $row_nivel = $sth_nivel->fetch(PDO::FETCH_ASSOC);
    extract($row_nivel);
    $_SESSION['login']['niv_categoria'] = $niv_categoria;
    $_SESSION['login']['niv_nome'] = $niv_nome;
    $_SESSION['login']['niv_id'] = $niv_id;

    header('LOCATION: index.php?page=perfil'); //redirecionar
} else {
    //header('LOCATION: formulario_login.php);
    header('LOCATION: index.php?error=notfound');
}
?>