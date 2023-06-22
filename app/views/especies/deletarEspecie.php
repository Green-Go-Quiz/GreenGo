<?php
#Arquivo para executar a exclusão de um Personagem

include_once("../../controllers/EspecieController.php");

$idEspecie = $_GET["id"];

$especieCont = new EspecieController();
$especie = $especieCont->buscarPorId($idEspecie);

if($especie != null) {
    //Deletar o especie
    $especieCont->excluir($especie);

    //Retornar para a página inicial
    header("location: listEspecies.php");

} else { 
    echo "A especie de ID ".$idEspecie." não existe.";
    echo "<br>";
    echo "<a href='listEspecies.php'>Voltar</a>";
}

?>