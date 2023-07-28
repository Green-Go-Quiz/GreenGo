<?php
#Nome do arquivo: quiz/list.php
#Objetivo: interface para listagem dos quizzes do sistema

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>


    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/cabecalho.css">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/listQuiz.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>

    <h3 class="title-margin text-left">Lista de Quizzes</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm w-100">
                    <div class="card-body">
                        <a class="btn btn-success btn-block h-100 d-flex justify-content-center align-items-center" href="<?= BASEURL ?>/controllers/QuizController.php?action=create">
                            Inserir Novo Quiz
                        </a>
                    </div>
                </div>
            </div>

            <?php foreach ($dados['lista'] as $quiz) : ?>
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= $quiz->getNomeQuiz(); ?></h5>
                            <p><span class="labelQuiz">Nome do Quiz:</span> <?= $quiz->getNomeQuiz(); ?></p>
                            <p><strong>Nome da Zona:</strong> <?= $quiz->getZona()->getNomeZona(); ?></p>
                            <p><strong>Máximo de Questões:</strong> <?= $quiz->getMaximoPergunta(); ?></p>
                            <p><strong>Com Limite de Tempo:</strong> <?= $quiz->getComTempo() == 1 ? 'Sim' : 'Não'; ?></p>
                            <?php if ($quiz->getComTempo() == 1) : ?>
                                <p><strong>Quantidade de Tempo (em minutos):</strong> <?= $quiz->getQuantTempo(); ?></p>
                            <?php endif; ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="<?= BASEURL ?>/controllers/QuizController.php?action=edit&id=<?= $quiz->getIdQuiz() ?>" class="btn btn-sm btn-primary">Alterar</a>
                                    <a href="<?= BASEURL ?>/controllers/QuizController.php?action=delete&id=<?= $quiz->getIdQuiz() ?>" class="btn btn-sm btn-secondary" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php
    //require_once(__DIR__ . "/../include/footer.php");
    ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/registro.js"></script>
</body>

</html>