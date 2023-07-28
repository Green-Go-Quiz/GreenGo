<?php



# Nome do arquivo: CamposAlternativaDAO.php
# Objetivo: classe DAO para o modelo de CamposAlternativa

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/AlternativaModel.php");

class AlternativaDAO
{
    // Método para inserir um CamposAlternativa
    public function insert(Alternativa $alternativa, int $idQuestao)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO alternativa (descricaoAlternativa, alternativaCerta, idQuestao)" .
            " VALUES (:descricaoAlternativa, :alternativaCerta, :idQuestao)";

        $stm = $conn->prepare($sql);
        $stm->bindValue("descricaoAlternativa", $alternativa->getDescricaoAlternativa());
        $stm->bindValue(":alternativaCerta", $alternativa->getAlternativaCerta());
        $stm->bindValue("idQuestao", $idQuestao);

        $stm->execute();
    }

    // Método para atualizar um CamposAlternativa
    public function update(Alternativa $alternativa)
    {
        $conn = Connection::getConn();

        $sql = "UPDATE alternativa SET descricaoAlternativa = :descricaoAlternativa, alternativaCerta = :alternativaCerta WHERE idAlternativa = :idAlternativa";

        $stm = $conn->prepare($sql);
        $stm->bindValue("descricaoAlternativa", $alternativa->getDescricaoAlternativa());
        $stm->bindValue("alternativaCerta", $alternativa->getAlternativaCerta());
        $stm->bindValue("idAlternativa", $alternativa->getIdAlternativa());

        $stm->execute();
    }

    // Método para buscar todos os CamposAlternativa no banco de dados
    public function findAllByQuestao($idQuestao)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM alternativa WHERE idQuestao = :idQuestao ORDER BY idAlternativa";

        $stm = $conn->prepare($sql);
        $stm->bindValue("idQuestao", $idQuestao);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapAlternativas($result);
    }

    // Método para converter um registro da base de dados em um objeto CamposAlternativa
    private function mapAlternativas($result)
    {
        $alternativas = array();
        foreach ($result as $reg) {
            $alt = new Alternativa();
            $alt->setIdAlternativa($reg['idAlternativa']);
            $alt->setDescricaoAlternativa($reg['descricaoAlternativa']);
            $alt->setAlternativaCerta($reg['alternativaCerta']);
            array_push($alternativas, $alt);
        }

        return $alternativas;
    }
}
