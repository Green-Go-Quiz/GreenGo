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

            <?php foreach ($dados['lista'] as $questao) : ?>
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= $questao->getDescricaoQ(); ?></h5>
                            <p><span class="labelQuestao">Grau de Dificuldade:</span> <?= $questao->getGrauDificuldadeTexto(); ?></p>
                            <p><span class="labelQuestao">Pontuação:</span> <?= $questao->getPontuacao(); ?></p>
                            <p><span class="labelQuestao">Imagem:<br></span> <img src="<?= BASEURL_ARQUIVOS . "/" . $questao->getImagem();?>" alt="" width="100px"></p>
                            <p><span class="labelQuestao">Alternativas:<br></span> <?= $questao->getAlternativasTexto(); ?></p>
                            <p><span class="labelQuestao">Alternativa Correta:<br></span> <?= $questao->getAlternativaCertaTexto(); ?></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="<?= BASEURL ?>/controllers/QuestaoController.php?action=edit&id=<?= $questao->getIdQuestao() ?>" class="btn btn-sm btn-primary">Alterar</a>
                                    <a href="<?= BASEURL ?>/controllers/QuestaoController.php?action=delete&id=<?= $questao->getIdQuestao() ?>" class="btn btn-sm btn-secondary" onclick="return confirm('Tem certeza que deseja excluir esta questão?')">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>