<?php 
    include("../models/conexao.php");
    include("./blades/header.php");

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
            <div class="row my-3">
                <div class="row">
                    <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="1000000">
                    <div class="col-6">
                        <label class="form-label">Selecione as imagens</label>    
                        <input type="file" id="file" class="form-control" name="arquivo[]" multiple="multiple" accept="image/png" required>
                    </div>
                    <div class="col-6">
                            <label class="form-label" for="select_tamanho_arquivo">Selecione o tamanho maximo das imagens:</label>
                            <select id="select_tamanho_arquivo" name="select_tamanho_arquivo" class="form-select form-select-sm w-50 h-50 rounded-2" aria-label=".form-select-sm example">
                                <option selected value="1000000">1 MB</option>
                                <option value="5242880">5 MB</option>
                                <option value="10485760">10 MB</option>
                                <option value="52428800">50 MB</option>
                                <option value="104857600">100 MB</option>
                                <option value="524288000">500 MB</option>
                                <option value="1073741824">1 GB</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="uploads" class="row"></div>
                <div class="row justify-content-end mt-3">
                    <input id="cadastrar" class="btn btn-success" type="submit" value="Cadastrar" style="width:100px">
                </div>
            </div>
        </form>
    </div>
<?php 
    }
    include("./blades/footer.php"); 
?>
