<?php
    include("../models/conexao.php");
    if(mysqli_query($conexao,"DELETE FROM aluno, imagesPNG, aluno_imagens USING aluno_imagens WHERE codigo = ".$_POST["id"])){
        echo "Arquivo excluído com sucesso";
    }else{
        echo "Não foi possível excluir o arquivo";
    }
?> 