<?php
    function upload($conexao, $arquivo){
        $imagens_ids = [];

        for($k=0; $k < count($arquivo['name']); $k++){
            if($arquivo['size'][$k] <= $_POST['select_tamanho_arquivo'] && $arquivo['type'][$k] === "image/png"){
                    if($nome = md5Random($arquivo['name'][$k])){
                        $destino = "../src/uploads/".$nome.".png";
                        if(move_uploaded_file($arquivo['tmp_name'][$k], $destino)){
                            mysqli_query($conexao, "INSERT INTO imagens(dir, size_img) values('$destino', ".$arquivo['size'][$k].")");
                            $imagens_ids[$k] = mysqli_insert_id($conexao);
                        }else{
                            echo "Erro ao enviar o arquivo!<br>".
                                "<a href='../views/'>Voltar</a>";
                        }
                    }
            }else{
                echo "Tamanho ou tipo de arquivo inválido<br><br>".
                         "<a href='../views/'>Voltar</a>";
            }
        }

        return $imagens_ids;
    }

    function md5Random($nome){
        $nomeRand = md5($nome . rand(0, 9999));
        $arquivos = glob('../src/uploads/*.png*');
    
        if(count($arquivos) > 0){
            foreach($arquivos as $arquivo){
                if(strpos($arquivo, $nomeRand) != false){
                    md5Random($nome);
                }else{
                    return $nomeRand;
                }
            }
        }else{
            return $nomeRand;
        }
    }

    function mkdirUploads(){
        if(!file_exists("../src/uploads")){
            mkdir("../src/uploads");
        }
    }

    function restrito(){
        session_start();
        if($_SESSION['logado']===1){
            echo "Bem-vindo, ".$_SESSION['usuario']."! <a href='../controllers/logoff.php'>Sair</a><hr>";
        }else{
            header("location:../views/login.php");
        }
    }
?>