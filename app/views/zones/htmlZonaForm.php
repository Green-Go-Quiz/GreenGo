<?php
#Classe auxiliar para criar componentes HTML de Stand

class ZonaHTMLForm {

    public static function desenhaSelect($zonas, $name, $id, $idZonaSelec=0) {
        echo "<select class='form-control' style='width: 428px; margin-top: 1px; color: #ebf0f1; background-color: #f0b6bc; font-family: Poppins-semibold;' name='". $name ."' id='". $id ."'>";

        foreach($zonas as $zona):
            echo "<option value='" .$zona->getIdZona(). "'";

            if($zona->getIdZona() == $idZonaSelec)
                echo " selected ";

            echo ">". $zona->getNomeZona()." (Quantidade de Plantas: ". $zona->getQntdPlanta(). ")"."</option>";
        endforeach;

        echo "</select>";
    }

}

?>