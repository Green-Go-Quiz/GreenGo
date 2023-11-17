<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>

    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/jogo.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navJOGADOR.php"); ?>

    <div class="container mt-4">
        <h1 class="tituloPagina text-center">Quiz: <?= $dados['quiz'] ? $dados['quiz']->getNomeQuiz() : '---'; ?></h1>

        <?php if ($msgErro) : ?>
            <div class="alert alert-danger">
                <?php
                echo $msgErro;
                ?>
            </div>
        <?php endif; ?>

        <form action="JogarController.php?action=save&id=<?php echo $dados["quiz"]->getIdQuiz() ?>&idPartida=<?= $dados["idPartida"] ?>" method="POST">
            <?php
            $questoes = $dados['questoes'];
            if ($questoes) :
                foreach ($questoes as $idxQuestao => $questao) :
            ?>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h3 id="quest" class="text-left tituloQuestao">
                                Questão <span id="questionNumber"><?= $idxQuestao + 1 ?></span>
                            </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-left mb-4">
                                <h4 class="descricaoQuestao"><?= $questao->getDescricaoQ(); ?></h4>
                            </div>
                            <?php
                            $imagem = $questao->getImagem();
                            if ($imagem !== null) {
                                echo '<img src="' . BASEURL_ARQUIVOS . '/' . $imagem . '" alt="Question Image" class="imagemPequena img-fluid mx-auto d-block mb-4">';
                            }
                            ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <?php
                                $alternativas = $questao->getAlternativas();
                                $totalAlternativas = count($alternativas);

                                $halfTotal = ceil($totalAlternativas / 2); // Divide as alternativas em duas colunas

                                foreach ($alternativas as $idxAlt => $alternativa) :
                                    // Abre a segunda coluna após a primeira metade das alternativas
                                    if ($idxAlt === $halfTotal) {
                                        echo '</div></div><div class="col-md-6"><div class="btn-group-toggle" data-toggle="buttons">';
                                    }
                                ?>
                                    <label class="btn btn-light descricaoAlternativa mb-3 d-block" active> <?= $alternativa->getDescricaoAlternativa(); ?>
                                        <input type="radio" id="altQuestao_<?= $questao->getIdQuestao() ?>" name="altQuestao_<?= $questao->getIdQuestao() ?>" value="<?= $alternativa->getIdAlternativa() ?>" <?php
                                                                                                                                                                                                                if (isset($respostas[$questao->getIdQuestao()]) && $alternativa->getIdAlternativa() == $respostas[$questao->getIdQuestao()]->getIdAlternativa()) {
                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>> </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

            <?php
                endforeach;
            endif;
            ?>

            <div class="text-left mt-4 mb-4">
                <a href="javascript:history.back()" class="btn btn-secondary btn-lg botaoVoltar">Voltar</a>
                <button type="submit" class="btn btn-secondary btn-lg botaoGravar">Gravar</button>
            </div>

        </form>
    </div>
    <?php require_once(__DIR__ . "/../../bootstrap/footer.php"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="js/quiz.js"></script>

</body>

</html>