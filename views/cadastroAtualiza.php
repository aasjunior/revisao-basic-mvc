<?php 
    include("../models/conexao.php");
    include("blades/header.php");
?>
<?php
    $query = mysqli_query($conexao,"SELECT * FROM aluno WHERE codigo = ".$_GET["ida"]);
    while($exibe = mysqli_fetch_array($query)){
?>
    <div class="container bg-white mt-5 rounded-2 p-4 shadow-lg w-50">
        <form class="container p-4 border" action="../controllers/atualizarAluno.php" method="post">
            <legend class="mb-4">Atualizar Aluno</legend>
            <input class="form-control" type="hidden" name="alunoCodigo" value="<?php echo $exibe[0] ?>">
            <div class="my-3">
                <label class="form-label">Nome</label>
                <input class="form-control" type="text" name="alunoNome" value="<?php echo $exibe[1] ?>">
            </div>
            
            <div class="my-3">
                <label class="form-label">Cidade</label>
                <input class="form-control" type="text" name="alunoCidade" value="<?php echo $exibe[2] ?>">
            </div>
            <div class="my-3">
                <label class="form-label">Sexo</label>
                <div class="form-check">  
                    <input class="form-check-input" type="radio" value="m" name="alunoSexo" id="alunoSexoM" <?php echo ($exibe[3]=="m")?"checked":""?>>
                    <label for="alunoSexoM" class="form-check-label">M</label><br>
                    <input class="form-check-input" type="radio" value="f" name="alunoSexo" id="alunoSexoF" <?php echo ($exibe[3]=="f")?"checked":""?>>
                    <label for="alunoSexoF" class="form-check-label">F</label>
                </div>
            </div>
            <input class="btn btn-success" type="submit" value="Atualizar">
        </form>
    </div>
<?php } ?>
<?php include("blades/footer.php"); ?>
