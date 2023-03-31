<?php
    //Incluindo a página de conexão
    include("conexao.php");

    //Armazenando nas variáveis os 'names' dos 'inputs'
    $varAlunoNome = $_POST["alunoNome"];
    $varAlunoCidade = $_POST["alunoCidade"];
    $varAlunoSexo = $_POST["alunoSexo"];

    //Executar a query a partir das informações do 'post'
    mysqli_query($conexao, "INSERT INTO aluno(nome, cidade, sexo) VALUES('$varAlunoNome', '$varAlunoCidade', '$varAlunoSexo')");

    //Redireciona para página declarada no argumento
    header("location:index.php");
?>