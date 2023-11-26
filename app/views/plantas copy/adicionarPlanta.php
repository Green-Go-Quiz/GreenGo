<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>
<?php include_once("../../controllers/ZonaController.php");
      include_once("../../controllers/EspecieController.php");
      include_once("../zones/htmlZonaForm.php");
      include_once("../especies/htmlEspecieForm.php");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar planta</title>

    <!--FAVICON-->
    <link rel="icon" href="../public/favicon.svg">
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
    <link rel="stylesheet" href="../css/adicionarplanta.css">
    <link rel="stylesheet" href="../css/plantas.css">
    <link rel="stylesheet" href="../css/listPlanta.css">
    
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cabecalho.css">

    <link rel="stylesheet" href="css/editorwys.css" type="text/css" media="all" />
    <script type="text/javascript" src="../js/script.js"></script>

</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>

</nav>

<style>
#txtNomeForm {
    border-radius: 5px;
}

#txtPontos {
    border-radius: 5px;
}

#carregueimagemtexto {
    margin-bottom: 5px;
}

</style>

<body>
    <main>
        <nav id="primeirotextoindex">
            <div class="container">
                <div class="row justify-content-md-left">

                    <div id="corpo-registro">

                        <div class="row">
                            <div class="col">
                                <h1 id="primeirotextoreg"> Adicione uma planta!</h1>


                            <form action="adicionarPlantaExec.php" method="POST" enctype="multipart/form-data">
                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">


                            <div class="form-row align-items-left">

                            <label for="formtexto" id="txtNome">Nome Social da Planta:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Social" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro">
                            <div class="w-100"></div>
                            <label for="formtexto" id="txtCodigo">Código numérico:</label>
                            <div class="w-100"></div>
                            <input type="number" name="Cod_Numerico" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro">
                            <div class="w-100"> <br>
                                           
                            
                            <div class="form-group" style="color: #f0b6bc;">
                            <label for="selectStand" id="txtNome">Zona:</label>
                            <div class="w-100"></div>
                            <a id="txtNomeForm">
                            <?php
                            $zonaCont = new ZonaController();
                            $zonas = $zonaCont->listar();

                             ZonaHTMLForm::desenhaSelect($zonas, "zona_planta", "SomPlanta");
                            ?>
                            </div> </a>
                            
                            <div class="form-group">
                            <label for="selectStand" id="txtNome">Espécie:</label>
                            <div class="w-100"></div>
                            <a id="txtNomeForm">
                            <?php
                            $especieCont = new EspecieController();
                            $especies = $especieCont->listar();

                             EspecieHTMLForm::desenhaSelect($especies, "especie_planta", "nome_especie");
                            ?>
                            </div> </a>
                                            
                            <label for="formtexto" id="txtPontos">Pontuação:</label>
                            <div class="w-100"> </div>
                            <input type="number" name="Pontuacao" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro">
                            <div class="w-100"> </div>

                                           
                            <nav>
                                <div class="form-group" id="imagemreg">
                                </div>
                                <a id="carregueimagemtexto"> Carregue uma imagem:</a> <br>
                                <label class="picture align-content-center" for="picture__input" tabIndex="0">
                                <span class="picture__image">
                                <img class="img-camera" src="/img/d8ca819f5feac5192c31cb17633e1f1f.png">
                                </span>
                                </label>  
                                <input type="file" required name="imagem" id="picture__input" accept=".png, .jpg, .jpeg"/>
                                <a id="carregueimagemtexto2"> .png .jpg ou .jpeg tamanho mínimo: 2MB tamanho máximo: 5MB </a>
                                </div>
                                </div> </div> </div> </div> </div> </div> </div> </div> </nav>


                            <nav id="primeirotextoindex">
                            <br>
                            <div class="w-100"></div>
                            <div class="container" id="caixadetexto">
                            <a id="textodescritivo">História:</a>
                            <textarea id="txtHistoria" name="Historia" ></textarea>

                            <script src="../ckeditor/build/ckeditor.js"></script>
                            <script>ClassicEditor.create(document.querySelector('#txtHistoria'), {licenseKey: '',}).then(editor => {window.editor = editor;
                        }).catch(error => {
                            console.error('Oops, something went wrong!');
                            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                            console.warn('Build id: mnx0o2etqvuk-d6hv5tpaevt5');
                            console.error(error);
                        });
                            </script>

                            </div>

                            </nav>

                            <div class="container">
                            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
                            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                            </button>
                            </div>


                            </form>


    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
