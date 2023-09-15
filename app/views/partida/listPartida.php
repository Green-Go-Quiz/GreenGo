<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/list.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>

    <h1 class="tituloPagina text-center">Lista de Partidas</h1>
    <br>
    <div class="container">
        <div class="row">
            <?php foreach ($dados['lista'] as $partida) : ?>
                <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                    <div class="card mb-4 shadow-sm w-100 min-vh-25 cardInserido">
                        <div class="card-body ">
                            <h5 class="card-title nomeCard"><?= $partida->getNomePartida(); ?></h5>
                            <p>
                                <span class="nomeAtributo labelQuestao">Zonas:</span>
                                <span class="dadoAtributo"><?= $partida->getZonasTexto() ?></span>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="<?= BASEURL ?>/controllers/PartidaQuizController.php?action=create&id=<?= $partida->getIdPartida() ?>" class="btn btn-sm btn-success botaoEspecies">Quizzes</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!--/div-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="js/registro.js"></script>
</body>

</html>