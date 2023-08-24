<?php

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($data['usu_login']) && !empty($data['usu_senha']) && !empty($data['usu_nome']) && !empty($data['usu_end'])){
    
    $sth = $pdo->prepare("SELECT * FROM usuarios where usu_login = :usu_login");
    $sth->bindValue(':usu_login', $data['usu_login']);
    $sth->execute();

    if ($sth->rowCount() < 1) {

        // $data['usu_senha'] = MD5($data['usu_senha']); ISSO AQUI É PRA CRIPTOGRAFAR
        $fields = implode(', ', array_keys($data));
        $Places = ':' . implode(', :', array_keys($data));
        $Tabela = 'usuarios';
        $Create = "INSERT INTO {$Tabela} ({$fields}) VALUES ({$Places})";
        $cad = $pdo->prepare($Create);
        $cad->execute($data);

        $ultimo_id = $pdo->lastInsertId();

        //criação de sessão
        $_SESSION['login']['usu_id'] = $ultimo_id;
        $_SESSION['login']['usu_login'] = $data['usu_login'];
        $_SESSION['login']['usu_end'] = $data['usu_end'];
        $_SESSION['login']['usu_nome'] = $data['usu_nome'];

        //Select nivel -> CODIGO DO NIVEL :
        $sth_nivel = $pdo->prepare("SELECT * FROM nivel where niv_id = :niv_id");
        $sth_nivel->bindValue(':niv_id', $data['usu_niv']);
        $sth_nivel->execute();
        $row_nivel = $sth_nivel->fetch(PDO::FETCH_ASSOC);
        extract($row_nivel);
        $_SESSION['login']['niv_categoria'] = $niv_categoria;
        $_SESSION['login']['niv_nome'] = $niv_nome;
        $_SESSION['login']['niv_id'] = $niv_id;

        header('LOCATION: index.php?page=perfil'); //redirecionar
    } else {
        //header('LOCATION: formulario_login.php);
        header('LOCATION: index.php?page=login&error=exist');
    }

}else{
    //header('LOCATION: formulario_login.php);
    header('LOCATION: index.php?page=login&error=notfound');
}

?>