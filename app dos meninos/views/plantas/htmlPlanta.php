<html>
<link rel="stylesheet" href="../css/listPlanta.css">
</html>

<style>

    .btn:hover {
        color: #f58c95;
        transform: scale(1.05); }

        a.editar:hover {
            color: #ebf0f1 !important;
            background-color: #04574d; }

        a.editar{
            color: #ebf0f1 !important;
            background-color: #338a5f; }


        a.excluir {
            color: #f0b6bc;
            border-color: #f0b6bc;
        }

        a.excluir:hover {
            color: var(--branco);
            background-color: #f0b6bc !important;
            border-radius: 5px; }

        #nomePlanta {
            background-color: #C05367 !important;
            color: #FFFFFF !important;
            border-radius: 20px;
            transform: scale(1.05);
        }

</style>

<?php
Class PlantaHTML {
    public static function desenhaPlanta($plantas) {
        echo "<div class='container text-center'>";
        echo "<div class='row row-cols-4'>";

        foreach ($plantas as $planta):
            echo "<div class='col-md-4'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem;'>";
            echo "<a href='visualizarPlanta.php?idp=".$planta->getIdPlanta()."&ide=".$planta->getEspecie()->getIdEspecie()."'><img src='".$planta->getImagemPlanta()."' style='width: 90%; height: 90%; margin-right: 10px; border-radius: 5px;'class='card-img-top mais' alt='...'></a>";
            echo "<div class='card-body'>";
            echo "<h5 id='nomePlanta' class='card-title nome-soc'>". $planta->getNomeSocial() ."</h5>"."<br>"; 
            echo "<p class='card-text nome-texto'>Código: ".$planta->getCodNumerico()."<br>Pontuação: ".$planta->getPontos()."<br>"."</p>";
            echo "<p class='card-text nome-texto' style='color: #04574d;'>".$planta->getZona()."</p>";
            echo "<a href='editarPlanta.php?id=".$planta->getIdPlanta()."' class='btn btn-primary editar'>Editar</a>";
            echo "<a href='deletarPlanta.php?id=".$planta->getIdPlanta()."' onclick='return confirm(\"Confirma a exclusão da Planta?\");' class='btn btn-alert excluir'>Excluir</a>";
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        endforeach;

        echo "</div>";
        echo "</div>";
    }
}
?>