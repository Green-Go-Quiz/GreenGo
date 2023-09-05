<?php

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/EquipeModel.php");

class EquipeDAO
{

    private const SQL_EQUIPE = "SELECT * FROM equipe e";
    private const SQL_EQUIPE_PARTIDA = "SELECT e.*" .
        " FROM partida_equipe pe" .
        " JOIN equipe e ON pe.idEquipe = e.idEquipe";

    private function mapEquipes($resultSql)
    {
        $equipes = array();
        foreach ($resultSql as $reg) :

            $equipe = new Equipe();
            $equipe->setIdEquipe($reg['idEquipe']);
            $equipe->setNomeEquipe($reg['nomeEquipe']);
            $equipe->setCodEntrada($reg['codEntrada']);
            $equipe->setCorEquipe($reg['cor']);
            $equipe->setIconeEquipe($reg['icone']);

            array_push($equipes, $equipe);
        endforeach;

        return $equipes;
    }

    public function list()
    {
        $conn = Connection::getConn();

        $sql = EquipeDAO::SQL_EQUIPE .
            " order BY e.nomeEquipe";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapEquipes($result);
    }

    public function findById($idEquipe)
    {
        $conn = Connection::getConn();

        $sql = EquipeDAO::SQL_EQUIPE .
            " WHERE e.idEquipe = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idEquipe]);
        $result = $stmt->fetchAll();

        //Criar o objeto Especie
        $equipes = $this->mapEquipes($result);

        if (count($equipes) == 1)
            return $equipes[0];
        elseif (count($equipes) == 0)
            return null;

        die("EspecieDAO.findById - Erro: mais de uma equipe" .
            " encontrado para o ID " . $idEquipe);
    }
    public function listByPartida($idPartida)
    {
        $conn = Connection::getConn();

        $sql = EquipeDAO::SQL_EQUIPE_PARTIDA .
            " WHERE pe.idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);
        $result = $stmt->fetchAll();



        //Criar o objeto Partida
        $equipes = $this->mapEquipes($result);

        return $equipes;
    }

    public function save(Equipe $equipe)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO equipe (nomeEquipe, codEntrada, cor, icone)" .
            " VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$equipe->getNomeEquipe(), $equipe->getCodEntrada(), $equipe->getCorEquipe(), $equipe->getIconeEquipe()]);
    }

    public function update(Equipe $equipe)
    {
        $conn = Connection::getConn();

        $sql = "UPDATE equipe SET nomeEquipe = ?, codEntrada = ?, cor = ?, icone = ? WHERE idEquipe = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$equipe->getNomeEquipe(), $equipe->getCodEntrada(), $equipe->getCorEquipe(), $equipe->getIconeEquipe(), $equipe->getIdEquipe()]);
    }


    public function delete(Equipe $equipe)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM equipe WHERE idEquipe = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$equipe->getIdEquipe()]);
    }
}
