<?php
# Nome do arquivo: PartidaQuizDAO.php
# Objetivo: classe DAO para o model de PartidaQuiz

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/PartidaQuizModel.php");
include_once(__DIR__ . "/../models/QuizModel.php");
include_once(__DIR__ . "/../models/PartidaModel.php");
include_once(__DIR__ . "/../models/RespostaModel.php");
include_once(__DIR__ . "/../models/ZonaModel.php");



class RespostaDAO
{
    private function mapRespostas($result)
    {
        $respostas = array();
        foreach ($result as $row) {
            $resposta = new Resposta();
            $resposta->setIdResposta($row['idResposta']);
            $resposta->setQuantidadeAlt($row['quantidadeAlt']);
            $resposta->setRespostaCerta($row['respostaCerta']);
            $resposta->setDescricaoR($row['descricaoR']);
            $resposta->setIdQuestao($row['idQuestao']);

            $questao = new Questao();
            $questao->setIdQuestao($row['idQuestao']);
            $questao->setDescricaoQ($row['descricaoQ']);

            $resposta->setQuestao($questao);

            array_push($respostas, $questao);
        }

        return $respostas;
    }

    public function list()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM resposta r ORDER BY r.idResposta";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapRespostas($result);
    }

    ///criar um listByQuiz? Seria interessante mostrar as repostas de cada questao daquele quiz?

    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM resposta WHERE idResposta = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $this->mapRespostas($result);
    }

    public function findAll()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM resposta";

        $stm = $conn->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapRespostas($result);
    }
}
