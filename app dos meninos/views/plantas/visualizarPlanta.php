<?php
 include_once("../../controllers/PlantaController.php");
 include_once("../../controllers/ZonaController.php");
 include_once("../../controllers/EspecieController.php");
 include_once("../zones/htmlZonaForm.php");
 include_once("../especies/htmlEspecie.php");
 
 $cod = isset($_GET['cod']) ? $_GET['cod'] : null;
 $ide = isset($_GET['ide']) ? $_GET['ide'] : null;
 $idp = isset($_GET['idp']) ? $_GET['idp'] : null;

 if ($ide !== null) {
 $especieCont = new EspecieController();
 $especie = $especieCont->buscarPorId($ide);
 }

 if ($idp !== null) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorId($idp);
}

 if ($cod !== null) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorCodigo($cod);
}

if ($ide == 24 && $cod == 1206) {
    $ide = 25;
    $cod = 1206;

    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorCodigo($cod);

    $especieCont = new EspecieController();
    $especie = $especieCont->buscarPorId($ide);
    }
   

 $frutifera = $especie->getFrutifera();
 if ($frutifera == 1) { 
     $frut = "<br>"."Frutífera";
 } else { 
     $frut = "";
 };

 $exotica = $especie->getExotica();
 if ($exotica == 1) { 
     $exot = "<br>"."Exótica";
 } else { 
     $exot = "";
 };

 $raridade = $especie->getRaridade();
 if ($raridade == 1) { 
     $rara = "<br>"."Rara";
 } else { 
     $rara = "";
 };

 $toxidade = $especie->getToxidade();
 if ($toxidade == 1) { 
     $tox = "<br>"."Tóxica";
 } else { 
     $tox = "";
 };

 $medicinal = $especie->getMedicinal();
 if ($medicinal == 1) { 
     $med = "<br>"."Medicinal";
 } else { 
     $med = "";
 };

 $comestivel = $especie->getComestivel();
 if ($comestivel == 1) { 
     $come = "<br>"."Comestível";
 } else { 
     $come = "";
 };
 
 if($planta == null) {
    echo "Planta não encontrado!<br>";
    echo "<a href='listPlantas.php'>Voltar</a>";
    exit;
 }
 
?>

<!DOCTYPE html>
<html lang="pt-br">

        <title>
            <?= $planta->getNomeSocial() ?>
        </title>

        <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/cabecalho.css">
    

</head> 
<style>

.img-responsive {
    width: 130px;
}

#nomePlanta {
    height: 10%;
    width: 80% ;
    margin-left: 3%;
    border-radius: 5px;
    background-color: #04574d;
    color: #FFFFFF; 
    text-align: center !important;
}

#nomeUm {
    font-size: 40%; 
    height: 10%;
    width: 70% ;
    margin-left: 3%;
    margin-top: 3%;
    color: #f58c95; 
}

#nomeDois {
    font-size: 40%; 
    height: 10%;
    width: 90% ;
    margin-left: 3%;
    margin-bottom: 4%;
    color: #f58c95; 
}

#codigoPlanta {
    flex-basis: 92%;
    text-align: right;
    color: #338a5f;
    font-size: 70%; 
}

#imagemPlanta {
    height: auto;
    width: 95% ;
}

#imagem1Planta {
    height: auto;
    width: 100%;
}

#pontos {
    size: 50%;
    margin-top: 6%;
    margin-left: 16%;
    background-color: #f0b6bc;
    color: #FFFFFF;
    border-radius: 5px;
    width: 70%;
    font-size: 60%; 
    text-align: center !important;
}

#atributos {
    size: 50%;
    margin-left: 34%;
    margin-bottom: 10%;
    margin-top: 3%;
    color: #C05367;
    border-radius: 5px;
    width: 35%;
    font-size: 35%; 
    text-align: center !important;
}

#historiaplanta {
    margin: 0 auto;
    width: 93%;
    color: #04574d;
    text-align: left;
}

.descricao {
    font-size: 40%;
    line-height: 1.3;
}


body {
    overflow-x: hidden !important;
}

</style>

<nav class="navbar navbar-expand-lg">
    <a href="../index.php" class="navbar-brand">
        <div class="row align-items-center">
            <div id="imgmenu">
                <img class="img-responsive" id="logo">
            </div>
        </div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
        aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img src="../../public/menu.svg" id="menuicon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-links">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="../projeto.php">Projeto</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="../users/login.php">Entrar</a></li> -->
        </ul>
    </div>
</nav>

    <body>

    <div class="container">

<div class="titulo">
    <div class="row">
        <h1 class="nome" id="nomePlanta">
            <?= $planta->getNomeSocial() ?>
        </h1>

        <h1 class="nome" id="nomeUm">
            <a style="color: #C05367;"> Nome Popular: </a> <?= $especie->getNomePopular() ?>
        </h1>

        <h1 class="nome" id="nomeDois">
            <a style="color: #C05367;"> Nome Científico: </a> <?= $especie->getNomeCientifico() ?>
        </h1>

        <p class="codigo" id="codigoPlanta">
            Código: <?= $planta->getCodNumerico() ?>
        </p>

</div>

<div class="img-responsive" id="imagem1Planta">
        <img id="imagemPlanta" src="<?php echo $planta->getImagemPlanta(); ?>"/>
    </div> <br>

<div> 

<h1 class="descricao" id="historiaplanta">
    <?= $planta->getPlantaHistoria() ?>
</h1>

    <p class="descricao" id="pontos">
    Pontos: <?=$planta->getPontos(); ?>
    </p>

    
    <p class="descricao" id="atributos">
        <?php echo $tox; ?>
        <?php echo $med; ?>
        <?php echo $come; ?>
        <?php echo $exot; ?>
        <?php echo $frut; ?>
        <?php echo $rara; ?>
    </p>

        
</div>
            <div class="row justify-content-start botoes">
                <!--A PARTIR DAQUI, QUANDO CLICADO PARA VER DETALHES (VALE PARA TODOS OS USUARIOS!!)
                <div class="col-auto min-content">
                    <a class="qrcode" href=".">
                        QR CODE
                    </a>
                </div>-->
            </div>

            <br><br>
        </div>
        <script src="../bootstrap/bootstrap.min.js"></script>
    </body>

</html>