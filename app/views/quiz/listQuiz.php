<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/listQuiz.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>

    <div>
        <h1 class="tituloQuiz text-center">Lista de Quizzes</h1>
        <br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm w-100 min-vh-25">
                    <div class="card-body">
                        <a class="btn btn-success btn-block h-100 d-flex justify-content-center align-items-center" href="<?= BASEURL ?>/controllers/QuizController.php?action=create">
                            <span class="botaoInserir">Inserir Novo Quiz</span>
                        </a>
                    </div>
                </div>
            </div>

            <?php foreach ($dados['lista'] as $quiz) : ?>
                <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card mb-4 shadow-sm w-100 min-vh-25">
                        <div class="card-body">
                            <h3 class="card-title nomeQuiz"><?= $quiz->getNomeQuiz(); ?></h3>
                            <p>
                                <span class="labelQuiz">Nome do Quiz:</span>
                                <span class="dadosQuiz"><?= $quiz->getNomeQuiz(); ?></span>
                            </p>
                            <p>
                                <span class="labelQuiz">Nome da Zona:</span>
                                <span class="dadosQuiz"><?= $quiz->getZona()->getNomeZona(); ?></span>
                            </p>
                            <p>
                                <span class="labelQuiz">Máximo de Questões:</span>
                                <span class="dadosQuiz"><?= $quiz->getMaximoPergunta(); ?></span>
                            </p>
                            <p>
                                <span class="labelQuiz">Limite de Tempo:</span>
                                <span class="dadosQuiz"><?= $quiz->getComTempo() == 1 ? 'Sim' : 'Não'; ?></span>
                            </p>
                            <?php if ($quiz->getComTempo() == 1) : ?>
                                <p>
                                    <span class="labelQuiz">Tempo em minutos:</span>
                                    <span class="dadosQuiz"><?= $quiz->getQuantTempo(); ?></span>
                                </p>
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

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/registro.js"></script>
</body>

</html>