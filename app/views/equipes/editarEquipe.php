<?php include_once("../../controllers/ZonaController.php"); ?>
<?php include_once("../../controllers/EquipeController.php"); ?>

<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>

<?php
$id = $_GET['id'];

$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($id);

if($equipe == null) {
    echo "Equipe não encontrada!<br>";
    echo "<a href='listEquipes.php'>Voltar</a>";
    exit;
} 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipe</title>

    <!--FAVICON-->
    <link rel="icon" href="../public/favicon.svg">
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/adicionarplanta.css">
    <link rel="stylesheet" href="../css/plantas.css">

    <?php include_once("../../bootstrap/header.php");?>

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/cabecalho.css">

    <!--scripts-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!-- Progress bar -->
    <script src="js/progressbar.min.js"></script>
    <!-- Parallax -->
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <script src="../../ajax/ajax.js"></script>
    <link rel="stylesheet" href="views/js/registro.js">
    <link rel="stylesheet" href="css/editorwys.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/script.js"></script>
    <script src="../js/icon.js"></script>


</head>
    


</head>

<style>

#txtNomeEquipe {
    color: #ebf0f1;
    background-color: #f0b6bc;
    margin-top: 1px;
    font-family: Poppins-semibold;
    border-radius: 5px;
    width: 428px;
}

#txtCorForm {
    color: #ebf0f1;
    background-color: #f0b6bc;
    margin-top: 1px;
    font-family: Poppins-semibold;
    border-radius: 5px;
    width: 428px;
}

</style>


<nav>

    <?php include_once("../../bootstrap/navADM.php");?>

</nav>

<body>
    <main>
    <nav id="primeirotextoindex">
            <div class="container">
                <div class="row justify-content-md-left">

                        <div class="row">
                        <div class="col">
                        <h1 id="primeirotextoreg"> Adicione uma Equipe!</h1>
                            <form action="editarEquipeExec.php" method="POST" enctype="multipart/form-data">


                            <label for="formtexto" id="txtNome">Nome da Equipe:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Equipe" class="form-control" id="txtNomeEquipe" value="<?php echo $equipe->getNomeEquipe(); ?>" $ aria-describedby="nome-cadastro">
                            <div class="w-100"></div>

                            <label for="formtexto" id="txtCodigo">Código da Equipe:</label>
                            <div class="w-100"></div>
                            <input type="number" value="<?php echo $equipe->getCodEntrada(); ?>" name="Cod_Equipe" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro">
                            <div class="w-100"> <br>

                            <label for="formtexto" id="txtCodigo">Cor da Equipe: </label>
                            <div class="w-100"></div>
                            <input type="color" value="<?php echo $equipe->getCorEquipe(); ?>" name="Cor_Equipe" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro">
                            <div class="w-100"> <br>

                            <label id="txtCodigo" for="imagem">Escolha o Icone da Equipe:</label>
                            <br>
                            <select name="imagem" id="imagem" class='form-control' style='width: 130px; margin-top: 1px; color: #ebf0f1; background-color: #f0b6bc; font-family: Poppins-semibold;' onchange="atualizarImagem()">
                            <option value="../../public/icon/arvore_icon.png" data-imagem="../../public/icon/arvore_icon.png">Árvore</option>
                            <option value="../../public/icon/cacto_icon.png" data-imagem="../../public/icon/cacto_icon.png">Cacto</option>
                            <option value="../../public/icon/flor_icon.png" data-imagem="../../public/icon/flor_icon.png">Flor</option>
                            <option value="../../public/icon/samambaia_icon.png" data-imagem="../../public/icon/samambaia_icon.png">Caladium</option>
                            </select>
                            <br>
                            <br>
                            <div id="imagemSelecionada">
                            <h3>Icone da Equipe:</h3>
                            <img src="<?php echo $equipe->getIconeEquipe(); ?>" alt="" id="previewImagem" style="width: 300px; height: 300px">
                            <div class="container">
                            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
                            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                            </button>
                            </div>
                            <br> <br>

                            <input type="hidden" name="id_equipe" value="<?php echo $equipe->getIdEquipe(); ?>" />

                            </form>


    </main>
    </body>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
