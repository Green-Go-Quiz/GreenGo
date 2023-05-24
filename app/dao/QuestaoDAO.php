<?php
#Nome do arquivo: QuestaoDAO.php
#Objetivo: classe DAO para o model de Questao

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Questao.php");

class QuestaoDAO
{

    //Método para listar as questões a partir da base de dados
    public function list()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM questao ORDER BY idQuestao";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapQuestoes($result);
    }

    //Método para buscar uma questão por seu ID
    public function findById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM questao WHERE idpergunta = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

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

        $sql = "INSERT INTO questao (idQuestao, descricaoQ, grauDifilculdade, pontuacao, imagem)" .
            " VALUES (:id, :descricao, :grau, :pontuacao, :imagem)";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $questao->getIdQuestao());
        $stm->bindValue("descricao", $questao->getDescricaoQ());
        $stm->bindValue("grau", $questao->getGrauDificuldade());
        $stm->bindValue("pontuacao", $questao->getPontuacao());
        $stm->bindValue("imagem", $questao->getImagem());
        $stm->execute();
    }

    //Método para atualizar uma Questao
    public function update(Questao $questao)
    {
        $conn = Connection::getConn();

        $sql = "UPDATE questao SET descricaoQ = :descricaoQ, grauDifilculdade = :grau," .
            " pontuacao = :pontuacao, imagem = :imagem" .
            " WHERE idpergunta = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("descricaoQ", $questao->getDescricaoQ());
        $stm->bindValue("grau", $questao->getGrauDificuldade());
        $stm->bindValue("pontuacao", $questao->getPontuacao());
        $stm->bindValue("imagem", $questao->getImagem());
        $stm->bindValue("id", $questao->getIdQuestao());
        $stm->execute();
    }

    //Método para excluir uma Questão pelo seu ID
    public function deleteById(int $id)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM questao WHERE idpergunta = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Questao
    private function mapQuestoes($result)
    {
        $questoes = array();
        foreach ($result as $reg) {
            $questao = new Questao();
            $questao->setIdQuestao($reg['idQuestao']);
            $questao->setDescricaoQ($reg['descricaoQ']);
            $questao->setGrauDificuldade($reg['grauDifilculdade']);
            $questao->setPontuacao($reg['pontuacao']);
            $questao->setImagem($reg['imagem']);
            array_push($questoes, $questao);
        }

        return $questoes;
    }
}
