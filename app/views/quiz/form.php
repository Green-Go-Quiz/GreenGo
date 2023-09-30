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

    <h1 class="text-center tituloPagina">
        <?php if ($dados['id'] == 0) echo "Inserir";
        else echo "Alterar";
        ?>
        Quiz
    </h1>

    <div class="container">

        <div class="row" style="margin-top: 10px;">

            <div class="col-6">
                <form id="frmQuiz" method="POST" action="<?= BASEURL ?>/controllers/QuizController.php?action=save">

                    <div class="form-group">
                        <label for="txtNomeQuiz" class="nomeAtributo"><span class="asterisco">﹡</span> Nome do Quiz:</label>
                        <input class="form-control" type="text" id="txtNomeQuiz" name="nomeQuiz" maxlength="45" placeholder="Informe o nome do quiz" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getNomeQuiz() : ''); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="selectZona" class="nomeAtributo"><span class="asterisco">﹡</span> Zona:</label>
                        <select class="form-control" id="selectZona" name="zona">
                            <option value="">Selecione a zona</option>
                            <?php foreach ($dados['zonas'] as $zona) : ?>
                                <option value="<?php echo $zona->getIdZona(); ?>" <?php echo (isset($dados["quiz"]) && $dados["quiz"]->getIdZona() == $zona->getIdZona() ? 'selected' : '') ?>>
                                    <?php echo $zona->getNomeZona(); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="txtMaximoPergunta" class="nomeAtributo "><span class="asterisco">﹡</span> Máximo de perguntas: </label>
                        <input class="form-control" type="number" id="txtMaximoPergunta" name="maximoPergunta" placeholder="Informe o máximo de perguntas do quiz" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getMaximoPergunta() : ''); ?>" />
                    </div>

                    <div class="form-group">
                        <label for="radComTempo" class="nomeAtributo"><span class="asterisco">﹡</span> Com Limite de Tempo:</label>

                        <!-- 0 representa "não", enquanto 1 representa "sim".
                Foi optado para ser feito desta maneira por conta do fato de que o atributo comTempo
            é um tinyint !-->

                        <input type="radio" id="radComTempoSim" name="comTempo" value="1" <?php echo (isset($dados["quiz"])
                                                                                                && $dados["quiz"]->getComTempo() == 1) ? "checked" : ""; ?>>
                        <label for="radComTempoSim" class="nomeAtributo">Sim</label>
                        <input type="radio" id="radComTempoNao" name="comTempo" value="0" <?php echo ((!isset($dados["quiz"])) || (!$dados["quiz"]->getComTempo() == 1)) ? "checked" : ""; ?>>
                        <label for="radComTempoNao" class="nomeAtributo">Não</label>
                    </div>

                    <div class="form-group" id="divQuantTempo" style="<?php echo (isset($dados["quiz"]) && $dados["quiz"]->getComTempo() == 1) ? 'block' : 'none'; ?>">
                        <label for="txtQuantTempo" class="nomeAtributo">Quantidade de Tempo (em minutos): </label>
                        <input class="form-control" type="number" id="txtQuantTempo" name="quantTempo" placeholder="Informe a quantidade de tempo do quiz" value="<?php echo (isset($dados["quiz"]) ? $dados["quiz"]->getQuantTempo() : ''); ?>" />
                    </div>



                    <input type="hidden" id="hddIdQuiz" name="idQuiz" value="<?= $dados['id']; ?>" />

                    <div class="form-group">
                        <a class="btn btn-secondary botaoVoltar" href="<?= BASEURL ?>/controllers/QuizController.php?action=list">Voltar</a>
                        <button type="submit" class="btn btn-secondary botaoGravar">Gravar</button>
                        <button type="reset" class="btn btn-secondary botaoLimpar">Limpar</button>
                    </div>

                </form>
            </div>


            <div class="col-6">
                <?php require_once(__DIR__ . "/../../bootstrap/msg.php"); ?>
            </div>
        </div>



    </div>
    <script>
        var radComTempoSim = document.getElementById('radComTempoSim');
        var radComTempoNao = document.getElementById('radComTempoNao');
        var divQuantTempo = document.getElementById('divQuantTempo');

        function toggleQuantTempo() {
            if (radComTempoSim.checked) {
                divQuantTempo.style.display = 'block';
            } else {
                divQuantTempo.style.display = 'none';
            }
        }

        radComTempoSim.addEventListener('change', toggleQuantTempo);
        radComTempoNao.addEventListener('change', toggleQuantTempo);

        // Chamar a função inicialmente para definir o estado inicial
        toggleQuantTempo();
    </script>

    <script src="../bootstrap/bootstrap.min.js"></script>
</body>

</html>