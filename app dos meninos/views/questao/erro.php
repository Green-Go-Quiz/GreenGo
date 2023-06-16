<!DOCTYPE html>
<html lang="en">

<head>

<?php include_once("../bootstrap/header.php");?>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/cabecalho.css">

</head>

<nav id="indexinteiro">

    <div class="col-xs-12" id="nav-container">

        <div id="itensmenu">

            <nav class="navbar navbar-expand-lg " id="menu">
                <a href="index.html" class="nav-brand">
                    <div class="row justify-content-md-left">
                        <div id="imgmenu">
                            <img class="img-responsive" src="../public/logo-green.svg" alt="">
                        </div>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-links"
                    aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                    <div class="navbar-nav" id="navbar-links">

                        <a class="nav-item nav-link" id="portfolio-menu" href="projeto.html"> Projeto </a>
                        <a class="nav-item nav-link" id="registro-menu"> Mapa</a>
                        <a class="nav-item nav-link" id="identificar-menu"> Jogar </a>
                        <a class="nav-item nav-link" id="botaoentrar" href="login.php"> Entrar </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</nav>

<body>

    <div class="container">
        <div class="mensagem row justify-content-md-left">
            <div class="col justify-content-start">
                <div>
                    <b class="oops">Oops,</b><br>
                    <b class="erro">ocorreu um erro!</b> <br>
                    403, mais especificamente :/<br><br><br><br>
                    <a href="!!!">Voltar à página inicial</a>
                </div>
            </div>

            <div class="col-4 align-self-center">
                <img class="img-erro" src="../public/erro.svg">
            </div>
        </div>

        <br><br><br>
</body>

</html>