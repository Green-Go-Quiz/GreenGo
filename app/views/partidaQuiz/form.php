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
            Quizzes da Partida </h1>

        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6 d-flex align-items-stretch">
                <h4 id="quest" class=" text-left tituloPagina">
                    Partida selecionada:</h4>
            </div>

            <div class="col-md-6 d-flex align-items-stretch">
                <?php require_once(__DIR__ . "/../../bootstrap/msg.php"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Nome da Partida: </span>
                <span class="dadoAtributo"><?= $dados['partida'] ? $dados['partida']->getNomePartida() : '---'; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Zona: </span>
                <span class="dadoAtributo"><?= $dados['partida'] ? $dados['partida']->getZona() : '---';; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Limite de Jogadores: </span>
                <span class="dadoAtributo"><?= $dados['partida'] ? $dados['partida']->getLimiteJogadores() : '---';; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Tempo da Partida: </span>
                <span class="dadoAtributo"><?= $dados['partida'] ? $dados['partida']->getTempoPartida() : '---';; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Senha da Partida: </span>
                <span class="dadoAtributo"><?= $dados['partida'] ? $dados['partida']->getSenha() : '---';; ?></span>
            </div>
        </div>


        <div class="row" style="margin-top: 40px;">

            <h4 id="quest" class=" text-left tituloPagina">
                Quizzes adicionados à Partida "<span><?= $dados['partida'] ? $dados['partida']->getNomePartida() : '---'; ?></span>"</h4>

            <div class="col-md-12 d-flex align-items-stretch">
                <table class="rounded table  table-striped ">
                    <thead>
                        <tr class="atributoTabelaAdicionada">
                            <td>Nome do Quiz</td>
                            <td>Máximo de Questões Adicionadas</td>
                            <td>Com limite de Tempo</td>
                            <td>Quantidade de Tempo</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $partidaQuizQuizzes = $dados['listaPartidasQuiz'];
                        if ($partidaQuizQuizzes) {
                            foreach ($partidaQuizQuizzes as $partidaQuiz) {
                                $quiz = $partidaQuiz->getQuestao();
                        ?>
                                <tr class="dadoTabelaAdicionada">
                                    <td><?= $quiz->getNomeQuiz() ?></td>
                                    <td><?= $quiz->getMaximoPergunta() ?></td>
                                    <td><?= $quiz->getComTempo() ?></td>
                                    <td><?= $quiz->getQuantTempo() ?></td>
                                    <td><a href='PartidaQuizController.php?action=delete&idPartidaQuiz=<?= $partidaQuiz->getIdPartidaQuiz(); ?>' class="btn btn-danger botaoExcluir" onclick="return confirm('Confirma a exclusão?');">Excluir</a> </td>
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
                Quizzes disponíveis para a partida "<span><?= $dados['partida'] ? $dados['partida']->getNomePartida() : '---'; ?></span>"</h4>

            <div class="col-md-12 d-flex align-items-stretch">
                <table class="table table-striped">
                    <thead>
                        <tr class="atributoTabelaDisponivel">
                            <td>Nome do Quiz</td>
                            <td>Máximo de Questões Adicionadas</td>
                            <td>Com limite de Tempo</td>
                            <td>Quantidade de Tempo</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados['listaQuizzes'] as $quiz) : ?>
                            <tr class="dadoTabelaDisponivel">
                                <td><?= $quiz->getNomeQuiz() ?></td>
                                <td><?= $quiz->getMaximoPergunta() ?></td>
                                <td><?= $quiz->getComTempo() ?></td>
                                <td><?= $quiz->getQuantTempo() ?></td>

                                <td><a href='PartidaQuizController.php?action=add&idQuiz=<?= $quiz->getIdQuiz(); ?>&idPartida=<?= $dados['partida'] ? $dados['partida']->getIdPartida() : '0'; ?>' class="btn btn-success botaoGravar">Adicionar</a> </td>
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