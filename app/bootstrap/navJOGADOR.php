<div class="col-xs-12" id="nav-container">
    <div id="itensmenu">
        <nav class="navbar navbar-expand-lg " id="menu">
            <a href="<?php echo BASEURL; ?>/views/projetoADM.php" class="nav-brand">
                <div class="row justify-content-md-left">
                    <div id="imgmenu">
                        <img class="img-responsive" src="../public/logo-green.svg" id="logo">
                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> <img src="../public/menu.svg" id="menuicon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                <div class="navbar-nav">

                    <a class="nav-item nav-link" id="projeto-menu" href="../views/projeto.php">Projeto</a>
                    <a class="nav-item nav-link" id="projeto-menu" href="../controllers/PartidaQuizController.php?action=listar">Jogar</a>

                    <a class="nav-item nav-link" id="botaoentrar" href="../views/users/login.php"> Jogador </a>
                </div>
            </div>
        </nav>
    </div>
</div>