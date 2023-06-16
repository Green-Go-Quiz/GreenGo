<?php
#Classe auxiliar para criar componentes HTML de Espécie

class EspecieHTMLForm {

    public static function desenhaSelect($especies, $name, $id, $idEspecieSelec=0) {
        echo "<select class='form-control' style='width: 428px; margin-top: 1px; color: #ebf0f1; background-color: #f0b6bc; font-family: Poppins-semibold;' name='". $name ."' id='". $id ."'>";

        foreach($especies as $especie):
            echo "<option value='" .$especie->getIdEspecie(). "'";

            if($especie->getIdEspecie() == $idEspecieSelec)
                echo " selected ";

            echo ">". $especie->getNomePopular()." (Nome Cientifíco: ". $especie->getNomeCientifico(). ")"."</option>";
        endforeach;

        echo "</select>";
    }

}

?>