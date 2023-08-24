<?php
    // Receber os dados do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Verificar se o usuario clicou no botao
    if (!empty($dados['SalvarFoto'])) {

        $arquivo = $dados['lan_img'];
        //var_dump($dados);
        //var_dump($arquivo);

        // Criar a QUERY cadastrar no banco de dados
        $query_usuario = "INSERT INTO lanches (lan_nome, lan_desc, lan_preco, lan_img) VALUES (:lan_nome, :lan_desc, :lan_preco, :lan_img)";
        $cad_usuario = $pdo->prepare($query_usuario);
        $cad_usuario->bindParam(':lan_nome', $dados['lan_nome'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':lan_desc', $dados['lan_desc']);
        $cad_usuario->bindParam(':lan_preco', $dados['lan_preco']);
        $cad_usuario->bindParam(':lan_img', $arquivo['name'], PDO::PARAM_STR);
        $cad_usuario->execute();

        // Verificar se cadastrou com sucesso
        if ($cad_usuario->rowCount()) {
            // Verificar se o usuario esta enviando a foto
            if ((isset($arquivo['name'])) and (!empty($arquivo['name']))) {
                // Recuperar ultimo ID inserido no banco de dados
                $ultimo_id = $pdo->lastInsertId();

                // Diretorio onde o arquivo sera salvo
                $diretorio = "../img/cardapio/";

                // Upload do arquivo
                $nome_arquivo = $arquivo['name'];
                move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo);

                header("Location: index.php?page=dashboard/config");
            } else {

                header("Location: index.php?page=dashboard/config");
            }
        } else {
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
        }
    }else{
        echo "deu erro tio";
    }


    ?>