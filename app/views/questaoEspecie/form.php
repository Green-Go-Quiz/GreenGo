<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/list.css">
</head>

<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>

    <div class="container">
        <h1 id="quest" class=" text-center tituloPagina">
            Especies das Questões </h1>

        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6 d-flex align-items-stretch">
                <h4 id="quest" class=" text-left tituloPagina">
                    Questão selecionado:</h4>
            </div>

            <div class="col-md-6 d-flex align-items-stretch">
                <?php require_once(__DIR__ . "/../../bootstrap/msg.php"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;'>Descrição da questão : </span>
                <span><?= $dados['questao'] ? $dados['questao']->getDescricaoQ() : '---'; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;'>Grau de dificuldade: </span>
                <span><?= $dados['questao'] ? $dados['questao']->getGrauDificuldadeTexto() : '---';; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <span style='font-weight: bold; margin-right: 10px;'>Alternativa correta: </span>
                <span><?= $dados['questao'] ? $dados['questao']->getAlternativaCertaTexto() : '---';; ?></span>
            </div>
        </div>

        <!-- ... (código anterior do formulário) ... -->

        <div class="row" style="margin-top: 40px;">
            <h3 id="quest" class=" text-left tituloPagina">
                Espécies disponíveis para a questao "<span><?= $dados['questao'] ? $dados['questao']->getDescricaoQ() : '---'; ?></span>"</h3>

            <div class="col-md-12 d-flex align-items-stretch">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Nome Popular</td>
                            <td>Nome Cientifico</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados['listaEspecie'] as $especie) : ?>
                            <tr>
                                <td><?= $especie->getNomePopular(); ?></td>
                                <td><?= $especie->getNomeCientifico(); ?></td>

                                <td><a href='QuestaoespecieController.php?action=add&idEspecie=<?= $especie->getIdEspecie(); ?>&idQuestao=<?= $dados['questao'] ? $dados['questao']->getIdQuestao() : '0'; ?>' class="btn btn-success">Adicionar</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">

            <h3 id="quest" class=" text-left tituloPagina">
             Espécies adicionadas a questão "<span><?= $dados['questao'] ? $dados['questao']->getDescricaoQ() : '---'; ?></span>"</h3>

            <div class="col-md-12 d-flex align-items-stretch">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Nome Popular</td>
                            <td>Nome Cientifico</td>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $questaoEspecieEspecies = $dados['listaEspecies'];
                        if ($questaoEspecieEspecies) {
                            foreach ($questaoEspecieEspecies as $questaoEspecie) {
                                $especie = $questaoEspecie->getEspecie();
                             ?>
                         
                                        <td><?= $especie->getNomePopular(); ?></td>
                                         <td><?= $especie->getNomeCientifico(); ?></td>
                                               <td>
                <a href='QuestaoespecieController.php?action=delete&idQuestaoEspecie=<?= $especie->getIdEspecie(); ?>&idQuestao=<?= $dados['questao'] ? $dados['questao']->getIdQuestao() : '0'; ?>' class="btn btn-success">Deletar</a>
            </td>
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