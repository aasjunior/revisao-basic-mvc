<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    
    <!-- Os dados do post serão enviados para a página 'cadastrarAluno.php' -->
    <form action="cadastrarAluno.php" method="post">
        <label>Nome</label>
        <input type="text" name="alunoNome"><br>
        <label>Cidade</label>
        <input type="text" name="alunoCidade"><br>
        M<input type="radio" value="m" name="alunoSexo"><br>
        F<input type="radio" value="f" name="alunoSexo"><br>
        <input type="submit" value="Cadastrar">
    </form>

</body>
</html>