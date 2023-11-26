<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/list.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navJOGADOR.php"); ?>

    <div class="container mt-4">
        <h1 class="tituloPagina text-center">Quizzes</h1>
        <br>

        <div class="row">
            <div class="col-md-12">
                <h4 id="quest" class="text-left tituloPagina">
                    Quizzes adicionados à Partida "<span><?= isset($dados['partida']) ? $dados['partida']->getNomePartida() : '---'; ?></span>"</h4>
            </div>
        </div>

        <div class="row">
            <?php
            $partida = $dados['partida'];
            $quizzes = $dados['quizzes'];
            if ($quizzes) {
                foreach ($quizzes as $quiz) {
            ?>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card cardInserido h-100">
                            <div class="card-body">
                                <h5 class="card-title nomeCard"><?= $quiz->getNomeQuiz(); ?></h5>
                                <p class="nomeAtributo labelQuestao">Zona:
                                    <span class="dadoAtributo"><?= $quiz->getZona()->getNomeZona(); ?></span>
                                </p>
                                <p class="nomeAtributo labelQuestao">Com limite de tempo:
                                    <span class="dadoAtributo"><?= $quiz->getComTempoTexto(); ?></span>
                                </p>
                                <p class="nomeAtributo labelQuestao">Quantidade de Tempo:
                                    <span class="dadoAtributo">
                                        <?php
                                        if (!$quiz->getComTempo()) {
                                            echo "--";
                                        } else {
                                            echo $quiz->getQuantTempo() . " min";
                                        }
                                        ?>
                                    </span>
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <?php if (!$quiz->getJogado()) : ?>
                                            <a href="<?= BASEURL ?>/controllers/JogarController.php?action=listarQuestao&id=<?= $quiz->getIdQuiz() ?>&idPartida=<?= $dados['partida']->getIdPartida() ?>" class="btn btn-sm btn-success botaoEspecies mx-auto">Jogar</a>
                                        <?php else : ?>
                                            <a href="<?= BASEURL ?>/controllers/JogarController.php?action=listarPontuacao&id=<?= $quiz->getIdQuiz() ?>&idPartida=<?= $dados['partida']->getIdPartida() ?>" class="btn btn-sm btn-success botaoPontuacao mx-auto">Pontuação</a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="text-left">
            <a href="javascript:history.back()" class="btn btn-secondary botaoVoltar">Voltar</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="js/registro.js"></script>

</body>

</html>