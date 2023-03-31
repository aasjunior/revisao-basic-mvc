<?php

// Declaração de variaveis
$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "escola";

// Realiza a conexão com o banco de dados MySQL
$conexao = mysqli_connect($servidor, $usuario, $senha);

           // Seleciona o banco de dados que será selecionado
           mysqli_select_db($conexao, $banco);
           
           // Corrige problemas de caracteres 
           mysqli_set_charset($conexao, "UTF8");

           // Teste de conexão
           //echo ($conexao)?"Ok":"Erro";
?>