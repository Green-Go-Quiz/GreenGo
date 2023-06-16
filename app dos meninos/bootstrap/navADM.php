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
        <span class="navbar-toggler-icon"><img src="../../public/menu.svg" id="menuicon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-links">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="../projetoADM.php">Projeto</a></li>
            <li class="nav-item"><a class="nav-link" href="../equipes/listEquipes.php">Equipes</a></li>
            <li class="nav-item"><a class="nav-link" href="../plantas/listPlantas.php">Plantas</a></li>
            <li class="nav-item"><a class="nav-link" href="../zones/listZonas.php">Zonas</a></li>
            <li class="nav-item"><a class="nav-link" href="../especies/listEspecies.php">Espécies</a></li>
            <li class="nav-item"><a class="nav-item nav-link" id="botaoentrar" href="../users/sair.php"> <?php echo $nomeADM; ?> </a></li>
        </ul>
    </div>
</nav>
