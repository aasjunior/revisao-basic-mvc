<?php include("conexao.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>

    <?php
        //Armazena infomação passada pela 'url' pelo método 'get' (ida = id do aluno)
        $varIda = $_GET["ida"];

        //Executa uma busca pelo aluno por meio do id do aluno
        $query = mysqli_query($conexao,"SELECT * FROM aluno WHERE codigo = $varIda");


        while($exibe = mysqli_fetch_array($query)){
    ?>

    <form action="atualizarAluno.php" method="post">
        <input type="hidden" name="alunoCodigo" value="<?php echo $exibe[0] ?>">
        <label>Nome</label>
        <input type="text" name="alunoNome" value="<?php echo $exibe[1] ?>"><br>
        <label>Cidade</label>
        <input type="text" name="alunoCidade" value="<?php echo $exibe[2] ?>"><br>
        M<input type="radio" value="m" name="alunoSexo" <?php echo ($exibe[3]=="m")?"checked":""?>><br>
        F<input type="radio" value="f" name="alunoSexo" <?php echo ($exibe[3]=="f")?"checked":""?>><br>
        <input type="submit" value="Atualizar">
    </form>

    <?php } ?>

</body>
</html>