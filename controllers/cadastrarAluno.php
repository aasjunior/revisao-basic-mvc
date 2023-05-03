<?php
    include("../models/conexao.php");
    include("../src/assets/helpers/scripts.php");

    $arquivo = $_FILES['arquivo'] ?? FALSE;

    try{
        $imagens_ids = upload($conexao, $arquivo, 'insert');
        
        $query  = "INSERT INTO aluno(nome, cidade, sexo) VALUES(?, ?, ?)";
        mysqli_stmt_bind_param($stmt, "sss", $_POST["alunoNome"], $_POST["alunoCidade"], $_POST["alunoSexo"]);
        mysqli_stmt_execute($stmt);

        // Retorna o id do aluno inserido no BD
        $aluno_id = mysqli_insert_id($conexao);

        // Insere os IDs das imagens e do aluno na tabela 'aluno_images'
        foreach($imagens_ids as $imagem_id){
            $query = "INSERT INTO aluno_images(alunoCodigo, imageCodigo) VALUES(?, ?)";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "ii", $aluno_id, $imagem_id);
            mysqli_stmt_execute($stmt);
        }

        echo "Aluno cadastrado com sucesso";

    }catch(Exception $e){
        echo "Erro ao inserir dados: ".$e->getMessage();
    }
?>