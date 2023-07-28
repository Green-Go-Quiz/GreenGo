<?php
#Nome do arquivo: usuario/list.php
#Objetivo: interface para listagem dos usuários do sistema


require_once(__DIR__ . "/../include/menu.php");
?> <?php include_once("bootstrap/menu.php"); ?>

<h3 class="text-center">Alterar Questão</h3>


<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
            <form id="frmAltQuestao" method="POST" action="<?= BASEURL ?>/controller/QuestaoController.php?action=edit">
                <div class="form-group">
                    <label for="txtDescricaoQ">Descrição:</label>
                    <input class="form-control" type="text" id="txtDescricaoQ" name="DescricaoQ" maxlength="200" placeholder="Informe a descrição da questão" value="<?php
                                                                                                                                                                        echo (isset($dados["questao"]) ? $dados["questao"]->getDescricaoQ() : ''); ?>" />
                </div>

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
                 
 <!-- teste para alterar a alternativa-->
  
 <?php foreach ($dados['alternativas'] as $index => $alternativa) : ?>
            <div class="form-group">
                <label for="alternativa<?= $index + 1 ?>">Alternativa <?= $index + 1 ?>:</label>
                <input class="form-control" type="text" id="alternativa<?= $index + 1 ?>" name="alternativa<?= $index + 1 ?>" maxlength="200" placeholder="Informe a alternativa" value="<?= $alternativa->getDescricaoAlternativa() ?>" />
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="alternativa_correta<?= $index + 1 ?>" name="alternativa_correta" value="<?= $index ?>" <?php echo ($alternativa->isAlternativaCerta()) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="alternativa_correta<?= $index + 1 ?>">É a alternativa correta?</label>
                </div>
            </div>
        <?php endforeach; ?>

     

               


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