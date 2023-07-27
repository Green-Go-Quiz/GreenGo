<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
require_once(__DIR__ . "/../../bootstrap/nav.php");

?>

<?php include_once("bootstrap/menu.php"); ?>

<h3 class="text-center">Alterar Quiz</h3>

<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-6">
            <form id="frmAltQuiz" method="POST" action="<?= BASEURL ?>/controller/QuizController.php?action=edit">
                <div class="form-group">
                    <label for="txtNomeQuiz">Nome do Quiz:</label>
                    <input class="form-control" type="text" id="txtNomeQuiz" name="nomeQuiz" maxlength="45" placeholder="Informe o nome do quiz" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getNomeQuiz() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtMaximoPergunta">Máximo de Perguntas:</label>
                    <input class="form-control" type="number" id="txtMaximoPergunta" name="maximoPergunta" min="1" placeholder="Informe o máximo de perguntas" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getMaximoPergunta() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtComTempo">Com Tempo:</label>
                    <input class="form-control" type="number" id="txtComTempo" name="comTempo" min="0" max="1" placeholder="Informe se o quiz possui tempo" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getComTempo() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtQuantTempo">Quantidade de Tempo:</label>
                    <input class="form-control" type="number" id="txtQuantTempo" name="quantTempo" min="1" placeholder="Informe a quantidade de tempo" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getQuantTempo() : ''); ?>" />
                </div>
                

                <div class="form-group">
                    <label for="txtIdQuestao">ID da Questão:</label>
                    <input class="form-control" type="number" id="txtIdQuestao" name="idQuestao" min="1" 
                    placeholder="Informe o ID da questão" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getIdQuestao() : ''); ?>" />
                </div>

                <input type="hidden" id="hddIdQuiz" name="idQuiz" value="<?= $dados['idQuiz']; ?>" />

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
            <a class="btn btn-secondary" href="<?= BASEURL ?>/controller/QuizController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>