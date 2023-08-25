<?php
include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/QuestaoEspecieModel.php");
include_once(__DIR__ . "/../models/QuestaoModel.php");

class QuestaoEspecieDAO
{

    private function mapQuestaoEspecie(array $row)
    {
        $questaoEspecie = new QuestaoEspecie();
        $questaoEspecie->setIdQuestaoEspecie($row['idQuestaoEspecie']);
        $questaoEspecie->setIdEspecie($row['idEspecie']);
        $questaoEspecie->setIdQuestao($row['idQuestao']);
        // Definir outras propriedades de QuestaoEspecie, se houver

        if (isset($row['nomePop'])) {
            $especie = new Especie();
            $especie->setIdEspecie($row['idEspecie']);
            $especie->setNomePopular($row['nomePop']);
            $especie->setNomeCientifico($row['nomeCie']);

            $questaoEspecie->setEspecie($especie);
        }

        return $questaoEspecie;
    }

    public function listByQuestao(int $idQuestao)
    {
        $conn = Connection::getConn();

        $sql = "SELECT qe.*" .
            " FROM questao_especie qe" .
            " JOIN especie e ON (e.idEspecie = qe.idEspecie)"  .
            " WHERE qe.idQuestao = :idQuestao";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idQuestao", $idQuestao);

        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapQuestaoEspecies($result);
    }


    public function insertQuestaoEspecie(int $idEspecie, int $idQuestao)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO questao_especie (idEspecie, idQuestao) VALUES (:idEspecie, :idQuestao)";

        $stm = $conn->prepare($sql);

        $stm->bindValue(":idEspecie", $idEspecie);
        $stm->bindValue(":idQuestao", $idQuestao);
        $stm->execute();
    }

    public function deleteById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM questao_especie WHERE idQuestaoEspecie = ?";

        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
    }
    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM questao_especie WHERE idQuestaoEspecie = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $this->mapQuestaoEspecie($result);
    }
    public function findByIdEspecieQuestao(int $idEspecie, int $idQuestao)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM questao_especie WHERE idEspecie = :idEspecie AND idQuestao = :idQuestao";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idEspecie", $idEspecie);
        $stm->bindValue(":idQuestao", $idQuestao);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->mapQuestaoEspecie($result) : null;
    }

    private function mapQuestaoEspecies($result)
    {
        $questaoEspecies = array();
        foreach ($result as $row) {
            $questaoEspecie = $this->mapQuestaoEspecie($row);
            array_push($questaoEspecies, $questaoEspecie);
        }

        return $questaoEspecies;
    }
}
