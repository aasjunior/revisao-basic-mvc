<?php
    $guardarNome = $_POST['campoNome'];
    $guardarSenha = $_POST['campoSenha'];

    if($guardarNome == "Fatec" && $guardarSenha === "123"){
        session_start();
        $_SESSION['logado']=1;
        $_SESSION['usuario']="Maria";
        header("location:../views/index.php");
    }else{
        echo "Erro";
    }
?>