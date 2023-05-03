<?php
    include("../models/conexao.php");
    include('../src/assets/helpers/scripts.php');

    $arquivo = $_FILES['arquivo'] ?? FALSE;
    $imagens_ids = upload($conexao, $arquivo);
    if(mysqli_query($conexao, "INSERT INTO aluno(nome, cidade, sexo) VALUES('".$_POST["alunoNome"]."', '".$_POST["alunoCidade"]."', '".$_POST["alunoSexo"]."')")){
        $aluno_id = mysqli_insert_id($conexao);
        foreach($imagens_ids as $imagem_id){
            mysqli_query($conexao, "INSERT INTO aluno_imagens(alunoCodigo, imageCodigo) VALUES($aluno_id, $imagem_id)");
            header("location:../views/");
        }
    }else{
        echo "Erro ao inserir o arquivo<br>";
        var_dump($arquivo);
        echo "<br><br>";
        var_dump($imagens_ids);
    }
    //header("location:../views/");
?>