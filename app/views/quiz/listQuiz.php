<?php
#Nome do arquivo: quiz/list.php
#Objetivo: interface para listagem dos quizzes do sistema

require_once(__DIR__ . "/../bootstrap/header.php");
require_once(__DIR__ . "/../bootstrap/nav.php");


?>
<link rel="stylesheet" href="../css/index.css">
<link rel="stylesheet" href="../css/cabecalho.css">

<h3 class="text-center">Lista de Quizzes</h3>
<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" href="<?= BASEURL ?>/controller/QuizController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabQuizzes" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Máximo de Questões</th>
                        <th>Nome do Quiz</th>
                        <th>Com Limite de Tempo</th>
                        <th>Quantidade de Tempo</th>
                        <th>ID da Questão</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($dados['lista'] as $quiz) : ?>
                        <tr>
                            <td><?php echo $quiz->getIdQuiz(); ?></td>
                            <td><?= $quiz->getMaximoPergunta(); ?></td>
                            <td><?= $quiz->getNomeQuiz(); ?></td>
                            <td><?= $quiz->getComTempo() == 1 ? 'Sim' : 'Não'; ?></td>
                            <td><?= $quiz->getQuantTempo(); ?></td>
                            <td><?= $quiz->getIdQuestao(); ?></td>

                            <td>
                                <a class="btn btn-primary" href="<?= BASEURL ?>/controller/QuizController.php?action=edit&id=<?= $quiz->getIdQuiz() ?>">
                                    Alterar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="<?= BASEURL ?>/controller/QuizController.php?action=delete&id=<?= $quiz->getIdQuiz() ?>">
                                    Excluir
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once(__DIR__ . "/../include/footer.php");
?>