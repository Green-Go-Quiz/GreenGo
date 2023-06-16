<?php
##Classe DAO para o model de zona

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/ZonaModel.php");

class zonaDAO {
    private const SQL_ZONA = "SELECT z.*, s.nomeZona AS nomeZona FROM zona z".
    " JOIN zona s ON s.idZona= z.idZona";

    private function mapZonas($resultSql) {
        $zonas = array();
        foreach ($resultSql as $reg):

            $zona = new Zona();
            $zona->setIdZona($reg['idZona']);
            $zona->setNomeZona($reg['nomeZona']);
            $zona->setQntdPlanta($reg['qntPlantas']);
            $zona->setPontosTotais($reg['pontoZona']);

            array_push($zonas, $zona);
        endforeach;

        return $zonas;
    }

    public function list() {
        $conn = conectar_db();

        $sql = "SELECT z.idZona, z.nomeZona, COUNT(p.idPlanta) AS qntPlantas, SUM(p.pontuacaoPlanta) AS pontoZona
        FROM zona z 
        LEFT JOIN planta p ON z.idZona = p.idZona 
        GROUP BY z.idZona, z.nomeZona
        ORDER BY z.idZona";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        $zonas = array();
        foreach ($result as $reg):
            $zona = 
                new Zona($reg['idZona'], $reg['nomeZona'], $reg['qntPlantas'], $reg['pontoZona']);
            array_push($zonas, $zona);
        endforeach;

        return $zonas;
    }

    public function findById($idZona) {
        $conn = conectar_db();

        $sql = zonaDAO::SQL_ZONA . 
                " WHERE z.idZona = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idZona]);
        $result = $stmt->fetchAll();

        //Criar o objeto stand
        $zonas = $this->mapZonas($result);

        if(count($zonas) == 1)
            return $zonas[0];
        elseif(count($zonas) == 0)
            return null;

        die("zonaDAO.findById - Erro: mais de um Zona".
                " encontrado para o ID ".$idZona);
    }


    public function save(Zona $zona) {
        $conn = conectar_db();

        $sql = "INSERT INTO zona (nomeZona)".
        " VALUEs (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$zona->getNomeZona()]);
    }

    public function update(Zona $zona) {
        $conn = conectar_db();
    
        $sql = "UPDATE zona SET nomeZona = ? WHERE idZona = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$zona->getNomeZona(), $zona->getIdZona()]);
    }

    
    public function delete(Zona $zona) {
    $conn = conectar_db();

    $sql = "DELETE FROM zona WHERE idZona = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$zona->getIdZona()]);
}
    
}



?>