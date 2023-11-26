<html>
<link rel="stylesheet" href="../css/listPlanta.css">
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

        #NomeZona {
            background-color: #C05367 !important;
            color: #FFFFFF !important;
            border-radius: 20px;
            transform: scale(1.05);
        }

</style>
</html>

<?php
 Class ZonaHTML {
    public static function desenhaZona($zonas) {
        echo "<div class='container text-center'>";
        echo "<div class='row row-cols-4'>";

        foreach ($zonas as $zona):
            echo "<div class='col-md-4'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title nome-soc' id='NomeZona'>". $zona->getNomeZona() ."</h5>"."<br>";
            echo "<p class='card-text nome-texto'> Quantidade de Plantas: ".$zona->getQntdPlanta()."<br> Pontos Totais: ".$zona->getPontosTotais()."</p>";
            echo "<a href='editarZona.php?id=".$zona->getIdZona()."' class='btn btn-primary editar'>Editar</a>";
            echo "<a href='deletarZona.php?id=".$zona->getIdZona()."' onclick='return confirm(\"Confirma a exclusão da Zona? Todas as plantas associadas a essa zona também serão excluídas!\");' class='btn btn-alert excluir'>Excluir</a>";
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

<html>
<link rel="stylesheet" href="../css/listPlanta.css">
</html>

