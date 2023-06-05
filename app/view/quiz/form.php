<?php
#Nome do arquivo: quiz/form.php
#Objetivo: interface para cadastro/alteração de quizzes

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
require_once(__DIR__ . "/../../dao/QuestaoDAO.php"); // Importando o DAO de Questão

// Obter a lista de perguntas para exibição no dropdown
$questaoDAO = new QuestaoDAO();
$perguntas = $questaoDAO->list();

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
                    <label for="radComTempo">Com Limite de Tempo:</label>

                    <!-- 0 representa "não", enquanto 1 representa "sim".
                        Foi optado para ser feito desta maneira por conta do fato de que o atributo comTempo
                    é um tinyint !-->

                    <input type="radio" id="radComTempoSim" name="comTempo" value="1" <?php echo (isset($dados["quiz"]) && $dados["quiz"]->getComTempo() == 1) ? "checked" : ""; ?>>
                    <label for="radComTempoSim">Sim</label>
                    <input type="radio" id="radComTempoNao" name="comTempo" value="0" <?php echo (isset($dados["quiz"]) && $dados["quiz"]->getComTempo() == 0) ? "checked" : ""; ?>>
                    <label for="radComTempoNao">Não</label>
                </div>

                <div class="form-group" id="divQuantTempo" style="<?php echo (isset($dados["quiz"]) && $dados["quiz"]->getComTempo() == 1) ? 'block' : 'none'; ?>">
                    <label for="txtQuantTempo">Quantidade de Tempo:</label>
                    <input class="form-control" type="number" id="txtQuantTempo" name="quantTempo" min="1" placeholder="Informe a quantidade de tempo do quiz" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getQuantTempo() * 60 : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtQuantTempo">Quantidade de Tempo em Minutos:</label>
                    <input class="form-control" type="number" id="txtQuantTempo" name="quantTempo" min="1" placeholder="Informe a quantidade de tempo do quiz" 
                    value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getQuantTempo() * 60 : ''); ?>" />
                    <label>Perguntas:</label>
                    <?php foreach ($perguntas as $pergunta) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pergunta->getDescricaoQ() ?></h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pergunta<?= $pergunta->getIdQuestao() ?>" name="perguntas[]" value="<?= $pergunta->getIdQuestao() ?>" <?php echo (isset($dados["quiz"]) && in_array($pergunta->getIdQuestao(), $dados["quiz"]->getPerguntas())) ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="pergunta<?= $pergunta->getIdQuestao() ?>">Selecionar</label>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <script>
                    var radComTempoSim = document.getElementById('radComTempoSim');
                    var radComTempoNao = document.getElementById('radComTempoNao');
                    var divQuantTempo = document.getElementById('divQuantTempo');

                    function toggleQuantTempo() {
                        if (radComTempoSim.checked) {
                            divQuantTempo.style.display = 'block';
                        } else {
                            divQuantTempo.style.display = 'none';
                        }
                    }

                    radComTempoSim.addEventListener('change', toggleQuantTempo);
                    radComTempoNao.addEventListener('change', toggleQuantTempo);

                    // Chamar a função inicialmente para definir o estado inicial
                    toggleQuantTempo();
                </script>


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