<?php

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($data['usu_login']) && !empty($data['usu_senha']) && !empty($data['usu_nome'])){
    
    $sth = $pdo->prepare("SELECT * FROM usuarios where usu_login = :usu_login");
    $sth->bindValue(':usu_login', $data['usu_login']);
    $sth->execute();

    if ($sth->rowCount() < 1) {
        $row = $sth->fetch(PDO::FETCH_ASSOC);

        // $data['usu_senha'] = MD5($data['usu_senha']); ISSO AQUI É PRA CRIPTOGRAFAR
        $fields = implode(', ', array_keys($data));
        $Places = ':' . implode(', :', array_keys($data));
        $Tabela = 'usuarios';
        $Create = "INSERT INTO {$Tabela} ({$fields}) VALUES ({$Places})";
        $cad = $pdo->prepare($Create);
        $cad->execute($data);

        header('LOCATION: index.php?page=dashboard/config'); //redirecionar
    } else {
        //header('LOCATION: formulario_login.php);
        header('LOCATION: index.php?page=dashboard/config&error=exist');
        var_dump($data);
    }

}else{
    //header('LOCATION: formulario_login.php);
    header('LOCATION: index.php?page=dashboard/config&error=notfound');
    var_dump($data);
}

?>