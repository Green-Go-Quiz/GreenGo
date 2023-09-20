<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/list.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>

    <div>
        <h1 class="tituloPagina text-center">Lista de Quizzes</h1>
        <br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm w-100 min-vh-25">
                    <div class="card-body">
                        <a class="btn btn-success btn-block h-100 d-flex justify-content-center align-items-center botaoEspecifico " href="<?= BASEURL ?>/controllers/QuizController.php?action=create">
                            <span class="nomeBotaoEspecifico">Inserir Novo Quiz</span>
                        </a>
                    </div>
                </div>
            </div>

            <?php foreach ($dados['lista'] as $quiz) : ?>
                <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                    <div class="card mb-4 shadow-sm w-100 min-vh-25 cardInserido">
                        <div class="card-body">
                            <h3 class="card-title nomeCard"><?= $quiz->getNomeQuiz(); ?></h3>
                            <p>
                                <span class="nomeAtributo">Nome do Quiz:</span>
                                <span class="dadoAtributo"><?= $quiz->getNomeQuiz(); ?></span>
                            </p>
                            <p>
                                <span class="nomeAtributo">Nome da Zona:</span>
                                <span class="dadoAtributo"><?= $quiz->getZona()->getNomeZona(); ?></span>
                            </p>
                            <p>
                                <span class="nomeAtributo">Máximo de Questões:</span>
                                <span class="dadoAtributo"><?= $quiz->getMaximoPergunta(); ?></span>
                            </p>
                            <p>
                                <span class="nomeAtributo">Limite de Tempo:</span>
                                <span class="dadoAtributo"><?= $quiz->getComTempo() == 1 ? 'Sim' : 'Não'; ?></span>
                            </p>
                            <?php if ($quiz->getComTempo() == 1) : ?>
                                <p>
                                    <span class="nomeAtributo">Tempo:</span>
                                    <span class="dadoAtributo"><?= $quiz->getQuantTempo() . " min"; ?></span>
                                </p>
                            <?php endif; ?>


                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="<?= BASEURL ?>/controllers/QuizController.php?action=edit&id=<?= $quiz->getIdQuiz() ?>" class="btn btn-sm btn-primary botaoAlterar">Alterar</a>
                                <a href="<?= BASEURL ?>/controllers/QuizController.php?action=delete&id=<?= $quiz->getIdQuiz() ?>" class="btn btn-sm btn-secondary botaoExcluir" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                                <a href="<?= BASEURL ?>/controllers/QuizQuestaoController.php?action=create&id=<?= $quiz->getIdQuiz() ?>" class="btn btn-sm btn-success botaoQuestoes">Questões</a>
                            </div>
                        </div>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>
        <div class="text-left">
            <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/registro.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.page-item a').click(function(e) {
                e.preventDefault();
                var targetDivId = $(this).data('target');
                $('#' + targetDivId).show(); // Exibe a div correspondente
                $('.content-div').not('#' + targetDivId).hide(); // Esconde as outras divs

                // Caso você queira rolar a página automaticamente para a div exibida, descomente a linha abaixo
                // $('html, body').animate({scrollTop: $('#' + targetDivId).offset().top}, 800);
            });
        });
    </script>

    <script>
        const ativar = (elemento) => {
            let itens = document.getElementsByClassName("page-item");
            for (i = 0; i < itens.length; i++) {
                itens[i].classList.remove("active");
            }
            elemento.classList.add("active");
        }
    </script>
</body>

</html>