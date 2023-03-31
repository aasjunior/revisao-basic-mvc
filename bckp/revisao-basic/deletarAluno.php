<?php
    //Incluindo a página de conexão
    include("conexao.php");

    //Armazena infomação passada pela 'url' pelo método 'get' (ida = id do aluno)
    $varIda = $_GET["ida"];

    //Executar a query a partir das informações do 'get'
    mysqli_query($conexao,"DELETE FROM aluno WHERE codigo = $varIda");

    //Redireciona para página declarada no argumento
    header("location:index.php");
?> 