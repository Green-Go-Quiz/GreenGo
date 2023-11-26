<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/quiz.css">

</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navJOGADOR.php"); ?>
    <h1 id="quest" class=" text-center tituloPagina">
        Resultado do Quiz <?= $dados['quiz'] ? $dados['quiz']->getNomeQuiz() : '---'; ?></h1>

    <div class="col-md-12 d-flex align-items-stretch">
        <table class="rounded table table-striped ">
            <thead>
                <tr class="atributoTabelaAdicionada">
                    <td>Descrição</td>
                    <td>Grau</td>
                    <td>Pontuação</td>
                    <td>Imagem</td>
                    <td>Resultado</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $quizQuestaoQuestoes = $dados['listaQuestoesQuiz'];
                if ($quizQuestaoQuestoes) {
                    foreach ($quizQuestaoQuestoes as $quizQuestao) {
                        $questao = $quizQuestao->getQuestao();
                ?>
                        <tr class="dadoTabelaAdicionada">
                            <td><?= $questao->getDescricaoQ() ?></td>
                            <td><?= $questao->getGrauDificuldadeTexto() ?></td>
                            <td><?= $questao->getPontuacao() ?></td>
                            <td>
                                <?php
                                $questaoImagem = $questao->getImagem();
                                if ($questaoImagem) {
                                    echo '<img src="' . BASEURL_ARQUIVOS . '/' . $questaoImagem . '" width="100px" />';
                                } else {
                                    echo "Nenhuma imagem disponível";
                                }
                                ?>
                            </td>
                            <td><?= $respostaUsuario->getAcertou() ? ' ✅ ' : '❌' ?></td>

                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-left mt-4 mb-4">
        <a href="<?= BASEURL ?>/controllers/PartidaQuizController.php?action=listarQuiz&id=<?= $partidaQuiz->getIdPartida() ?>" class="btn btn-sm btn-success botaoEspecies">Voltar</a>
    </div>
</body>


</html>