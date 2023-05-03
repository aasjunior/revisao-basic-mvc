<?php
    function upload($conexao, $arquivos, $action, $id = false){
        $maxSize = $_POST['MAX_FILE_SIZE'];
        $destino = '';

        if($action === "insert"){
            $stmt = mysqli_prepare($conexao, "INSERT INTO imagesPNG(dir) VALUES(?)");
            mysqli_stmt_bind_param($stmt, "s", $destino);

        }else if($action === "update" && $id){
            $stmt = mysqli_prepare($conexao, "UPDATE imagesPNG SET dir = ? WHERE id = ?");

            // mysqli_stmt_bind_param() => vincula as variaveis '$destino' e '$id' com a instrução preparada '$stmt'
            // "si" => 's' declara que o a variavel '$destino' é uma string e 'i' declara que a variavel '$id' é um inteiro  
            mysqli_stmt_bind_param($stmt, "si", $destino, $id);
        }else{
            // Interrompe execução retornando mensagem de erro
            throw new Exception("Ação inválida para manipulação no banco de dados");
        }

        foreach($arquivos['error'] as $i => $error){
            if($error !== UPLOAD_ERR_OK){
                throw new Exception("Erro ao enviar o arquivo: ".$arquivoss['name'][$i]);
            }

            $nome = md5Random($arquivos['name'][$i]);
            $destino = "../src/uploads/".$nome.".png";

            if($arquivos['size'][$i] > $maxSize){
                throw new Exception("Tamanho do arquivo excede o máximo permitido");
            }
            if($arquivos['type'][$i] !== "image/png"){
                throw new Exception("Tipo de arquivo inválido");
            }
            if(!move_uploaded_file($arquivos['tmp_name'][$i], $destino)){
                throw new Exception("Erro ao enviar o arquivo: ".$arquivos['name'][$i]);
            }

            mysqli_stmt_execute($stmt);
        }

        return true;
    }

    function md5Random($nome){
        $nomeRand = md5($nome . rand(0, 9999));
        $arquivoss = glob('../src/uploads/*.png*');
    
        if(count($arquivoss) > 0){
            foreach($arquivoss as $arquivos){
                if(strpos($arquivos, $nomeRand) != false){
                    md5Random($nome);
                }else{
                    return $nomeRand;
                }
            }
        }else{
            return $nomeRand;
        }
    }
?>