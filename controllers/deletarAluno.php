<?php
    include("../models/conexao.php");

    $imagens_dir = mysqli_query($conexao, "SELECT imagens.dir 
                                           FROM imagens 
                                           INNER JOIN aluno_imagens ON imagens.id = aluno_imagens.imagemCodigo 
                                           INNER JOIN aluno ON aluno.codigo = aluno_imagens.alunoCodigo 
                                           WHERE aluno.codigo = ".$_POST["id"]);



    if(mysqli_query($conexao, "DELETE aluno, imagens, aluno_imagens FROM aluno 
                               INNER JOIN aluno_imagens ON aluno.codigo = aluno_imagens.alunoCodigo
                               INNER JOIN imagens ON aluno_imagens.imagemCodigo = imagens.id
                               WHERE aluno.codigo = ".$_POST["id"])){
    
        while ($imagem = mysqli_fetch_array($imagens_dir)) {
            if (file_exists($imagem)) {
                unlink($imagem);
            }
        }
        echo "Arquivo excluído com sucesso";
    } else{
        echo "Não foi possível excluir o arquivo";
    }
    
?> 