<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/quiz.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navJOGADOR.php"); ?>

    <div class="container mt-4">
        <h1 class="tituloPagina text-center">Quiz</h1>
        <br>

        <div class="row">
            <div class="col-md-12">
                <h4 id="quest" class="text-left tituloPagina">
                    Pergunta <span id="questionNumber">1</span>
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="questionDescription" class="text-center mb-4">
                    <!-- Question Description Goes Here -->
                    <p class="nomeAtributo labelQuestao">Com limite de tempo:
                        <span class="dadoAtributo"><?= $questao->getDescricaoQ(); ?></span>
                    </p>
                </div>
                <!-- Display Image Here (if available) -->
                <img src="image_url_here" alt="Question Image" class="img-fluid mx-auto d-block mb-4">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Option 1 -->
                <button type="button" class="btn btn-primary btn-block answerBtn" data-answer="option1">Option 1</button>
            </div>
            <div class="col-md-6">
                <!-- Option 2 -->
                <button type="button" class="btn btn-primary btn-block answerBtn" data-answer="option2">Option 2</button>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <!-- Option 3 -->
                <button type="button" class="btn btn-primary btn-block answerBtn" data-answer="option3">Option 3</button>
            </div>
            <div class="col-md-6">
                <!-- Option 4 -->
                <button type="button" class="btn btn-primary btn-block answerBtn" data-answer="option4">Option 4</button>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="js/quiz.js"></script>
</body>

</html>