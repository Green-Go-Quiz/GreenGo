<?php
#Nome do arquivo: QuizDAO.php
#Objetivo: classe DAO para o model de Quiz

include_once(__DIR__ . "/../connection/Connection.php");

include_once(__DIR__ . "/../models/QuizModel.php");
include_once(__DIR__ . "/../models/ZonaModel.php");


class QuizDAO
{
    const SQL_QUIZ = "SELECT q.*, z.nomeZona FROM quiz q JOIN zona z ON (q.idZona = z.idZona)";

    public function list()
    {
        $conn = Connection::getConn();

        $sql = QuizDAO::SQL_QUIZ . " ORDER BY idQuiz";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapQuizzes($result);
    }
    //Método para buscar um Quiz por seu ID
    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = QuizDAO::SQL_QUIZ .
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



    public function insert(Quiz $quiz)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO quiz (maximoPergunta, nomeQuiz, comTempo, quantTempo, idZona)
            VALUES (:maximoPergunta, :nomeQuiz, :comTempo, :quantTempo, :idZona)";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":maximoPergunta", $quiz->getMaximoPergunta());
        $stm->bindValue(":nomeQuiz", $quiz->getNomeQuiz());
        $stm->bindValue(":comTempo", $quiz->getComTempo());
        $stm->bindValue(":quantTempo", $quiz->getQuantTempo());
        $stm->bindValue(":idZona", $quiz->getIdZona());
        $stm->execute();
    }

    public function zonaComumComPartida($partidaId)
    {
        $conn = Connection::getConn();
        $sql = QuizDAO::SQL_QUIZ .
            ' WHERE q.idZona IN (
                SELECT pz.idZona
                FROM partida_zona pz
                WHERE pz.idPartida = :partidaId
            )';

        $stm = $conn->prepare($sql);
        $stm->execute([':partidaId' => $partidaId]);
        $result = $stm->fetchAll();

        //return $result;
        return $this->mapQuizzes($result);
    }

    public function findAll()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM quiz";

        $stm = $conn->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapQuizzes($result);
    }

    //Método para atualizar um Quiz
    public function update(Quiz $quiz)
    {
        $conn = Connection::getConn();

        $sql = "UPDATE quiz SET maximoPergunta = :maximoPergunta, nomeQuiz = :nomeQuiz," .
            " comTempo = :comTempo, quantTempo = :quantTempo, idZona = :idZona" .
            " WHERE idQuiz = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":maximoPergunta", $quiz->getMaximoPergunta());
        $stm->bindValue(":nomeQuiz", $quiz->getNomeQuiz());
        $stm->bindValue(":comTempo", $quiz->getComTempo());
        $stm->bindValue(":quantTempo", $quiz->getQuantTempo());
        $stm->bindValue(":idZona", $quiz->getIdZona());
        $stm->bindValue(":id", $quiz->getIdQuiz());
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
        $quizzes = array();
        foreach ($result as $row) {
            $quiz = new Quiz();
            $quiz->setIdQuiz($row['idQuiz']);
            $quiz->setMaximoPergunta($row['maximoPergunta']);
            $quiz->setNomeQuiz($row['nomeQuiz']);
            $quiz->setComTempo($row['comTempo']);
            $quiz->setQuantTempo($row['quantTempo']);
            $quiz->setIdZona($row['idZona']);


            // Criar objeto Zona e setar os valores correspondentes
            $zona = new Zona();
            $zona->setIdZona($row['idZona']);
            $zona->setNomeZona($row['nomeZona']);
            // Definir outras propriedades da zona, se houver

            $quiz->setZona($zona); // Associar o objeto Zona ao Quiz

            array_push($quizzes, $quiz);
        }

        return $quizzes;
    }

    private function insertQuizQuestaoAssociations(int $quizId, array $questoes)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO quiz_questao (idQuiz, idQuestao) VALUES (:idQuiz, :idQuestao)";

        $stm = $conn->prepare($sql);

        foreach ($questoes as $questao) {
            $stm->bindValue("idQuiz", $quizId);
            $stm->bindValue("idQuestao", $questao->getIdQuestao());
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
}
