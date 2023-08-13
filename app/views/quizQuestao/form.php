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

        <!-- ... (código anterior do formulário) ... -->

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

        <div class="row" style="margin-top: 30px;">
            <h5 class="title-margin">Questões adicionadas</h5>
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
                        <?php
                        $quizQuestaoQuestoes = $dados['quizQuestao'];
                        if ($quizQuestaoQuestoes) {
                            foreach ($quizQuestaoQuestoes as $quizQuestao) {
                                $questao = $quizQuestao->getQuestao();
                        ?>
                                <tr>
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
                                    <td></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <!-- ... (restante do código do formulário) ... -->

    </div>
</body>

</html>