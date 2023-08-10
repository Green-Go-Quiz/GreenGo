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
            <div class="col-md-3 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm w-100">
                    <div class="card-body">
                        <a class="btn btn-success btn-block h-100 d-flex justify-content-center align-items-center" href="<?= BASEURL ?>/controllers/QuestaoController.php?action=create">
                            Inserir Nova Questão
                        </a>
                    </div>
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