<?php
#Nome do arquivo: questao/form.php
#Objetivo: interface para cadastro de questões

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");




?>

<h3 class="text-center">
    <?php if ($dados['id'] == 0) echo "Inserir";
    else echo "Alterar"; ?>
    Questão
</h3>

<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
            <form id="frmQuestao" method="POST" action="<?= BASEURL ?>/controller/QuestaoController.php?action=save">
                <div class="form-group">
                    <label for="txtDescricaoQ">Descrição:</label>
                    <input class="form-control" type="text" id="txtDescricaoQ" name="descricao" maxlength="200" placeholder="Informe a descrição da questão" value="<?php
                                                                                                                                                                    echo (isset($dados["questao"]) ? $dados["questao"]->getDescricaoQ() : ''); ?>" />
                <div class="form-group">
                    <label for="txtGrauDificuldade">Grau de dificuldade:</label>
                    <fieldset>
                        <div>
                            <input type="radio" id="facil" name="grauDificuldade" value="facil" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "facil") ? "checked" : "" ?>>
                            <label for="facil">Fácil</label>
                        </div>

                        <div>
                            <input type="radio" id="medio" name="grauDificuldade" value="medio" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "medio") ? "checked" : "" ?>>
                            <label for="medio">Médio</label>
                        </div>

                        <div>
                            <input type="radio" id="dificil" name="grauDificuldade" value="dificil" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "dificil") ? "checked" : "" ?>>
                            <label for="dificil">Difícil</label>
                        </div>
                    </fieldset>
                </div>

                <div class="form-group">
                    <label for="txtPontuacao">Pontuação:</label>
                    <input class="form-control" type="number" id="txtPontuacao" name="pontuacao" min="1" max="100" placeholder="Informe a pontuação da questão" value="<?php echo (isset($dados["questao"]) ? $dados["questao"]->getPontuacao() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtImagem">Imagem:</label>
                    <input class="form-control" type="text" id="txtImagem" name="imagem" maxlength="255" placeholder="Informe o caminho da imagem" value="<?php echo (isset($dados["questao"]) ? $dados["questao"]->getImagem() : ''); ?>" />
                </div>

                <?php
$camposAlternativa = ["campo1", "campo2", "campo3", "campo4"];
?>

<form id="frmQuiz" method="POST" action="<?= BASEURL ?>/controller/QuestaoController.php?action=save">
    <?php foreach ($camposAlternativa as $campo): ?>
        <div class="form-group">
            <label for="txt<?= $campo ?>">Alternativa</label>
            <input class="form-control" type="text" id="txt<?= $campo ?>" name="alternativa[]" maxlength="200" 
            placeholder="Informe a descrição da alternativa" 
            value="<?php echo (isset($_POST['camposAlternativa']) && isset($_POST['camposAlternativa'][$campo])) ? $_POST['camposAlternativa'][$campo] : ''; ?>">
        </div>
    <?php endforeach; ?>
    
  
</form>


                <input type="hidden" id="hddId" name="id" value="<?= $dados['id']; ?>" />

                <button type="submit" class="btn btn-success">Gravar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </form>
        </div>

        <div class="col-6">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
            <a class="btn btn-secondary" href="<?= BASEURL ?>/controller/QuestaoController.php?action=list">Voltar</a>
        </div>
    </div>
</div>


<?php

require_once(__DIR__ . "/../include/footer.php");
?>