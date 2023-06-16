<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Especie</title>

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
    <script src="js/registro.js"></script>
    <script src="../../ajax/ajax.js"></script>
    <link rel="stylesheet" href="views/js/registro.js">
    <link rel="stylesheet" href="css/editorwys.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/script.js"></script>


</head>


<style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }


        #txtNomeForm {
    border-radius: 5px;
}

    #botoesregistrar {
        background-color: #338a5f !important;
        color: #ebf0f1;
}

#botoesregistrar:hover {
    color: #f58c95;
    background-color: #04574d !important;
    transform: scale(1.05);
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
                <h1 id="primeirotextoreg"> Registre uma espécie!</h1>
                        <form action="adicionarEspecieExec.php" method="POST" enctype="multipart/form-data">

                        <label for="formtexto" id="txtNome" onblur="ValidarDados('nomeEsp', document.getElementById('txtNome').value, 'validacaoespecie.php');">Nome Popular:</label>
                            <div class="w-100" id="campo_nomeEsp"></div>
                            <input type="text" name="Nome_Popular" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro">
                            <div class="w-100"></div>
                            <label for="formtexto" id="txtCodigo">Nome Cientifico:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Cientifico" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro">
                            <div class="w-100"> <br>
                        <div>
                        <div class="container" id="container-checkbox">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group form-check">
                                        <div id="txtNome">
                                            <a>Atributos específicos:</a>
                                            <div class="w-100"></div>
                                            <br>
                                        </div>
                                        <div class="form-group form-check" id="formcome">
                                            <input type="checkbox" name="comestivel" class="form-check-input"
                                                id="botaocheck1" value="1">

                                            <label class="form-check-label" for="botaocheck1"
                                                id="texto-checkbox">Comestível</label>
                                        </div>
                                        <div class="form-group form-check" id="formexo">
                                            <input type="checkbox" name="exotica" class="form-check-input"
                                                id="botaocheck2" value="1">
                                            
                                            <label class="form-check-label" for="botaocheck2"
                                                id="texto-checkbox">Exótica</label>
                                        </div>
                                        <div class="form-group form-check" id="formfrut">
                                            <input type="checkbox" name="frutifera" class="form-check-input"
                                                id="botaocheck3" value="1">
                                        
                                            <label class="form-check-label" for="botaocheck3"
                                                id="texto-checkbox">Frutífera</label>
                                        </div>
                                        <div class="form-group form-check" id="formmed">
                                            <input type="checkbox" name="medicinal" class="form-check-input"
                                                id="botaocheck4" value="1">
                                            
                                            <label class="form-check-label" for="botaocheck4"
                                                id="texto-checkbox">Medicinal</label>
                                        </div>
                                        <div class="form-group form-check" id="formrara">
                                            <input type="checkbox" name="raridade" class="form-check-input"
                                                id="botaocheck5" value="1">
                                            
                                            <label class="form-check-label" for="botaocheck5"
                                                id="texto-checkbox">Rara</label>
                                        </div>
                                        <div class="form-group form-check" id="formtoxi">
                                            <input type="checkbox" name="toxidade" class="form-check-input"
                                                id="botaocheck6" value="1">
                                        
                                            <label class="form-check-label" for="botaocheck6"
                                                id="texto-checkbox">Tóxica</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm" id="imagemreg">

                    <div class="form-group" id="imagemreg">
                                </div></div>
                                <a id="carregueimagemtexto"> Carregue uma imagem:</a> <br>
                                <label class="picture align-content-center" for="picture__input" tabIndex="0">
                                <span class="picture__image">
                                <img class="img-camera" src="/img/d8ca819f5feac5192c31cb17633e1f1f.png">
                                </span>
                                </label>  
                                <input type="file" required name="imagem" id="picture__input" accept=".png, .jpg, .jpeg"/>
                                <a id="carregueimagemtexto2"> .png .jpg ou .jpeg tamanho mínimo: 2MB tamanho máximo: 5MB </a>
                                </div> </div> 

                                
                            <br>
                            <div class="w-100"></div>
                            <div class="container" id="caixadetexto">
                            <a id="textodescritivo">Descrição:</a>
                            <textarea id="txtHistoria" name="Descricao" ></textarea>

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

                            <div class="container">
                            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
                            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                            </button>
                            </div>


                            </form>

            </div>
        </div>
        <br><br>
    </main>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/grayscale.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/registro.js"></script>

</html>