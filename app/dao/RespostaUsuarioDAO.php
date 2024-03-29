<?php
# Nome do arquivo: QuizQuestaoDAO.php
# Objetivo: classe DAO para o model de QuizQuestao

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/EquipeUsuarioModel.php");
include_once(__DIR__ . "/../models/RespostaUsuarioModel.php");


class RespostaUsuarioDAO
{
    private function mapRespostaUsuario(array $row)
    {
        $respostaUsuario = new RespostaUsuario();
        $respostaUsuario->setIdRespostaUsuario($row['idRespostaUsuario']);
        $respostaUsuario->setIdQuestao($row['idQuestao']);
        $respostaUsuario->setIdAlternativa($row['idAlternativa']);
        $respostaUsuario->setIdEquipeUsuario($row['idEquipeUsuario']);
        $respostaUsuario->setAcertou($row['acertou']);


        if (isset($row['nomeUsuario'])) {
            $equipeUsuario = new EquipeUsuario();
            $equipeUsuario->setIdEquipeUsuario($row['idEquipeUsuario']);
            $equipeUsuario->setIdUsuario($row['idUsuario']);
            $equipeUsuario->setIdEquipe($row['idEquipe']);
            $equipeUsuario->setPontuacaoUsuario($row['pontuacaoUsuario']);

            $respostaUsuario->setEquipeUsuario($equipeUsuario);
        }

        if (isset($row['descricaoQ'])) {
            $questao = new Questao();
            $questao->setIdQuestao($row['idQuestao']);
            $questao->setDescricaoQ($row['descricaoQ']);
            $questao->setGrauDificuldade($row['grauDificuldade']);
            $questao->setPontuacao($row['pontuacao']);
            $questao->setImagem($row['imagem']);

            $respostaUsuario->setQuestao($questao);
        }

        if (isset($row['descricaoAlternativa'])) {
            $alternativa = new Alternativa();
            $alternativa->setIdAlternativa($row['idAlternativa']);
            $alternativa->setDescricaoAlternativa($row['descricaoAlternativa']);
            $alternativa->setAlternativaCerta($row['alternativaCerta']);
            $alternativa->setIdQuestao($row['idQuestao']);

            $respostaUsuario->setQuestao($questao);
        }

        return $respostaUsuario;
    }



    public function listByResposta(int $idResposta)
    {
        $conn = Connection::getConn();

        $sql = "SELECT ru.*, u.nomeUsuario, u.escolaridade, u.loginUsuario, u.tipoUsuario" .
            " FROM resposta_usuario ru" .
            " JOIN usuario u ON (u.idUsuario = ru.idUsuario)"  .
            " WHERE ru.idResposta = :idResposta";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idResposta", $idResposta);

        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapRespostaUsuario($result);
    }

    public function insertRespostaUsuario(RespostaUsuario $respostaUsuario)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO resposta_usuario (idQuestao, idQuiz, idAlternativa, idEquipeUsuario, acertou)" .
            " VALUES (:idQuestao, :idQuiz, :idAlternativa, :idEquipeUsuario, :acertou)";

        $stm = $conn->prepare($sql);

        $stm->bindValue(":idQuestao", $respostaUsuario->getIdQuestao());
        $stm->bindValue(":idQuiz", $respostaUsuario->getidQuiz());
        $stm->bindValue(":idAlternativa", $respostaUsuario->getIdAlternativa());
        $stm->bindValue(":idEquipeUsuario", $respostaUsuario->getIdEquipeUsuario());
        $stm->bindValue(":acertou", $respostaUsuario->getAcertou());


        $stm->execute();
    }

    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM resposta_usuario WHERE idRespostaUsuario = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $this->mapRespostaUsuario($result);
    }

    public function findRespostaUsuario(int $idQuestao, int $idEquipeUsuario, int $idQuiz)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM resposta_usuario 
                WHERE idQuestao = :idQuestao AND idEquipeUsuario = :idEquipeUsuario AND idQuiz = :idQuiz";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idQuestao", $idQuestao);
        $stm->bindValue(":idEquipeUsuario", $idEquipeUsuario);
        $stm->bindValue(":idQuiz", $idQuiz);

        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $this->mapRespostaUsuario($result);
    }


    public function findQuantidadeRespostaUsuario(int $idEquipeUsuario, int $idQuiz)
    {
        $conn = Connection::getConn();

        $sql = "SELECT count(*) as quantidade FROM resposta_usuario 
                WHERE idEquipeUsuario = :idEquipeUsuario AND idQuiz = :idQuiz";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idEquipeUsuario", $idEquipeUsuario);
        $stm->bindValue(":idQuiz", $idQuiz);

        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        return $result['quantidade'];
    }
}
