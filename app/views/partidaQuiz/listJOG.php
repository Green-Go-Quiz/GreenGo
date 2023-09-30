<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/list.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navJOGADOR.php"); ?>

    <h1 class="tituloPagina text-center">Partidas</h1>
    <br>
    <div class="container">

        <div class="row">
            <?php
            $partidaQuizQuizzes = $dados['listaPartidasQuiz'];
            if ($partidaQuizQuizzes) {
                foreach ($partidaQuizQuizzes as $partidaQuiz) {
                    $partida = $partidaQuiz->getPartida();

            ?>

                    <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                        <div class="card mb-4 shadow-sm w-100 min-vh-25 cardInserido">
                            <div class="card-body ">
                                <h5 class="card-title nomeCard"><?= $partida->getNomePartida(); ?></h5>
                                <p>
                                    <span class="nomeAtributo labelQuestao">Zona:</span>
                                    <?php
                                    $zonas = $partida->getZonas();
                                    $numZonas = count($zonas);
                                    foreach ($zonas as $index => $zona) {
                                        echo '<span class="dadoAtributo">' . $zona->getNomeZona() . '</span>';
                                        if ($index < $numZonas - 1) {
                                            echo ', ';
                                        }
                                        echo '<br>';
                                    }
                                    ?>
                                </p>

                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="<?= BASEURL ?>/controllers/PartidaQuizController.php?action=listarQuiz&id=<?= $partidaQuiz->getIdPartida() ?>" class="btn btn-sm btn-success botaoEspecies">Jogar</a>
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
            <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
        </div>
    </div>


    <!--/div-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="js/registro.js"></script>
</body>

</html>