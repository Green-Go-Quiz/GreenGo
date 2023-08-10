<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/listQuestao.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>

    <h3 class="title-margin">Lista de Questões</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;'>Nome do Quiz: </span>
                <span><?= $dados['quiz']->getNomeQuiz(); ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;'>Zona: </span>
                <span><?= $dados['quiz']->getZona(); ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;'>Máximo perguntas: </span>
                <span><?= $dados['quiz']->getMaximoPergunta(); ?></span>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <h5 class="title-margin">Questões disponíveis</h5>
            <div class="col-md-12 d-flex align-items-stretch">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Descrição</td>
                            <td>Grau</td>
                            <td>Pontuação</td>
                            <td>Imagem</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dados['listaQuestoes'] as $questao) : ?>
                            <tr>
                                <td><?= $questao->getDescricaoQ(); ?></td>
                                <td><?= $questao->getGrauDificuldadeTexto(); ?></td>
                                <td><?= $questao->getPontuacao(); ?></td>
                                <td><?php
                                    if ($questao->getImagem())
                                        echo '<img src="' . BASEURL_ARQUIVOS . '/' . $questao->getImagem() . '" width="100px" />';
                                    ?></td>
                                <td><a href='QuizQuestaoController.php?action=add&idQuestao=<?= $questao->getIdQuestao(); ?>&idQuiz=<?= $dados['quiz']->getIdQuiz(); ?>' class="btn btn-success">Adicionar</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>


                </table>

            </div>

        </div>


        <form action="save.php" method="post">
            <?php foreach ($dados['lista'] as $questao) : ?>
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= $questao->getDescricaoQ(); ?></h5>
                            <p><span class="labelQuestao">Grau de Dificuldade:</span> <?= $questao->getGrauDificuldadeTexto(); ?></p>
                            <p><span class="labelQuestao">Pontuação:</span> <?= $questao->getPontuacao(); ?></p>
                            <p><span class="labelQuestao">Imagem:</span> <?= $questao->getImagem(); ?></p>
                            <p><span class="labelQuestao">Alternativas:</span> <?= $questao->getAlternativasTexto(); ?></p>
                            <p><span class="labelQuestao">Alternativa Correta:</span> <?= $questao->getAlternativaCertaTexto(); ?></p>

                            <!-- Add a checkbox for each questão -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="questoes[]" value="<?= $questao->getIdQuestao() ?>">
                                <label class="form-check-label">Selecionar esta questão</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>



            <!-- Include the Quiz ID as a hidden input field -->
            <input type="hidden" name="quiz_id" value="<?= $dados['quiz_id'] ?>">

            <!-- Add a button to submit the selected questões -->
            <button type="submit" class="btn btn-primary">Associar Questões ao Quiz</button>
        </form>
    </div>
    </div>
</body>

</html>