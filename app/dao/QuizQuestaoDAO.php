<?php
# Nome do arquivo: QuizQuestaoDAO.php
# Objetivo: classe DAO para o model de QuizQuestao

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/QuizQuestaoModel.php");

class QuizQuestaoDAO
{
    public function insertQuizQuestaoAssociations(int $quizId, array $questoes)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO quiz_questao (idQuiz, idQuestao) VALUES (:idQuiz, :idQuestao)";

        $stm = $conn->prepare($sql);

        foreach ($questoes as $questao) {
            $stm->bindValue(":idQuiz", $quizId);
            $stm->bindValue(":idQuestao", $questao->getIdQuestao());
            $stm->execute();
        }
    }

    private function deleteQuizQuestaoAssociations(int $quizId)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM quiz_questao WHERE idQuiz = :idQuiz";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idQuiz", $quizId);
        $stm->execute();
    }

    public function insertQuizWithQuestoes(Quiz $quiz, array $questoes)
    {
        $conn = Connection::getConn();
        $conn->beginTransaction();

        try {
            // Inserir o quiz na tabela quiz
            $quizDAO = new QuizDAO();
            $quizDAO->insert($quiz);

            // Obter o ID do quiz inserido
            $quizId = $conn->lastInsertId();

            // Inserir as associações entre o quiz e as questões na tabela quiz_questao
            $this->insertQuizQuestaoAssociations($quizId, $questoes);

            $conn->commit();
        } catch (PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }


    public function deleteById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM quiz_questao WHERE idQuiz = ?";

        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
    }

    public function updateQuizWithQuestoes(Quiz $quiz, array $questoes)
    {
        $conn = Connection::getConn();
        $conn->beginTransaction();

        try {
            // Atualizar o quiz na tabela quiz
            $quizDAO = new QuizDAO();
            $quizDAO->update($quiz);

            // Obter o ID do quiz
            $quizId = $quiz->getIdQuiz();

            // Excluir as associações antigas do quiz com as questões na tabela quiz_questao
            $this->deleteQuizQuestaoAssociations($quizId);

            // Inserir as novas associações entre o quiz e as questões na tabela quiz_questao
            $this->insertQuizQuestaoAssociations($quizId, $questoes);

            $conn->commit();
        } catch (PDOException $e) {
            $conn->rollback();
            throw $e;
        }
    }

    public function list()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM quiz_questao";

        $stm = $conn->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapQuizQuestoes($result);
    }

    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM quiz_questao WHERE idQuizQuestao = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $this->mapQuizQuestao($result);
    }

    // Método para converter um registro da base de dados em um objeto QuizQuestao
    private function mapQuizQuestao(array $row)
    {
        $quizQuestao = new QuizQuestao();
        $quizQuestao->setIdQuizQuestao($row['idQuizQuestao']);
        $quizQuestao->setIdQuiz($row['idQuiz']);
        $quizQuestao->setIdQuestao($row['idQuestao']);
        // Definir outras propriedades de QuizQuestao, se houver

        return $quizQuestao;
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
}
