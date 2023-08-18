
<?php
class QuestaoEspecie
{
    private $idQuestaoEspecie;
    private $idEspecie;
    private $idQuestao;

    private $especie;
    private $questao;

    public function getIdQuestaoEspecie()
    {
        return $this->idQuestaoEspecie;
    }

    public function setIdQuestaoEspecie($idQuestaoEspecie)
    {
        $this->idQuestaoEspecie = $idQuestaoEspecie;
        return $this;
    }

    public function getIdEspecie()
    {
        return $this->idEspecie;
    }

    public function setIdEspecie($idEspecie)
    {
        $this->idEspecie = $idEspecie;
        return $this;
    }

    public function getIdQuestao()
    {
        return $this->idQuestao;
    }

    public function setIdQuestao($idQuestao)
    {
        $this->idQuestao = $idQuestao;
        return $this;
    }

    public function getEspecie()
    {
        return $this->especie;
    }

    public function setEspecie($especie)
    {
        $this->especie = $especie;
        return $this;
    }

    public function getQuestao()
    {
        return $this->questao;
    }

    public function setQuestao($questao)
    {
        $this->questao = $questao;
        return $this;
    }
}
