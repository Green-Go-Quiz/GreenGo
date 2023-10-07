<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/quiz.css">

</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navJOGADOR.php"); ?>

    <div class="container mt-4">
        <h1 class="tituloPagina text-center"><?= $dados['quiz'] ? $dados['quiz']->getNomeQuiz() : '---'; ?></h1>

        <form action="JogarController.php?action=save&id=<?php echo   $dados["quiz"]->getIdQuiz() ?>" method="POST">
            <?php
            $questoes = $dados['questoes'];
            if ($questoes) :
                foreach ($questoes as $idxQuestao => $questao) :
            ?>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h4 id="quest" class="text-left tituloPagina">
                                Pergunta <span id="questionNumber"><?= $idxQuestao + 1 ?></span>
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="questionDescription" class="text-center mb-4">
                                <span class="dadoAtributo"><?= $questao->getDescricaoQ(); ?></span>
                            </div>
                            <img src="<?= BASEURL_ARQUIVOS . '/' . $questao->getImagem(); ?>" alt="Question Image" class="img-fluid mx-auto d-block mb-4">
                        </div>
                    </div>

                    <div class="row">
                        <div class="btn-group-toggle" data-toggle="buttons">
                            <?php
                            $alternativas = $questao->getAlternativas();
                            foreach ($alternativas as $idxAlt => $alternativa) :
                            ?>
                                <!--div class="col-md-6 mt-2">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="altQuestao_<?= $questao->getIdQuestao() ?>" value="<?= $alternativa->getIdAlternativa() ?>">
                                    <?= $alternativa->getDescricaoAlternativa(); ?>
                                </label>
                            </div>
                        </div-->

                                <label class="btn btn-outline-primary mr-3"> <?= $alternativa->getDescricaoAlternativa(); ?>
                                    <input type="radio" id="altQuestao_<?= $questao->getIdQuestao() ?>" name="altQuestao_<?= $questao->getIdQuestao() ?>" value="<?= $alternativa->getIdAlternativa() ?>">
                                </label>

                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>


            <?php
                endforeach;
            endif;
            ?>

            <div class="text-left">
                <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
            </div>

            <div class="text-left">
                <button type="submit" class="btn btn-secondary">Gravar</button>
            </div>
        </form>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="js/quiz.js"></script>
</body>


</html>