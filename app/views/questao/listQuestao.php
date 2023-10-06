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
            <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm  w-100 min-vh-25 ">
                    <div class="card-body">
                        <a class="btn btn-success btn-block h-100 d-flex justify-content-center align-items-center botaoEspecifico" href="<?= BASEURL ?>/controllers/QuestaoController.php?action=create">
                            <span class="nomeBotaoEspecifico">Inserir Nova Questão</span>
                        </a>
                    </div>
                </div>
            </div>

            <?php foreach ($dados['lista'] as $questao) : ?>
                <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card cardInserido h-100">
                            <div class="card-body">
                            <h5 class="card-title nomeCard"><?= $questao->getDescricaoQTruncada(); ?></h5>
                            <p>
                                <p class="nomeAtributo labelQuestao">Grau de Dificuldade:</span>
                                <span class="dadoAtributo"><?= $questao->getGrauDificuldadeTexto(); ?></span>
                            </p>
                            <p>
                            <p class="nomeAtributo labelQuestao">Pontuação:</span>
                            <span class="dadoAtributo"><?= $questao->getPontuacao(); ?></span>
                            </p>
                            <p>
                            <p class="nomeAtributo labelQuestao">Imagem:<br></span>
                                <img src="<?= BASEURL_ARQUIVOS . "/" . $questao->getImagem(); ?>" class="imagemQuestao" alt="" width="100px">
                            </p>
                            </p>
                            <p>
                            <p class="nomeAtributo labelQuestao">Alternativas:<br></span>
                            <span class="dadoAtributo"<?= $questao->getAlternativasTextoTratada();?></span>
                            </p>
                            <p>
                            <p class="nomeAtributo labelQuestao">Alternativa Correta:<br></span>
                            <span class="dadoAtributo"><?= $questao->getAlternativaCertaTextoTratada(); ?></span>
                            </p>


                        </div>
                        <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="<?= BASEURL ?>/controllers/QuestaoController.php?action=edit&id=<?= $questao->getIdQuestao() ?>" class="btn btn-sm btn-secondary botaoAlterar">Alterar</a>
                                <a href="<?= BASEURL ?>/controllers/QuestaoController.php?action=delete&id=<?= $questao->getIdQuestao() ?>" class="btn btn-sm btn-secondary botaoExcluir" onclick="return confirm('Tem certeza que deseja excluir esta questão?')">Excluir</a>
                                <a href="<?= BASEURL ?>/controllers/QuestaoEspecieController.php?action=create&id=<?= $questao->getIdQuestao() ?>" class="btn btn-sm btn-success botaoEspecies">Espécies</a>
                            </div>
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
    <!--/div-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="js/registro.js"></script>
</body>

</html>