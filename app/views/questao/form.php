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
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/createquestao.css">
</head>



<body>
    <?php require_once(__DIR__ . "/../../bootstrap/navADMMeninas.php"); ?>
    <h3 id="quest"class=" text-center">
        <?php if ($dados['id'] == 0) echo "Inserir";
        else echo "Alterar";
        ?>
        Questão
    </h3>

    <div class="container">

        <div class="row" style="margin-top: 10px;">

            <div class="col-6" >
                <form id="frmQuestao" method="POST" action="<?= BASEURL ?>/controllers/QuestaoController.php?action=save" enctype="multipart/form-data">
                    <div class="form-group">
                        <label  class=" nomeantes" for="txtDescricaoQ"  >* Descrição:</label>
                        <input class="form-control" type="text" id="txtDescricaoQ" name="descricao" maxlength="200"  placeholder="Informe a descrição da questão" value="<?php echo (isset($dados["questao"]) ? $dados["questao"]->getDescricaoQ() : ''); ?>" />
                    </div>
                    <div class="form-group">
                        <label  class=" nomeantes" for="txtGrauDificuldade">* Grau de dificuldade:</label>
                        <fieldset>
                            <div>
                                <input type="radio" id="facil" name="grauDificuldade" value="facil" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "facil") ? "checked" : "" ?>>
                                <label  class=" nomeantes" for="facil">Fácil</label>
                            </div>

                            <div>
                                <input type="radio" id="medio" name="grauDificuldade" value="medio" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "medio") ? "checked" : "" ?>>
                                <label class=" nomeantes" for="medio">Médio</label>
                            </div>

                            <div>
                                <input type="radio" id="dificil" name="grauDificuldade" value="dificil" <?php echo (isset($dados["questao"]) && $dados["questao"]->getGrauDificuldade() == "dificil") ? "checked" : "" ?>>
                                <label  class=" nomeantes" for="dificil">Difícil</label>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <label class=" nomeantes" for="txtPontuacao">* Pontuação:</label>
                        <input  class="form-control" type="number" id="txtPontuacao" name="pontuacao" placeholder="Informe a pontuação da questão" value="<?php echo (isset($dados["questao"]) ? $dados["questao"]->getPontuacao() : ''); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="uplImagem" class=" nomeantes">Selecione o arquivo:</label>
                        <br>
                        <input class="form-control" type="file" name="imagem" id="uplImagem" accept="image/*" />
                    </div>

                    <?php if (isset($dados["questao"]) && $dados["questao"]->getImagem()) : ?>
                        <img src="<?= BASEURL_ARQUIVOS . "/" . $dados["questao"]->getImagem() ?>" style="width: 100px; height: auto;" />
                    <?php endif; ?>

                    <?php $i = 1; ?>
                    <?php foreach ($dados['alternativas'] as $campo) : ?>
                        <div class="form-group">
                            <label   class=" nomeantes" for="txt<?= $campo ?>">* Alternativa <?= $i; ?></label>
                            <input class="form-control" type="text" id="txt<?= $campo ?>" name="<?= $campo ?>" maxlength="200" placeholder="Informe a descrição da alternativa" value="<?php echo (isset($dados["questao"]) && $dados["questao"]->getAlternativas() && count($dados["questao"]->getAlternativas()) >= 4 ? $dados["questao"]->getAlternativas()[$i - 1]->getDescricaoAlternativa() : ''); ?>">
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>




                    <class="form-group">

                        <label class=" nomeantes">* Selecione a alternativa correta:</label><br>
                    <div> <input type="radio" name="alternativa_correta" value="0"  <?php echo (isset($dados["questao"]) && $dados["questao"]->isAlternativaCerta(0) ? 'checked' : '') ?>>
                    <label  class=" nomeantes" for="dificil">Alternantiva 1</label>
                </div> 
                        
                        <div> <input type="radio" name="alternativa_correta" value="1"  <?php echo (isset($dados["questao"]) && $dados["questao"]->isAlternativaCerta(0) ? 'checked' : '') ?>>
                    <label  class=" nomeantes" for="dificil">Alternantiva 2</label>
                </div> 
                      
                      <div> <input type="radio" name="alternativa_correta" value="2"  <?php echo (isset($dados["questao"]) && $dados["questao"]->isAlternativaCerta(0) ? 'checked' : '') ?>>
                    <label  class=" nomeantes" for="dificil">Alternantiva 3</label>
                </div> 
                      
                <div> <input type="radio" name="alternativa_correta" value="3"  <?php echo (isset($dados["questao"]) && $dados["questao"]->isAlternativaCerta(0) ? 'checked' : '') ?>>
                    <label  class=" nomeantes" for="dificil">Alternantiva 4</label>
                </div> 
                      

                    <input type="hidden" id="hddId" name="id" value="<?= $dados['id']; ?>" />
                         <br>
                    <button type="submit"  class="gravar">Gravar</button>
                    <button type="reset" class="limpar">Limpar</button>
                </form>
            </div>

            <div class="col-6">
                <?php require_once(__DIR__ . "/../../bootstrap/msg.php"); ?>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-12">
                <a class="btn btn-secondary" href="<?= BASEURL ?>/controllers/QuestaoController.php?action=list">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>