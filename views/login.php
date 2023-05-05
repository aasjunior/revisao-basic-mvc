<?php 
    include("../models/conexao.php");
    include("./blades/header.php");
    include("../src/assets/helpers/scripts.php");
?>
<main class="container bg-white w-50 mt-5 rounded-2 p-3 shadow-lg">
    <form class="container p-4 border" action="../controllers/validar.php" method="post">
        <legend class="mb-4">Login</legend>
        <div class="my-3">
            <label class="form-label">Nome</label>
            <input class="form-control" type="text" name="campoNome" required>
        </div>
        <div class="my-3">
            <label class="form-label">Senha</label>
            <input class="form-control" type="password" name="campoSenha" required>
        </div>
        <input class="btn btn-success" type="submit" value="Enviar">
    </form>
</main>
<?php include("./blades/footer.php"); ?>