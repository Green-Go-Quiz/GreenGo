<?php
# Nome do arquivo: PartidaQuizDAO.php
# Objetivo: classe DAO para o model de PartidaQuiz

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/PartidaQuizModel.php");
include_once(__DIR__ . "/../models/QuizModel.php");
include_once(__DIR__ . "/../models/ZonaModel.php");



class PartidaQuizDAO
{
    const SQL_QUIZ = "SELECT q.*, z.nomeZona FROM quiz q JOIN zona z ON (q.idZona = z.idZona)";

    // Método para converter um registro da base de dados em um objeto PartidaQuiz
    private function mapPartidaQuiz(array $row)
    {
        $partidaQuiz = new PartidaQuiz();
        $partidaQuiz->setIdPartidaQuiz($row['idPartidaQuiz']);
        $partidaQuiz->setIdPartida($row['idPartida']);
        $partidaQuiz->setIdQuiz($row['idQuiz']);

        // Definir outras propriedades de PartidaQuiz, se houver

        if (isset($row['nomeQuiz'])) {
            $quiz = new Quiz();
            $quiz->setIdQuiz($row['idQuiz']); //não entendi pq tem que passar o id da partida ???
            $quiz->setNomeQuiz($row['nomeQuiz']);
            $quiz->setMaximoPergunta($row['maximoPergunta']);
            $quiz->setComTempo($row['comTempo']);
            $quiz->setQuantTempo($row['quantTempo']);

            if (isset($row['nomeZona'])) {
                $zona = new Zona();
                $zona->setIdZona($row['idZona']);
                $zona->setNomeZona($row['nomeZona']);

                $quiz->setZona($zona);
            }

            $partidaQuiz->setQuiz($quiz);
        }
        if (isset($row['nomePartida'])) {
            $partida = new Partida();
            $partida->setIdPartida($row['idPartida']); //não entendi pq tem que passar o id da partida ???
            $partida->setDataInicio($row['dataInicio']);
            $partida->setDataFim($row['dataFim']);
            $partida->setLimiteJogadores($row['limiteJogadores']);
            $partida->setTempoPartida($row['tempoPartida']);
            $partida->setNomePartida($row['nomePartida']);
            $partida->setSenha($row['senhaPartida']);
            $partida->setStatusPartida($row['statusPartida']);


            if (isset($row['zonas'])) {
                // $zonas = array();
                // foreach ($row['nomeZona'] as $nomeZona) {
                //     $zona = new Zona();
                //     $zona->setIdZona($row['idZona']);
                //     $zona->setNomeZona($nomeZona);
                //     $zonas[] = $zona;
                // }
                $partida->setZonas($row['zonas']);
                // $partida->setZonas($zonas);
            }

            $partidaQuiz->setPartida($partida);
        }
        return $partidaQuiz;
    }

    public function list()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM partida_quiz p ORDER BY p.idPartidaQuiz";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapPartidaQuizzes($result);
    }

    public function listPartidasQuiz()
    {
        $conn = Connection::getConn();

        $sql = "SELECT p.*, q.*, z.*, pz.*
        FROM partida p
        JOIN partida_quiz q ON p.idPartida = q.idPartida
        JOIN partida_zona pz ON pz.idPartida = p.idPartida
        JOIN zona z ON pz.idZona = z.idZona
        WHERE p.idPartida IN (SELECT DISTINCT idPartida FROM partida_quiz)";

        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapPartidaQuizzes($result);
    }


    public function listByPartida(int $idPartida)
    {
        $conn = Connection::getConn();

        $sql = "SELECT pq.*, q.maximoPergunta, q.nomeQuiz, q.comTempo, q.quantTempo, q.idZona, z.nomeZona" .
            " FROM partida_quiz pq" .
            " JOIN quiz q ON (q.idQuiz = pq.idQuiz)" .
            " JOIN zona z ON (z.idZona = q.idZona)" .
            " WHERE pq.idPartida = :idPartida";


        $stm = $conn->prepare($sql);
        $stm->bindValue(":idPartida", $idPartida);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $this->mapQuizzesDaPartida($result);
    }

    public function insertPartidaQuiz(int $idPartida, int $idQuiz)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO partida_quiz (idPartida, idQuiz) VALUES (:idPartida, :idQuiz)";

        $stm = $conn->prepare($sql);

        $stm->bindValue(":idPartida", $idPartida);
        $stm->bindValue(":idQuiz", $idQuiz);
        $stm->execute();
    }


    public function deleteById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM partida_quiz WHERE idPartidaQuiz = ?";

        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
    }

    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM partida_quiz WHERE idPartidaQuiz = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $this->mapPartidaQuiz($result);
    }

    public function findByIdPartidaQuiz(int $idPartida, int $idQuiz)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM partida_quiz WHERE idPartida = :idPartida AND idQuiz = :idQuiz";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idPartida", $idPartida);
        $stm->bindValue(":idQuiz", $idQuiz);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->mapPartidaQuiz($result) : null;
    }



    // private function mapPartidaQuizzes($result)
    // {
    //     $partidaQuizzes = array();
    //     foreach ($result as $row) {
    //         $partidaQuiz = $this->mapPartidaQuiz($row);
    //         array_push($partidaQuizzes, $partidaQuiz);
    //     }

    //     return $partidaQuizzes;
    // }

    private function mapPartidaQuizzes($result)
    {
        $partidaQuizzes = array();
        if (count($result) == 0) {
            return $partidaQuizzes;
        }
        $currentRow = $result[0];
        $zonas = array();

        foreach ($result as $row) {
            if ($currentRow['idPartida'] != $row['idPartida']) {
                $currentRow['zonas'] = $zonas;
                $partidaQuiz = $this->mapPartidaQuiz($currentRow);
                array_push($partidaQuizzes, $partidaQuiz);
                $currentRow = $row;
                $zonas = array();
                $currentZona = new Zona();
                $currentZona->setIdZona($row['idZona']);
                $currentZona->setNomeZona($row['nomeZona']);
                array_push($zonas, $currentZona);
            } else {
                $currentZona = new Zona();
                $currentZona->setIdZona($row['idZona']);
                $currentZona->setNomeZona($row['nomeZona']);
                array_push($zonas, $currentZona);
            }
        }

        $currentRow['zonas'] = $zonas;
        $partidaQuiz = $this->mapPartidaQuiz($currentRow);
        array_push($partidaQuizzes, $partidaQuiz);

        return $partidaQuizzes;
    }

    private function mapQuizzesDaPartida($result)
    {

        $quizzes = array();
        foreach ($result as $row) {
            $currentQuiz = new Quiz();
            $currentQuiz->setIdQuiz($row['idQuiz']);
            $currentQuiz->setNomeQuiz($row['nomeQuiz']);
            $currentQuiz->setComTempo($row['comTempo']);
            $currentQuiz->setQuantTempo($row['quantTempo']);
            $currentQuiz->setIdZona($row['idZona']);
            $zona = new Zona();
            $zona->setIdZona($row['idZona']);
            $zona->setNomeZona(($row['nomeZona']));
            $currentQuiz->setZona($zona);
            array_push($quizzes, $currentQuiz);
        }

        return $quizzes;
    }
}
