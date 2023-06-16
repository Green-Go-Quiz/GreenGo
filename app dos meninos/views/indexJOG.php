<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php include_once("../bootstrap/header.php");?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cabecalho.css">

</head> 


<nav> 

<div class="col-xs-12" id="nav-container">
        <div id="itensmenu">
            <nav class="navbar navbar-expand-lg " id="menu">
                <a href="indexJOG.php" class="nav-brand">
                    <div class="row justify-content-md-left">
                        <div id="imgmenu">
                        <img class="img-responsive" src="../public/logo-green.svg"  id="logo" >
                        </div>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
                    aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> <img src="../public/menu.svg" id="menuicon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                    <div class="navbar-nav">

                    <a class="nav-item nav-link" id="projeto-menu" href="../views/projeto.php"> Projeto </a>
                    <a class="nav-item nav-link" id="mapa-menu" href="..\controllers\EspecieController.php?action=EspeciesMapa"> Mapa</a>
                    <a class="nav-item nav-link" id="itemmenu" href="./PlantaController.php?action=formIdentificarPlanta"> Jogar </a>
                    <a class="nav-item nav-link" id="botaoentrar" href="./UserController.php?action=findUserById"> Eu </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    
</nav>

<body>
    <div class="container">
        <div class="row justify-content-md-left">
            <div id="about-area">
                <div class="row">
                    <div class="col" id="textoindex">
                        <h1><br><br>Aprenda <br> com trilhas <br> ecológicas! </h1>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-secondary jogar" href="../Controllers/PlantaControllerJOG.php?action=formIdentificarPlanta">JOGAR</a>

                                <!--SÓ HÁ UM MODO DE JOGO POR HORA
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                                        JOGAR
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="modosolo">Modo solo</a>
                                        <a class="dropdown-item" href="emequipe">Em equipe</a>
                                    </div>
                                </div>
                                -->

                            </div>
                        </div>
                    </div>
                    <div class="img-responsive">
                        <a href="..\controllers\EspecieControllerJOG.php?action=EspeciesMapa"><img src="../public/mapa 1.svg" class="img-fluid" alt="logo-index"
                                id="mapa-da-home"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col quadrado">
                <img src="../public/projeto.svg" alt="" id="imagenscaixas">
                <p>Projeto de extensão <br> desenvolvido por estudantes do IFPR</p>
            </div>
            <div class="col quadrado">
                <img src="../public/metodologias.svg" alt="" id="imagenscaixas">
                <p>Educação ambiental <br> através de metodologias ativas</p>
            </div>
            <div class="col quadrado">
                <img src="../public/codigo.svg" alt="" id="imagenscaixas">
                <p>Plataforma web <br>com código aberto e muito amor</p>
            </div>
        </div>
        <div class="finalhome" id="ultimo-cont-index">
            <div class="row justify-content-md-left">
                <div class="col">
                    <img class="img-fluid" src="../public/Group 52.svg" alt="celular-greengo" id="imagem-celular">
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</body>
</html>