<?php 
    include("../models/conexao.php");
    include("./blades/header.php");
?>
<div class="container bg-white w-75 mt-5 rounded-2 p-3 shadow-lg">
    <a class="btn btn-success" href="cadastro.php">Cadastrar</a>
    <hr>
    <form action="index.php" method="post">
        <input class="form-control" type="text" name="buscar" size="30" placeholder="Buscar">
    </form>
    <hr>
    <?php
        if(empty($_POST["buscar"])){
            echo "Nenhum resultado";
        }else{ 
            $varBusca = $_POST["buscar"];
    ?>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Frase</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php   
                $query = mysqli_query($conexao, "SELECT * FROM aluno WHERE nome LIKE '%$varBusca%'");
                while($exibe = mysqli_fetch_array($query)){
                    $varSexo = ($exibe[3]=="m")?"o":"a";
                    echo "<tr>" .
                            "<td>". 
                                strtoupper($varSexo) ." alun$varSexo <b>". $exibe[1] ."</b> mora na cidade de ". $exibe[2].
                            ".</td>" .
                            "<td>".
                                "<a href='./cadastroAtualiza.php?ida=".$exibe[0]."' class='btn btn-primary'>".
                                    "<span class='material-symbols-outlined'>edit_square</span>".
                                "</a>".
                            "</td>" .
                            "<td>".
                                "<a data-bs-toggle='modal' data-bs-target='#modal-delete' data-id='".$exibe[0]."' class='btn btn-danger'>".
                                    "<span class='material-symbols-outlined'>delete</span>".
                                "</a>".
                            "</td>" .             
                        "</tr>";
                }
            ?>
        </tbody>
    </table>
<?php 
    } 
?>
</div>
<?php include("./blades/footer.php"); ?>