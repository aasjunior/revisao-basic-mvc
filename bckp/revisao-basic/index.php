<?php 
    //Insere o conteúdo de uma determinada pagina
    include("conexao.php") 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Revisão</title>
</head>
<body>

    <!-- Link para a página de cadastro -->
    <a href="cadastro.php">Cadastrar</a>
    <hr>

    <!-- Abrirá a página 'index.php'. Os dados serão enviados pelo método 'post' -->
    <form action="index.php" method="post">
        <input type="text" name="buscar" size="30" placeholder="Buscar">
        <input type="submit" value="Buscar">
    </form>
    <hr>

    <?php

        //
        if(empty($_POST["buscar"])){
            echo "Nenhum resultado";
        }else{ 
            $varBusca = $_POST["buscar"];
    ?>

    <table border="1" width="450">
        <tr>
            <td>Frase</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>  

        <?php   

            //Executa uma query SQL
            $query = mysqli_query($conexao, "SELECT * FROM aluno WHERE nome LIKE '%$varBusca%'");

            //Organiza o resultado da query em um vetor
            while($exibe = mysqli_fetch_array($query)){

                $varSexo = ($exibe[3]=="m")?"o":"a";
                
                echo "<tr>" .
                        "<td>". strtoupper($varSexo) .  " alun$varSexo <b>". $exibe[1] ."</b> mora na cidade de ". $exibe[2].".</td>" .
                        "<td><a href='cadastroAtualiza.php?ida=".$exibe[0]."'>Editar</a></td>" .
                        
                        
                        "<td><a href='deletarAluno.php?ida=".$exibe[0]."'>Excluir</a></td>" .
                     
                     "</tr>";
            }
        
        ?>
    </table>

    <?php } ?>
</body>
</html>