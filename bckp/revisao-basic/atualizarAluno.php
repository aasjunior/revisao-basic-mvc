<?php
    //Incluindo a página de conexão
    include("conexao.php");

    //Declaração dps 'posts' como variáveis
    $varAlunoCodigo = $_POST["alunoCodigo"];
    $varAlunoNome = $_POST["alunoNome"];
    $varAlunoCidade = $_POST["alunoCidade"];
    $varAlunoSexo = $_POST["alunoSexo"];

    //Atualiza as informações de acordo com o valor das variáveis
    mysqli_query($conexao, "UPDATE aluno SET nome='$varAlunoNome', cidade='$varAlunoCidade', sexo='$varAlunoSexo' WHERE codigo=$varAlunoCodigo");

    //Redireciona para a página inicial
    header("location:index.php");
?>