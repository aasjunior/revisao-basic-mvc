<?php
    include("../models/conexao.php");
    if(mysqli_query($conexao,"DELETE FROM aluno WHERE codigo = ".$_POST["id"])){
        echo "Arquivo excluído com sucesso";
    }else{
        echo "Não foi possível excluir o arquivo";
    }
?> 