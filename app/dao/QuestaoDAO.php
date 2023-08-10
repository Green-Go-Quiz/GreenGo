<?php
#Nome do arquivo: QuestaoDAO.php
#Objetivo: classe DAO para o model de Questao

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/QuestaoModel.php");

class QuestaoDAO
{

    //Método para listar as questões a partir da base de dados
    public function list()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM questao q ORDER BY q.idQuestao";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapQuestoes($result);
    }

    //Método para buscar uma questão por seu ID
    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM questao q" .
            " WHERE q.idQuestao = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        // Depuração: verificar a consulta SQL e o resultado da consulta
        //var_dump($sql);    // Exibir a consulta SQL
        // var_dump($result); // Exibir o resultado da consulta

        $questoes = $this->mapQuestoes($result);

        if (count($questoes) == 1)
            return $questoes[0];
        elseif (count($questoes) == 0)
            return null;

        die("QuestaoDAO.findById()" .
            " - Erro: mais de uma questão encontrada.");
    }

    //Método para inserir uma Questao
    public function insert(Questao $questao)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO questao ( descricaoQ, grauDificuldade, pontuacao, imagem)" .
            " VALUES (:descricaoQ, :grauDificuldade, :pontuacao, :imagem)";

        $stm = $conn->prepare($sql);
        $stm->bindValue("descricaoQ", $questao->getDescricaoQ());
        $stm->bindValue("grauDificuldade", $questao->getGrauDificuldade());
        $stm->bindValue("pontuacao", $questao->getPontuacao());
        $stm->bindValue("imagem", $questao->getImagem());

        $stm->execute();
        return $conn->lastInsertId();
    }


    //Método para buscar todas as Questoes no banco de dados
    public function findAll()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM questao";

        $stm = $conn->prepare($sql);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapQuestoes($result);
    }

    public function update(Questao $questao)
    {
        $conn = Connection::getConn();

        $sql = "UPDATE questao SET descricaoQ = :descricao, grauDificuldade = :grau, " .
            "pontuacao = :pontuacao, imagem = :imagem WHERE idQuestao = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("descricao", $questao->getDescricaoQ());
        $stm->bindValue("grau", $questao->getGrauDificuldade());
        $stm->bindValue("pontuacao", $questao->getPontuacao());
        $stm->bindValue("imagem", $questao->getImagem());
        $stm->bindValue("id", $questao->getIdQuestao());
        $stm->execute();
    }

    // Método para excluir uma Alternativa pelo seu ID
    public function deleteAlternativasByQuestaoId(int $id)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM alternativa WHERE idQuestao = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }




    // Método para excluir uma Questao pelo seu ID
    public function deleteById(int $id)
    {
        $this->deleteAlternativasByQuestaoId($id);
        $conn = Connection::getConn();

        $sql = "DELETE FROM questao WHERE idQuestao = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }


    
    public function deleteImage(string $img_del)
    {

        $path =__DIR__ . "/../../arquivos/$img_del";

        if (file_exists($path)) {
            unlink($path);
        }
    }
    // Método para converter um registro da base de dados em um objeto Questao
    private function mapQuestoes($result)
    {
        $questoes = array();
        foreach ($result as $reg) {
            $questao = new Questao();
            $questao->setIdQuestao($reg['idQuestao']);
            $questao->setDescricaoQ($reg['descricaoQ']);
            $questao->setGrauDificuldade($reg['grauDificuldade']);
            $questao->setPontuacao($reg['pontuacao']);
            $questao->setImagem($reg['imagem']);

            array_push($questoes, $questao);
        }

        return $questoes;
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

