<html>
<link rel="stylesheet" href="../css/listPlanta.css">
</html>

<style>

#raridadeEspecie {
        margin-left: 57px;
        width: 200px;
        background-color: #FFFFFF;
        color: #C05367;
        border-radius: 20px;
    }


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

        #nomeEspecie {
            background-color: #C05367 !important;
            color: #FFFFFF !important;
            border-radius: 20px;
            transform: scale(1.05);
        }
</style>


<?php
Class EspecieHTML {
    public static function desenhaEspecie($especies) {

        
        echo "<div class='container text-center'>";
        echo "<div class='row row-cols-4'>"; // inicie a div row fora do loop

        foreach ($especies as $especie):

            $frutifera = $especie->getFrutifera();
            if ($frutifera == 1) { 
                $frut = "<br>"."Frutífera";
            } else { 
                $frut = "";
            };

            $exotica = $especie->getExotica();
            if ($exotica == 1) { 
                $exot = "<br>"."Exótica";
            } else { 
                $exot = "";
            };

            $raridade = $especie->getRaridade();
            if ($raridade == 1) { 
                $rara = "<br>"."Rara";
            } else { 
                $rara = "";
            };

            $toxidade = $especie->getToxidade();
            if ($toxidade == 1) { 
                $tox = "<br>"."Toxíca";
            } else { 
                $tox = "";
            };

            $medicinal = $especie->getMedicinal();
            if ($medicinal == 1) { 
                $med = "<br>"."Medicinal";
            } else { 
                $med = "";
            };

            $comestivel = $especie->getComestivel();
            if ($comestivel == 1) { 
                $come = "<br>"."Comestível";
            } else { 
                $come = "";
            };
            echo "<div class='col-md-4'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem; '>";
            echo "<img src='".$especie->getImagemEspecie()."' style='width: 90%; height: 90%; margin-left: 18px; border-radius: 5px;'class='card-img-top mais' alt='...'>";
            echo "<div class='card-body'>";
            echo "<h5 id='nomeEspecie' class='card-title nome-soc'>". $especie->getNomePopular() ."</h5>";
            echo "<p class='card-text nome-texto'>".$frut.$tox.$med.$come.$rara.$exot."</p>";
            echo "<a href='editarEspecie.php?id=".$especie->getIdEspecie()."' class='btn btn-primary editar'>Editar</a>";
            echo "<a href='deletarEspecie.php?id=".$especie->getIdEspecie()."' onclick='return confirm(\"Confirma a exclusão da Espécie? Todas as plantas associadas a essa espécie também serão excluídas!\");' class='btn btn-alert excluir'>Excluir</a>";
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        endforeach;

        echo "</div>"; // feche a div row
        echo "</div>";
    }
}
?>


