<!DOCTYPE html>
<html lang="en">
<?php 

session_start();

if(isset($_SESSION['adm'])){
    $nomeADM = $_SESSION['adm'];
} 
else if(isset($_SESSION['normal'])){
    header("location: users/login.php");
}
else if (!isset($_SESSION['adm']) && !isset($_SESSION['normal'])) {
    header("Location: users/login.php");
    exit;
}
?>
<head>

    <?php include_once("../bootstrap/header.php");?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/projeto.css">

</head>

<style>

a.page-link:hover {
            color: #ebf0f1 !important;
            background-color: #f58c95; }

        a.page-link{
            color: #ebf0f1 !important;
            background-color: #f58c95; }
   
        a.page-link:hover,
            .page-item.active a.page-link {
            color: #ebf0f1 !important;
            background-color: #C05367;
            }

        a.excluir:hover {
            color: var(--branco);
            background-color: #f0b6bc !important;
            border-radius: 5px; }

            body {
            overflow-x: hidden;
        }
</style>    
<nav class="navbar navbar-expand-lg">
    <a href="indexADM.php" class="navbar-brand">
        <div class="row align-items-center">
            <div id="imgmenu">
                <img class="img-responsive" id="logo">
            </div>
        </div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
        aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img src="../public/menu.svg" id="menuicon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-links">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="../views/projetoADM.php">Projeto</a></li>
            <li class="nav-item"><a class="nav-link" href="../views/equipes/listEquipes.php">Equipes</a></li>
            <li class="nav-item"><a class="nav-link" href="../views/plantas/listPlantas.php">Plantas</a></li>
            <li class="nav-item"><a class="nav-link" href="../views/zones/listZonas.php">Zonas</a></li>
            <li class="nav-item"><a class="nav-link" href="../views/especies/listEspecies.php">Espécies</a></li>
            <li class="nav-item"><a class="nav-item nav-link" id="botaoentrar" href="users/sair.php"> <?php echo $nomeADM; ?> </a></li>
        </ul>
    </div>
</nav>

<body>

    <div class="container" >
        <div id="sobre">
            <h2 class="titulo" style="text-align: center;">
                O que é o <img src="../public/isologo-greengo-verde.svg" width="95%" class="isologo">
            </h2>

            <p> É o resultado dos avanços de um projeto de extensão denominado <b>Green Go: Jogo Educacional Sobre a 
                Etnobotânica da Identificação
                    de
                    Plantas do IFPR</b>,
                do Instituto Federal do Paraná Campus Foz do Iguaçu. Ele envolve estudantes de dois cursos, Meio
                Ambiente e
                Informática/Desenvolvimento de Sistemas, colaborando
                na integração na comunidade local entre si e com seu meio.
            </p>

            <h3 class="subtitulo">
                Nosso objetivo
            </h3>

            <p>
                Buscando conhecer mais a área verde que nos envolve, o projeto desenvolve, em atividades de extensão
                voltadas
                para a educação ambiental,
                um jogo de identificação da flora arbórea e arborescente (árvores), bem como o conjunto
                amplo
                de
                plantas alimentícias não
                convencionais (PANCs) e de ervas medicinais do IFPR-Foz.
            </p>
        </div>

        <div id="local">
            <h3 class="subtitulo">
                Onde nós estamos
            </h3>

            <p>
                Av. Araucária, 780 - Vila A, Foz do Iguaçu - PR, 85860-000
            </p>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3601.0197082142813!2d-54.579028385399354!3d-25.504389242080048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f6907761e60b9d%3A0xd20bd6ad5f147b9a!2sIFPR%20-%20Instituto%20Federal%20do%20Paran%C3%A1%20-%20Campus%20Foz%20do%20Igua%C3%A7u!5e0!3m2!1spt-BR!2sbr!4v1666209048362!5m2!1spt-BR!2sbr"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="maps">
            </iframe>
        </div>

        <div id="nos">
            <h3 class="subtitulo">
                Quem somos nós?
            </h3>


            <nav aria-label="...">
  <ul class="pagination pagination-lg justify-content-center flex-wrap flex-column flex-md-row">
    <li class="page-item" onclick="ativar(this)"><a class="page-link" href="#" data-target="div-orientadores">Orientadores</a></li>
    <li class="page-item" onclick="ativar(this)"><a class="page-link" href="#" data-target="div-modulo-website">Módulo Website</a></li>
    <li class="page-item d-md-none"><hr></li>
    <li class="page-item" onclick="ativar(this)"><a class="page-link" href="#" data-target="div-modulo-jogo">Módulo Jogo</a></li>
    <li class="page-item" onclick="ativar(this)"><a class="page-link" href="#" data-target="div-modulo-quiz">Módulo Quiz</a></li>
  </ul>
</nav>

<div id="div-orientadores" class="content-div" style="display: none;">

<div class="container">

<!--MARCELA-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/marcela.jpg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>MARCELA TURIM KOSCHEVIC</b> <br>
            Coordenadora da Equipe de Informática <br>
            <small>marcela.turim@ifpr.edu.br</small>
        </span>
    </div>
</div>


<!--FRANCO-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/franco.jpg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>FRANCO HARLOS EZEQUIEL</b> <br>
            Coordenador da Equipe de Meio Ambiente <br>
            <small>franco.harlos@ifpr.edu.br</small>
        </span>
    </div>
</div>

<!--HUMBERTO-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/humberto.jpg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>HUMBERTO MARTINS BENEDUZZI</b> <br>
            Ex-Coorientador da Equipe de Informática  <br>
            <small>humberto.beneduzzi@ifpr.edu.br</small>
        </span>
    </div>
</div>
<!--JEFFERSON-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/.jpg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>JEFERSON OLIVEIRA CHAVES</b> <br>
            Orientador da Equipe de Desenvolvimento de Sistemas<br>
            <small>jefferson.chaves@ifpr.edu.br</small>
        </span>
    </div>
</div>

<!--DANIEL-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/.jpg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>DANIEL DI DOMENICO</b> <br>
            Orientador da Equipe de Desenvolvimento de Sistemas<br>
            <small>daniel.domenico@ifpr.edu.br</small>
        </span>
    </div>
</div>

</div>
</div>

</div> <!-- Fim div Orientadores -->

<div id="div-modulo-website" class="content-div" style="display: none;">

<div id="nois">
            <img src="../public/nois.jpg" class="img-fluid alunas">

            <div class="membro">
                <b>MARIA EDUARDA HECK SOUZA BENEDITO</b> <br>
                Desenvolvedora Back-end e Modeladora do Sistema <br>
                <small>mariaehsb@gmail.com</small>
            </div>

            <div class="membro">
                <b>ALANA BRANDÃO DE OLIVEIRA</b> <br>
                Designer UI/UX E Documentadora do Sistema <br>
                <small>oliveiraalanabrandao@gmail.com</small>
            </div>

            <div class="membro">
                <b>MARIA EDUARDA DE OLIVEIRA BECKER</b> <br>
                Desenvolvedora Back-end e Modeladora do Sistema <br>
                <small>dudabecker@gmail.com</small>
            </div>

            <div class="membro">
                <b>NICOLLY TAVASSI DE SOUZA</b> <br>
                Desenvolvedora Front-end<br>
                <small>nicollytavassii@gmail.com</small>
            </div>
        </div>

        <div id="medalhistas">
            <h3 class="subtitulo">
                Somos medalhistas!
            </h3>

            <img class="img-medalha img-fluid" src="../public/medalhistas.png">

            <p>
                3º Lugar na categoria Ciências Exatas e da Terra na XI Feira de Inovação das Ciências e Engenharias
                2022!
            </p>
        </div>

</div> <!-- Fim div website -->

<div id="div-modulo-jogo" class="content-div" style="display: none;">
 
<div class="container">

<!--AMANDA-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/amanda.jpeg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>AMANDA PROCOPIO SCHEER 🦔</b> <br>
            Designer UI/UX & Desenvolvedora Front-End <br>
            <small>amandapscheer@greengoifpr.com.br</small>
        </span>
    </div>
</div>


<!--ANNYE-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/annye.jpeg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>ANNYE MIYUKI FURUTI 🦄</b> <br>
            Documentadora e Modeladora do Sistema<br>
            <small>annye@greengoifpr.com.br</small>
        </span>
    </div>
</div>

<!--GABRIEL-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/gabriel.jpeg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>GABRIEL MANDELLI CARDOSO 🦁</b> <br>
            Desenvolvedor Back-end & Desenvolvedor Front-end<br>
            <small>mandelli@greengoifpr.com.br</small>
        </span>
    </div>
</div>

<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/nikolas.jpeg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>NIKOLAS OLIVEIRA DE ARAUJO 🦝</b> <br>
            Desenvolvedor Front-end & Modelador do Sistema<br>
            <small>nikolas@greengoifpr.com.br</small>
        </span>
    </div>
</div>

</div>

</div> <!-- Fim jogo -->

<div id="div-modulo-quiz" class="content-div" style="display: none;">
<div class="container">

<!--RAFAELA-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/rafaela.jpg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>RAFAELA FONTANA</b> <br>
            Desenvolvedora Back-end & Desenvolvedora Front-End <br>
            <small>rafaela@greengoifpr.com.br</small>
        </span>
    </div>
</div>


<!--RAYSSA-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/rayssa.jpeg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>RAYSSA DE FREITAS</b> <br>
            Desenvolvedora Back-end<br>
            <small>rayssa@greengoifpr.com.br</small>
        </span>
    </div>
</div>

<!--JULIANA-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/juliana.jpeg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>JULIANA SANTANA</b> <br>
            Designer UI/UX & Desenvolvedora Front-end<br>
            <small>juliana@greengoifpr.com.br</small>
        </span>
    </div>
</div>

<!--NURA-->
<div class="row justify-content-md-left">
    <div class="d-flex justify-content-start">
        <div class="img-coord">
            <img src="../public/nura.jpeg" class="coordenador">
        </div>
    </div>

    <div class="txt-coord align-self-center">
        <span>
            <b>NURA SALEH</b> <br>
            Desenvolvedora Front-end & Modeladora do Sistema<br>
            <small>nura@greengoifpr.com.br</small>
        </span>
    </div>
</div>

</div>
</div>

        <br>
        <br>
        <div id="apoio">
            <h3 class="subtitulo">
                Com o apoio de
            </h3>

            <div class="container">
                <div class="row  d-flex justify-content-around">
                    <div class="col">
                        <a href="https://foz.ifpr.edu.br/" target="_blank"><img id="ifpr" src="../public/foz-horizontal.png"></a>
                    </div>

                    <div class="col">
                        <a href="https://foz.ifpr.edu.br/iftech-apresentara-prototipos-e-produtos-desenvolvidos-por-diferentes-cursos-do-campus/" target="_blank"><img id="nit" src="../public/nit.png"></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('.page-item a').click(function(e) {
    e.preventDefault();
    var targetDivId = $(this).data('target');
    $('#' + targetDivId).show(); // Exibe a div correspondente
    $('.content-div').not('#' + targetDivId).hide(); // Esconde as outras divs
    
    // Caso você queira rolar a página automaticamente para a div exibida, descomente a linha abaixo
    // $('html, body').animate({scrollTop: $('#' + targetDivId).offset().top}, 800);
  });
});
</script>

<script>
    const ativar=(elemento)=>{
        let itens=document.getElementsByClassName("page-item");
        for(i=0;i<itens.length;i++){
            itens[i].classList.remove("active");
        }
        elemento.classList.add("active");
    }
</script>