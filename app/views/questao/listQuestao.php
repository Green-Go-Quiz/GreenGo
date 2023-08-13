<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/list.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>

    <h1 class="tituloPagina text-center">Lista de Questões</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm w-100">
                    <div class="card-body">
                        <a class="btn btn-success btn-block h-100 d-flex justify-content-center align-items-center botaoEspecifico" href="<?= BASEURL ?>/controllers/QuestaoController.php?action=create">
                            <span class="nomeBotaoEspecifico">Inserir Nova Questão</span>
                        </a>
                    </div>
                </div>
            </div>

            <?php foreach ($dados['lista'] as $questao) : ?>
                <div class="col-md-3 ">
                    <div class="card mb-4 shadow-sm cardInserido">
                        <div class="card-body ">
                            <h5 class="card-title nomeCard"><?= $questao->getDescricaoQ(); ?></h5>
                            <p>
                                <span class="nomeAtributo labelQuestao">Grau de Dificuldade:</span>
                                <span class="dadoAtributo"><?= $questao->getGrauDificuldadeTexto(); ?></span>
                            </p>
                            <p>
                                <span class="nomeAtributo labelQuestao">Pontuação:</span>
                                <span class="dadoAtributo"><?= $questao->getPontuacao(); ?></span>
                            </p>
                            <p>
                                <span class="nomeAtributo labelQuestao">Imagem:<br></span>
                                <img src="<?= BASEURL_ARQUIVOS . "/" . $questao->getImagem(); ?>" alt="" class="imagemQuestao">
                            </p>
                            <p>
                                <span class="nomeAtributo labelQuestao">Alternativas:<br></span>
                                <span class="dadoAtributo"><?= $questao->getAlternativasTexto(); ?></span>
                            </p>
                            <p>
                                <span class="nomeAtributo labelQuestao">Alternativa Correta:<br></span>
                                <span class="dadoAtributo"><?= $questao->getAlternativaCertaTexto(); ?></span>
                            </p>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="js/registro.js"></script>
</body>

</html>