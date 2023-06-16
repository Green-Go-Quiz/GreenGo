<?php
#Arquivo para executar a inclusão de um personagem

include_once(__DIR__."/../../models/EspecieModel.php");
include_once(__DIR__."/../../controllers/EspecieController.php");

//Capturar os valores vindos do formulário
$id = $_POST["id_especie"];
$nomePopular = $_POST["Nome_Popular"];
$nomeCientifico = $_POST['Nome_Cientifico'];
$descricao = $_POST['Descricao'];
$frutifera = isset($_POST['frutifera']) && !empty($_POST['frutifera']) ? $_POST['frutifera'] : 0;
$comestivel = isset($_POST['comestivel']) && !empty($_POST['comestivel']) ? $_POST['comestivel'] : 0;
$raridade = isset($_POST['raridade']) && !empty($_POST['raridade']) ? $_POST['raridade'] : 0;
$medicinal = isset($_POST['medicinal']) && !empty($_POST['medicinal']) ? $_POST['medicinal'] : 0;
$toxidade = isset($_POST['toxidade']) && !empty($_POST['toxidade']) ? $_POST['toxidade'] : 0;
$exotica = isset($_POST['exotica']) && !empty($_POST['exotica']) ? $_POST['exotica'] : 0;
$imagem = $_FILES['imagem'];

$extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
$nome_imagem = md5(uniqid($imagem['name'])).".".$extensao;
$caminho_imagem = "../../public/especies/" . $nome_imagem;
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

//Criar o objeto personagem
$especie = new Especie();
$especie->setIdEspecie($id);
$especie->setNomePopular($nomePopular);
$especie->setNomeCientifico($nomeCientifico);
$especie->setDescricao($descricao);
$especie->setImagemEspecie($caminho_imagem);
$especie->setFrutifera($frutifera);
$especie->setComestivel($comestivel);
$especie->setRaridade($raridade);
$especie->setMedicinal($medicinal);
$especie->setToxidade($toxidade);
$especie->setExotica($exotica);

//Chamar o controler para salvar o planta
$especieCont = new EspecieController();
$especieCont->atualizar($especie);

//Redireciona para o início
header("location: listEspecies.php");

?>