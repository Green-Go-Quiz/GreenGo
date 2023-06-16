<?php 
if(isset($_POST['txtNomeZona'])){
    $nomeZona = $_POST['txtNomeZona'];
    if (strlen($nomeZona) > 4) {
        echo 'invalido';
    } else {
        echo 'invalido';
    }
}
?>