<?php

include_once(__DIR__."/../connection/Connection.php");
include_once(__DIR__."/../models/EspecieModel.php");

class EspecieDAO {

    private const SQL_ESPECIE = "SELECT n.*, e.nomePop FROM especie n".
    " JOIN especie e ON e.idEspecie = n.idEspecie";

    private function mapEspecies($resultSql) {
            $especies = array();
            foreach ($resultSql as $reg):
            
            $especie = new Especie(); 
            $especie->setIdEspecie($reg['idEspecie']);
            $especie->setNomePopular($reg['nomePop']);
            $especie->setNomeCientifico($reg['nomeCie']);
            $especie->setDescricao($reg['descricao']);
            $especie->setImagemEspecie($reg['imagemEspecie']);
            $especie->setFrutifera($reg['frutifera']);
            $especie->setComestivel($reg['comestivel']);
            $especie->setRaridade($reg['raridade']);
            $especie->setMedicinal($reg['medicinal']);
            $especie->setToxidade($reg['toxidade']);
            $especie->setExotica($reg['exotica']);
           
            array_push($especies, $especie);
        endforeach;

        return $especies;
    
}

    public function list() {
        $conn = conectar_db();

        $sql = EspecieDAO::SQL_ESPECIE . 
                " ORDER BY e.nomeCie";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapEspecies($result);
    }

    public function findById($idEspecie) {
        $conn = conectar_db();

        $sql = EspecieDAO::SQL_ESPECIE . 
                " WHERE n.idEspecie = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idEspecie]);
        $result = $stmt->fetchAll();

        //Criar o objeto Especie
        $especies = $this->mapEspecies($result);

        if(count($especies) == 1)
            return $especies[0];
        elseif(count($especies) == 0)
            return null;

        die("EspecieDAO.findById - Erro: mais de uma espécie".
                " encontrado para o ID ".$idEspecie);
    }


    public function save(Especie $especie) {
        $conn = conectar_db();

        $sql = "INSERT INTO especie (nomePop, nomeCie, descricao, imagemEspecie, frutifera, comestivel, raridade, medicinal, toxidade, exotica)".
        " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$especie->getNomePopular(), $especie->getNomeCientifico(), $especie->getDescricao(), $especie->getImagemEspecie(),
                $especie->getFrutifera(), $especie->getComestivel(), $especie->getRaridade(), $especie->getMedicinal(), $especie->getToxidade(), $especie->getExotica()]);
    }

    public function update(Especie $especie) {
        $conn = conectar_db();
    
        $sql = "UPDATE especie SET nomePop = ?, nomeCie = ?, descricao = ?, imagemEspecie = ?, frutifera = ?, comestivel = ?, raridade = ?, medicinal = ?, toxidade = ?, exotica = ? WHERE idEspecie = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$especie->getNomePopular(), $especie->getNomeCientifico(), $especie->getDescricao(), $especie->getImagemEspecie(),
        $especie->getFrutifera(), $especie->getComestivel(), $especie->getRaridade(), $especie->getMedicinal(), $especie->getToxidade(), $especie->getExotica(), $especie->getIdEspecie()]);
    }

    
    public function delete(Especie $especie) {
    $conn = conectar_db();
    

    $sql = "DELETE FROM especie WHERE idEspecie = ?";
    $arquivo_del = $especie->getImagemEspecie();
    if (file_exists($arquivo_del)) {
        unlink($arquivo_del);
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute([$especie->getIdEspecie()]);
}
    
}

?>