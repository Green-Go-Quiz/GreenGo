<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

<?php include_once("../bootstrap/header.php");?>

</head>


<nav id="indexinteiro">
<div class="col-xs-12" id="nav-container">
        <div id="itensmenu">
            <nav class="navbar navbar-expand-lg " id="menu">
                <a href="index.php" class="nav-brand">
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
                        <a class="nav-item nav-link" id="botaoentrar" href="../views/users/login.php"> Entrar </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</nav>

<body id="fundoindex">
    <main>
        <div class="container">
            <div class="row justify-content-md-center">
                <div id="about-area">

                    <div class="row">
                        <div class="col" id="textoindex">

                            <div class="img-responsive">
                                <a href="..\controllers\EspecieController.php?action=EspeciesMapa"><img src="../public/mapa.svg" class="img-fluid" alt="mapa ifpr"
                                        id="mapa-da-home">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CASO O FILTRO ESTEJA APLICADO, PODE ADICIONAR O checked NO CLASS DO BOTAO -->
            <div class="row">
                <div class="col" id="botoesmapa">
                    <a class="btn btn-primary" id="todosbotao"
                        href="..\controllers\EspecieController.php?action=EspeciesMapa">
                        Todos
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaController.php?action=verZona&idZona=1">
                        Zona 1
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaController.php?action=verZona&idZona=2">
                        Zona 2
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaController.php?action=verZona&idZona=3">
                        Zona 3
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaController.php?action=verZona&idZona=4">
                        Zona 4
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaController.php?action=verZona&idZona=5">
                        Zona 5
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaController.php?action=verZona&idZona=6">
                        Zona 6
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col" id="linhasecundaria">
                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieController.php?action=verFrutifera">
                        Frutiferas
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieController.php?action=verExotica">
                        Exóticas
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieController.php?action=verMedicinal">
                        Medicinais
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieController.php?action=verToxidade">
                        Tóxicas</a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieController.php?action=verRaridade">
                        Raras
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieController.php?action=verComestivel">
                        Comestíveis
                    </a>

                    <div class="w-100"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col">
                <div class="row">
                    <?php foreach ($data['especies'] as $especie): ?>
                        <a href="./EspecieController.php?action=verEspecie&idEspecie=<?= $especie['idEspecie'] ?>">
                            <!--CHAMAR O ATRIBUTO DA IMAGEM, QUANDO ESTIVER PRONTA. CASO NAO ESTEJA, EXCLUIR O STYLE-->
                            <div class="quadrado"
                                style="background-image:url('<?= $especie['imagem'] ?>');">
                                <div class="nome align-items-center justify-content-center">
                                    <?= $especie['nomePop'] ?>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <br><br>

    </main>
</body>
</hmtl>