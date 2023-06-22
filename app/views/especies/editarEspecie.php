<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span> 
  <?php endif ?> 
    
  <?php    include_once("../../controllers/EspecieController.php");
      
      $id = $_GET['id'];

$especieCont = new EspecieController();
$especie = $especieCont->buscarPorId($id);

if($especie == null) {
    echo "Especie não encontrado!<br>";
    echo "<a href='listEspecies.php'>Voltar</a>";
    exit;
} 

$frutifera = $especie->getFrutifera();
            if ($frutifera == 1) { 
                $frut = "checked";
            } else { 
                $frut = "";
            };

            $exotica = $especie->getExotica();
            if ($exotica == 1) { 
                $exot = "checked";
            } else { 
                $exot = "";
            };

            $raridade = $especie->getRaridade();
            if ($raridade == 1) { 
                $rara = "checked";
            } else { 
                $rara = "";
            };

            $toxidade = $especie->getToxidade();
            if ($toxidade == 1) { 
                $tox = "checked";
            } else { 
                $tox = "";
            };

            $medicinal = $especie->getMedicinal();
            if ($medicinal == 1) { 
                $med = "checked";
            } else { 
                $med = "";
            };

            $comestivel = $especie->getComestivel();
            if ($comestivel == 1) { 
                $come = "checked";
            } else { 
                $come = "";
            };
            ?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!--FAVICON-->
    <link rel="icon" href="../public/favicon.svg">
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/adicionarplanta.css">
    <link rel="stylesheet" href="../css/plantas.css">
    <link rel="stylesheet" href="../css/cabecalho.css">
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
    <link rel="stylesheet" href="css/editorwys.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/script.js"></script>
</head>


<!--------------ADMIN-------------->

<nav>
    <div class="col-xs-12" id="nav-container">
        <div id="itensmenu">
            <nav class="navbar navbar-expand-lg " id="menu">
                <a href="../views/indexADM.php" class="nav-brand">
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

                        <a class="nav-item nav-link" id="projeto-menu" href="../views/projetoADM.php"> Projeto </a>
                        <a class="nav-item nav-link" id="mapa-menu" href="..\controllers\EspecieControllerADM.php?action=EspeciesMapa"> Mapa</a>
                        <!--<a class="nav-item nav-link" id="itemmenu" href="./PlantaController.php?action=formIdentificarPlanta"> Jogar </a>-->
                        <a class="nav-item nav-link" id="zonas-menu" href="./ZonaController.php?action=findAll"> Zonas </a>
                        <a class="nav-item nav-link" id="especies-menu" href="./EspecieControllerADM.php?action=findAll"> Espécies </a>
                        <a class="nav-item nav-link" id="usuarios-menu" href="./UserController.php?action=findAll"> Usuários </a>
                        <a class="nav-item nav-link" id="botaoentrar" href="../controllers/UserController.php?action=sair"> Sair  </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</nav>

<body>
    <main>
        <div class="container">
            <div class="row">
                <h1 id="titulo"> Registre uma espécie!</h1>

                <div class="col">
                    <div class="form-row align-items-left">
                        <form action="editarEspecieExec.php" method="POST" enctype="multipart/form-data">

                            <label for="formtexto" id="txtNome">Nome Popular</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Popular" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo $especie->getNomePopular(); ?>">
                            <div class="w-100"></div>
                            <label for="formtexto" id="txtCodigo">Nome Cientifico</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Cientifico" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro" value="<?php echo $especie->getNomeCientifico(); ?>">
                            <div class="w-100"> <br>
                        <div>
                        <div class="container" id="container-checkbox">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group form-check">
                                        <div id="txtNome">
                                            <a>Atributos específicos</a>
                                            <div class="w-100"></div>
                                            <br>
                                        </div>
                                        <div class="form-group form-check" id="formcome">
                                            <input type="checkbox" name="comestivel" class="form-check-input"
                                                id="botaocheck1" value="1" <?php echo $come; ?> >

                                            <label class="form-check-label" for="botaocheck1"
                                                id="texto-checkbox">Comestível</label>
                                        </div>
                                        <div class="form-group form-check" id="formexo">
                                            <input type="checkbox" name="exotica" class="form-check-input"
                                                id="botaocheck2" value="1" <?php echo $exot; ?> >
                                            
                                            <label class="form-check-label" for="botaocheck2"
                                                id="texto-checkbox">Exótica</label>
                                        </div>
                                        <div class="form-group form-check" id="formfrut">
                                            <input type="checkbox" name="frutifera" class="form-check-input"
                                                id="botaocheck3" value="1" <?php echo $frut; ?> >
                                        
                                            <label class="form-check-label" for="botaocheck3"
                                                id="texto-checkbox">Frutífera</label>
                                        </div>
                                        <div class="form-group form-check" id="formmed">
                                            <input type="checkbox" name="medicinal" class="form-check-input"
                                                id="botaocheck4" value="1" <?php echo $med; ?>>
                                            
                                            <label class="form-check-label" for="botaocheck4"
                                                id="texto-checkbox">Medicinal</label>
                                        </div>
                                        <div class="form-group form-check" id="formrara">
                                            <input type="checkbox" name="raridade" class="form-check-input"
                                                id="botaocheck5" value="1" <?php echo $rara; ?>>
                                            
                                            <label class="form-check-label" for="botaocheck5"
                                                id="texto-checkbox">Rara</label>
                                        </div>
                                        <div class="form-group form-check" id="formtoxi">
                                            <input type="checkbox" name="toxidade" class="form-check-input"
                                                id="botaocheck6" value="1" <?php echo $tox; ?>>
                                        
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
                                <a id="carregueimagemtexto"> Carregue uma imagem</a> <br>
                                <label class="picture align-content-center" for="picture__input" tabIndex="0">
                                <span class="picture__image">
                                <img class="img-camera" src="/img/d8ca819f5feac5192c31cb17633e1f1f.png">
                                </span>
                                </label>  
                                <input type="file" required name="imagem" id="picture__input" accept=".png, .jpg, .jpeg"/>
                                <a id="carregueimagemtexto2"> .png .jpg ou .jpeg tamanho mínimo: 2MB tamanho máximo: 5MB </a>
                                </div> </div> 

                                <nav id="primeirotextoindex">
                            <br>
                            <div class="w-100"></div>
                            <div class="container" id="caixadetexto">
                            <a id="textodescritivo">Descrição</a>
                            <textarea id="txtHistoria" name="Historia" value="<?php echo $especie->getDescricao()?>"></textarea>

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

                            <input type="hidden" name="id_especie" value="<?php echo $especie->getIdEspecie(); ?>" />


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