<?php
# Nome do arquivo: QuizQuestaoDAO.php
# Objetivo: classe DAO para o model de QuizQuestao

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/QuizQuestaoModel.php");
include_once(__DIR__ . "/../models/QuestaoModel.php");
include_once(__DIR__ . "/../models/AlternativaModel.php");


class QuizQuestaoDAO
{

    // Método para converter um registro da base de dados em um objeto QuizQuestao
    private function mapQuizQuestao(array $row)
    {
        $quizQuestao = new QuizQuestao();
        $quizQuestao->setIdQuizQuestao($row['idQuizQuestoes']);
        $quizQuestao->setIdQuiz($row['idQuiz']);
        $quizQuestao->setIdQuestao($row['idQuestao']);
        // Definir outras propriedades de QuizQuestao, se houver

        if (isset($row['descricaoQ'])) {
            $questao = new Questao();
            $questao->setIdQuestao($row['idQuestao']);
            $questao->setDescricaoQ($row['descricaoQ']);
            $questao->setGrauDificuldade($row['grauDificuldade']);
            $questao->setPontuacao($row['pontuacao']);
            $questao->setImagem($row['imagem']);

            $quizQuestao->setQuestao($questao);
        }

        return $quizQuestao;
    }

    public function listByQuiz(int $idQuiz)
    {
        $conn = Connection::getConn();

        $sql = "SELECT qq.*, q.descricaoQ, q.grauDificuldade, q.pontuacao, q.imagem" .
            " FROM quiz_questoes qq" .
            " JOIN questao q ON (q.idQuestao = qq.idQuestao)"  .
            " WHERE qq.idQuiz = :idQuiz";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idQuiz", $idQuiz);

        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapQuizQuestoes($result);
    }

    public function listByQuizJOG(int $idQuiz)
    {
        $conn = Connection::getConn();

        $sql = "SELECT qq.*, q.descricaoQ, q.grauDificuldade, q.pontuacao, q.imagem" .
            " FROM quiz_questoes qq" .
            " JOIN questao q ON (q.idQuestao = qq.idQuestao)"  .
            " WHERE qq.idQuiz = :idQuiz";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idQuiz", $idQuiz);


        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapQuestoesDoQuiz($result);
    }

    public function insertQuizQuestao(int $idQuiz, int $idQuestao)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO quiz_questoes (idQuiz, idQuestao) VALUES (:idQuiz, :idQuestao)";

        $stm = $conn->prepare($sql);

        $stm->bindValue(":idQuiz", $idQuiz);
        $stm->bindValue(":idQuestao", $idQuestao);
        $stm->execute();
    }

    public function deleteById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM quiz_questoes WHERE idQuizQuestoes = ?";

        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
    }



    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM quiz_questoes WHERE idQuizQuestoes = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $this->mapQuizQuestao($result);
    }


    public function findByIdQuizQuestao(int $idQuiz, int $idQuestao)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM quiz_questoes WHERE idQuiz = :idQuiz AND idQuestao = :idQuestao";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idQuiz", $idQuiz);
        $stm->bindValue(":idQuestao", $idQuestao);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->mapQuizQuestao($result) : null;
    }


    private function mapQuizQuestoes($result)
    {
        $quizQuestoes = array();
        foreach ($result as $row) {
            $quizQuestao = $this->mapQuizQuestao($row);
            array_push($quizQuestoes, $quizQuestao);
        }

        return $quizQuestoes;
    }

    private function mapQuestoesDoQuiz($result)
    {
        $questoes = array();

        foreach ($result as $row) {
            $currentQuestao = new Questao();
            $currentQuestao->setIdQuestao($row['idQuestao']);
            $currentQuestao->setDescricaoQ($row['descricaoQ']);
            $currentQuestao->setGrauDificuldade($row['grauDificuldade']);
            $currentQuestao->setPontuacao($row['pontuacao']);
            $currentQuestao->setImagem($row['imagem']);

            array_push($questoes, $currentQuestao);
        }

        return $questoes;
    }
}
