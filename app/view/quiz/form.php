<?php
#Nome do arquivo: quiz/form.php
#Objetivo: interface para cadastro/alteração de quizzes

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if ($dados['id'] == 0) echo "Inserir";
    else echo "Alterar"; ?>
    Quiz
</h3>

<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
            <form id="frmQuiz" method="POST" action="<?= BASEURL ?>/controller/QuizController.php?action=save">
                <div class="form-group">
                    <label for="txtMaximoPergunta">Máximo de perguntas:</label>
                    <input class="form-control" type="number" id="txtMaximoPergunta" name="maximoPergunta" min="1" 
                    placeholder="Informe o máximo de perguntas do quiz" value="<?php
                  echo (isset($dados["quiz"]) ? $dados["quiz"]->getMaximoPergunta() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtNomeQuiz">Nome do Quiz:</label>
                    <input class="form-control" type="text" id="txtNomeQuiz" name="nomeQuiz" maxlength="45" placeholder="Informe o nome do quiz" value="<?php
                  echo (isset($dados["quiz"]) ? $dados["quiz"]->getNomeQuiz() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="chkComTempo">Limite de tempo:</label>
                    <input type="checkbox" id="chkComTempo" name="comTempo" <?php echo (isset($dados["quiz"]) && $dados["quiz"]->getComTempo() == 1) ? "checked" : ""; ?>>
                </div>

                <div class="form-group">
                    <label for="txtQuantTempo">Quantidade de Tempo em Minutos:</label>
                    <input class="form-control" type="number" id="txtQuantTempo" name="quantTempo" min="1" placeholder="Informe a quantidade de tempo do quiz" 
                    value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getQuantTempo() * 60 : ''); ?>" />
                </div>


                <input type="hidden" id="hddIdQuiz" name="idQuiz" value="<?= $dados['id']; ?>" />

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