<?php
# Nome do arquivo: QuizQuestaoDAO.php
# Objetivo: classe DAO para o model de QuizQuestao

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/UsuarioModel.php");
include_once(__DIR__ . "/../models/RespostaModel.php");
include_once(__DIR__ . "/../models/RespostaUsuarioModel.php");


class RespostaUsuarioDAO
{
    private function mapRespostaUsuario(array $row)
    {
        $respostaUsuario = new RespostaUsuario();
        $respostaUsuario->setIdRespostaUsuario($row['idRespostaUsuario']);
        $respostaUsuario->setIdResposta($row['idResposta']);
        $respostaUsuario->setIdUsuario($row['idUsuario']);

        if (isset($row['respostaCerta'])) {
            $resposta = new Resposta();
            $resposta->setIdResposta($row['idResposta']);
            $resposta->setIdQuestao($row['idQuestao']);
            $resposta->setQuantidadeAlt($row['quantidadeAlt']);
            $resposta->setRespostaCerta($row['respostaCerta']);
            $resposta->setDescricaoR($row['descricaoR']);

            $respostaUsuario->setResposta($resposta);
        }
        if (isset($row['nomeUsuario'])) {
            $usuario = new Usuario();
            $usuario->setIdUsuario($row['idUsuario']); //não entendi pq tem que passar o id da usuario ???
            $usuario->setNomeUsuario($row['nomeUsuario']);
            $usuario->setGenero($row['genero']);
            $usuario->setEscolaridade($row['escolaridade']);
            $usuario->setLogin($row['loginUsuario']);
            $usuario->setEmail($row['email']);
            $usuario->setSenha($row['senha']);
            $usuario->setTipoUsuario($row['tipoUsuario']);

            $respostaUsuario->setUsuario($usuario);
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

    public function insertRespostaUsuario(int $idResposta, int $idUsuario)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO resposta_usuario (idResposta, idUsuario) VALUES (:idResposta, :idUsuario)";

        $stm = $conn->prepare($sql);

        $stm->bindValue(":idResposta", $idResposta);
        $stm->bindValue(":idUsuario", $idUsuario);
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

    public function findByIdRespostaUsuario(int $idResposta, int $idUsuario)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM resposta_usuario WHERE idResposta = :idResposta AND idUsuario = :idUsuario";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idResposta", $idResposta);
        $stm->bindValue(":idUsuario", $idUsuario);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->mapRespostaUsuario($result) : null;
    }
}
