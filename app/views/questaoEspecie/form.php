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
            Espécies da Questão </h1>

        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6 d-flex align-items-stretch">
                <h4 id="quest" class=" text-left tituloPagina">
                    Questão selecionada:</h4>
            </div>

            <div class="col-md-6 d-flex align-items-stretch">
                <?php require_once(__DIR__ . "/../../bootstrap/msg.php"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Descrição da questão : </span>
                <span class="dadoAtributo"><?= $dados['questao'] ? $dados['questao']->getDescricaoQ() : '---'; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Grau de dificuldade: </span>
                <span class="dadoAtributo"><?= $dados['questao'] ? $dados['questao']->getGrauDificuldadeTexto() : '---';; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;' class="nomeAtributo">Alternativa correta: </span>
                <span class="dadoAtributo"><?= $dados['questao'] ? $dados['questao']->getAlternativaCertaTexto() : '---';; ?></span>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">

            <h3 id="quest" class=" text-left tituloPagina">
                Espécies adicionadas à questão "<span><?= $dados['questao'] ? $dados['questao']->getDescricaoQ() : '---'; ?></span>"</h3>

            <div class="col-md-12 d-flex align-items-stretch">
                <table class="table table-striped">
                    <thead>
                        <tr class="atributoTabelaAdicionada">
                            <td>Nome Popular</td>
                            <td>Nome Cientifico</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $questaoEspecieEspecies = $dados['listaQuestoesEspecie'];
                        if ($questaoEspecieEspecies) {
                            foreach ($questaoEspecieEspecies as $questaoEspecie) {
                                $especie = $questaoEspecie->getEspecie();
                        ?>
                                <tr class="dadoTabelaAdicionada">
                                    <td><?= $especie->getNomePopular() ?></td>
                                    <td><?= $especie->getNomeCientifico() ?></td>
                                    <td><a href='QuestaoEspecieController.php?action=delete&idQuestaoEspecie=<?= $questaoEspecie->getIdQuestaoEspecie(); ?>' class="btn btn-danger botaoExcluir" onclick="return confirm('Confirma a exclusão?');">Deletar</a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">
            <h3 id="quest" class=" text-left tituloPagina">
                Espécies disponíveis para a questão "<span><?= $dados['questao'] ? $dados['questao']->getDescricaoQ() : '---'; ?></span>"</h3>

            <div class="col-md-12 d-flex align-items-stretch">
                <table class="table table-striped ">
                    <thead>
                        <tr class="atributoTabelaDisponivel">
                            <td>Nome Popular</td>
                            <td>Nome Cientifico</td>
                            <td></td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados['listaEspecie'] as $especie) : ?>
                            <tr class="dadoTabelaDisponivel">
                                <td><?= $especie->getNomePopular(); ?></td>
                                <td><?= $especie->getNomeCientifico(); ?></td>

                                <td><a href='QuestaoespecieController.php?action=add&idEspecie=<?= $especie->getIdEspecie(); ?>&idQuestao=<?= $dados['questao'] ? $dados['questao']->getIdQuestao() : '0'; ?>' class="btn btn-success botaoGravar">Adicionar</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="javascript:history.back()" class="btn btn-secondary botaoVoltar">Voltar</a>

    </div>
    </div>
</body>

</html>