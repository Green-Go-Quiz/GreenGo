<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/form.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>

    <div class="container">
        <h1 id="quest" class=" text-center tituloPagina">
            Questões do Quiz </h1>

        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6 d-flex align-items-stretch">
                <h4 id="quest" class=" text-left tituloPagina">
                    Quiz selecionado:</h4>
            </div>

            <div class="col-md-6 d-flex align-items-stretch">
                <?php require_once(__DIR__ . "/../../bootstrap/msg.php"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Nome do Quiz: </span>
                <span class="dadoAtributo"><?= $dados['quiz'] ? $dados['quiz']->getNomeQuiz() : '---'; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Zona: </span>
                <span class="dadoAtributo"><?= $dados['quiz'] ? $dados['quiz']->getZona() : '---';; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Máximo perguntas: </span>
                <span class="dadoAtributo"><?= $dados['quiz'] ? $dados['quiz']->getMaximoPergunta() : '---';; ?></span>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">

            <h4 id="quest" class=" text-left tituloPagina">
                Questões adicionadas ao quiz "<span><?= $dados['quiz'] ? $dados['quiz']->getNomeQuiz() : '---'; ?></span>"</h4>

            <div class="col-md-12 d-flex align-items-stretch">
                <table class="rounded table table-striped ">
                    <thead>
                        <tr class="atributoTabelaAdicionada">
                            <td>Descrição</td>
                            <td>Grau</td>
                            <td>Pontuação</td>
                            <td>Imagem</td>
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
                                    <td><a href='QuizQuestaoController.php?action=delete&idQuizQuestao=<?= $quizQuestao->getIdQuizQuestao(); ?>' class="btn btn-danger botaoExcluir" onclick="return confirm('Confirma a exclusão?');">Excluir</a> </td>

                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ... (código anterior do formulário) ... -->

        <div class="row" style="margin-top: 40px;">
            <h4 id="quest" class=" text-left tituloPagina">
                Questões disponíveis para o quiz "<span><?= $dados['quiz'] ? $dados['quiz']->getNomeQuiz() : '---'; ?></span>"</h4>

            <div class="col-md-12 d-flex align-items-stretch">
                <table class="table table-striped">
                    <thead>
                        <tr class="atributoTabelaDisponivel">
                            <td>Descrição</td>
                            <td>Grau</td>
                            <td>Pontuação</td>
                            <td>Imagem</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados['listaQuestoes'] as $questao) : ?>
                            <tr class="dadoTabelaDisponivel">
                                <td><?= $questao->getDescricaoQ(); ?></td>
                                <td><?= $questao->getGrauDificuldadeTexto(); ?></td>
                                <td><?= $questao->getPontuacao(); ?></td>
                                <td><?php
                                    if ($questao->getImagem())
                                        echo '<img src="' . BASEURL_ARQUIVOS . '/' . $questao->getImagem() . '" width="100px" />';
                                    ?></td>
                                <td><a href='QuizQuestaoController.php?action=add&idQuestao=<?= $questao->getIdQuestao(); ?>&idQuiz=<?= $dados['quiz'] ? $dados['quiz']->getIdQuiz() : '0'; ?>' class="btn btn-success botaoGravar">Adicionar</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>