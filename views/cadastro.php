<?php include("./blades/header.php"); ?>
    <div class="container bg-white w-50 mt-5 rounded-2 p-4 shadow-lg">
        <form class="container p-4 border" action="../controllers/cadastrarAluno.php" method="post">
            <legend class="mb-4">Cadastrar Aluno</legend>
            <div class="my-3">
                <label class="form-label">Nome</label>
                <input class="form-control" type="text" name="alunoNome">
            </div>
            <div class="my-3">
                <label class="form-label">Cidade</label>
                <input class="form-control" type="text" name="alunoCidade">
            </div>
            <div class="my-3">
                <label class="form-label mb-1">Sexo</label>
                <div class="form-check">  
                    <input class="form-check-input" type="radio" value="m" name="alunoSexo" id="alunoSexoM">
                    <label for="alunoSexoM" class="form-check-label">M</label><br>
                    <input class="form-check-input" type="radio" value="f" name="alunoSexo" id="alunoSexoF">
                    <label for="alunoSexoF" class="form-check-label">F</label>
                </div>
            </div>
            <input class="btn btn-success" type="submit" value="Cadastrar">
        </form>
    </div>
<?php include("./blades/footer.php"); ?>