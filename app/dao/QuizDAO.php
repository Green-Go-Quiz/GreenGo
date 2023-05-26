<?php
#Nome do arquivo: QuizDAO.php
#Objetivo: classe DAO para o model de Quiz

include_once(__DIR__ . "/../connection/Co

nnection.php");
include_once(__DIR__ . "/../model/Quiz.php");
include_once(__DIR__ . "/../model/Questao.php");


class QuizDAO
{

    //Método para buscar um Quiz por seu ID
    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM quiz q" .
            " WHERE q.idQuiz = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

      
        $quizzes = $this->mapQuizzes($result);

        if (count($quizzes) == 1)
            return $quizzes[0];
        elseif (count($quizzes) == 0)
            return null;

        die("QuizDAO.findById()" .
            " - Erro: mais de um quiz encontrado.");
    }

    //Método para inserir um Quiz
    public function insert(Quiz $quiz)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO quiz (idQuiz, maximoPergunta, nomeQuiz, comTempo, quantTempo, idQuestao)" .
            " VALUES (:id, :maximoPergunta, :nomeQuiz, :comTempo, :quantTempo, :idQuestao)";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $quiz->getId());
        $stm->bindValue("maximoPergunta", $quiz->getMaximoPergunta());
        $stm->bindValue("nomeQuiz", $quiz->getNome());
        $stm->bindValue("comTempo", $quiz->getComTempo());
        $stm->bindValue("quantTempo", $quiz->getQuantTempo());
        $stm->bindValue("idQuestao", $quiz->getQuestao());
        $stm->execute();
    }

    //Método para atualizar um Quiz
    public function update(Quiz $quiz)
    {
        $conn = Connection::getConn();

        $sql = "UPDATE quiz SET maximoPergunta = :maximoPergunta, nomeQuiz = :nomeQuiz," .
            " comTempo = :comTempo, quantTempo = :quantTempo, idQuestao = :idQuestao" .
            " WHERE idQuiz = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("maximoPergunta", $quiz->getMaximoPergunta());
        $stm->bindValue("nomeQuiz", $quiz->getNome());
        $stm->bindValue("comTempo", $quiz->getComTempo());
        $stm->bindValue("quantTempo", $quiz->getQuantTempo());
        $stm->bindValue("questao", $quiz->getQuestao());
        $stm->bindValue("id", $quiz->getId());
        $stm->execute();
    }
    // Método para excluir um Quiz pelo seu ID
    public function deleteById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM quiz WHERE idQuiz = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();
    }

    // Método para converter um registro da base de dados em um objeto Quiz
    private function mapQuizzes($result)
    {
        $quizes = array();
        foreach ($result as $reg) {
            $quiz = new Quiz();
            $quiz->setId($reg['idQuiz']);
            $quiz->setMaximoPergunta($reg['maximoPergunta']);
            $quiz->setNome($reg['nome']);
            $quiz->setComTempo($reg['comTempo']);
            $quiz->setQuantTempo($reg['quantTempo']);
            array_push($quizes, $quiz);
        }

        return $quizes;
    }
}

    //Método para converter um registro da base de dados