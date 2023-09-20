<?php
#Nome do arquivo: questao/form.php
#Objetivo: interface para cadastro de questões

require_once(__DIR__ . "/../../bootstrap/header.php");

?>

<!--< class="text-center">
  <?php //if ($dados['id'] == 0) echo "Inserir";
    //   else echo "Alterar"; 
    ?> 
    Questão
</h3> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/cabecalho.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/index.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/form.css">
</head>



<body>
    <h1 id="quest" class=" text-center tituloPagina">
        <?php if ($dados['id'] == 0) echo "Inserir";
        else echo "Alterar";
        ?>
        Questão
    </h1>

    <div class="container">

        <div class="row" style="margin-top: 10px;">

            <div class="col-6">
                <form id="frmQuestao" method="POST" action="<?= BASEURL ?>/controllers/QuestaoController.php?action=save" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class=" nomeAtributo" for="txtDescricaoQ"><span class="asterisco">﹡</span> Descrição:</label>
                        <input class="form-control" type="text" id="txtDescricaoQ" name="descricao" maxlength="200" placeholder="Informe a descrição da questão" value="<?php echo (isset($dados["questao"]) ? $dados["questao"]->getDescricaoQ() : ''); ?>" />
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="txtGrauDificuldade"><span class="asterisco">﹡</span> Grau de dificuldade:</label>
                        <fieldset>
                            <div>
                                <input type="radio" id="facil" name="grauDificuldade" value="facil" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "facil") ? "checked" : "" ?>>
                                <label class=" nomeAtributo" for="facil">Fácil</label>
                            </div>

                            <div>
                                <input type="radio" id="medio" name="grauDificuldade" value="medio" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "medio") ? "checked" : "" ?>>
                                <label class="nomeAtributo" for="medio">Médio</label>
                            </div>

                            <div>
                                <input type="radio" id="dificil" name="grauDificuldade" value="dificil" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "dificil") ? "checked" : "" ?>>
                                <label class="nomeAtributo" for="dificil">Difícil</label>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <label class="nomeAtributo" for="txtPontuacao"><span class="asterisco">﹡</span> Pontuação:</label>
                        <input class="form-control" type="number" id="txtPontuacao" name="pontuacao" placeholder="Informe a pontuação da questão" value="<?php echo (isset($dados["questao"]) ? $dados["questao"]->getPontuacao() : ''); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="uplImagem" class="nomeAtributo">Selecione o arquivo:</label>
                        <br>
                        <input class="form-control" type="file" name="imagem" id="uplImagem" accept="image/*" />
                    </div>

                    <?php if (isset($dados["questao"]) && $dados["questao"]->getImagem()) : ?>
                        <img src="<?= BASEURL_ARQUIVOS . "/" . $dados["questao"]->getImagem() ?>" style="width: 100px; height: auto;" />
                    <?php endif; ?>

                    <?php $i = 1; ?>
                    <?php foreach ($dados['alternativas'] as $campo) : ?>
                        <div class="form-group">
                            <label class="nomeAtributo" for="txt<?= $campo ?>"><span class="asterisco">﹡</span> Alternativa <?= $i; ?></label>
                            <input class="form-control" type="text" id="txt<?= $campo ?>" name="<?= $campo ?>" maxlength="200" placeholder="Informe a descrição da alternativa" value="<?php echo (isset($dados["questao"]) && $dados["questao"]->getAlternativas() && count($dados["questao"]->getAlternativas()) >= 4 ? $dados["questao"]->getAlternativas()[$i - 1]->getDescricaoAlternativa() : ''); ?>">
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>




                    <div class="form-group">
                        <label class="nomeAtributo"><span class="asterisco">﹡</span> Selecione a alternativa correta:</label><br>
                        <div> <input type="radio" name="alternativa_correta" value="0" <?php echo (isset($dados["questao"]) && $dados["questao"]->isAlternativaCerta(0) ? 'checked' : '') ?>>
                            <label class="nomeAtributo" for="dificil">Alternantiva 1</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="1" <?php echo (isset($dados["questao"]) && $dados["questao"]->isAlternativaCerta(0) ? 'checked' : '') ?>>
                            <label class="nomeAtributo" for="dificil">Alternantiva 2</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="2" <?php echo (isset($dados["questao"]) && $dados["questao"]->isAlternativaCerta(0) ? 'checked' : '') ?>>
                            <label class="nomeAtributo" for="dificil">Alternantiva 3</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="3" <?php echo (isset($dados["questao"]) && $dados["questao"]->isAlternativaCerta(0) ? 'checked' : '') ?>>
                            <label class="nomeAtributo" for="dificil">Alternantiva 4</label>
                        </div>
                    </div>

                    <div>
                        <input type="hidden" id="hddId" name="id" value="<?= $dados['id']; ?>" />
                        <a class="btn btn-secondary botaoVoltar" href="<?= BASEURL ?>/controllers/QuestaoController.php?action=list">Voltar</a>
                        <button type="submit" class="btn btn-secondary botaoGravar">Gravar</button>
                        <button type="reset" class="btn btn-secondary botaoLimpar">Limpar</button>
                    </div>
                </form>
            </div>

            <div class="col-6">
                <?php require_once(__DIR__ . "/../../bootstrap/msg.php"); ?>
            </div>
        </div>
        <div class="text-left">
            <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>

</html>