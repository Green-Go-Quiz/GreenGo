<?php
#Nome do arquivo: Alternativa.php
#Objetivo: classe Model para Alternativa

class Alternativa
{
    private $idAlternativa;
    private $descricaoAlternativa;
    private $alternativaCerta;
    private $idQuestao;
    private $questao;

    // Getters e Setters
    /**
     * Get the value of idAlternativa
     */
    public function getIdAlternativa()
    {
        return $this->idAlternativa;
    }

    /**
     * Set the value of idAlternativa
     *
     * @return  self
     */
    public function setIdAlternativa($idAlternativa)
    {
        $this->idAlternativa = $idAlternativa;

        return $this;
    }

    /**
     * Get the value of descricaoAlternativa
     */
    public function getDescricaoAlternativa()
    {
        return $this->descricaoAlternativa;
    }

    /**
     * Set the value of descricaoAlternativa
     *
     * @return  self
     */
    public function setDescricaoAlternativa($descricaoAlternativa)
    {
        $this->descricaoAlternativa = $descricaoAlternativa;

        return $this;
    }

    /**
     * Get the value of alternativaCerta
     */
    public function getAlternativaCerta()
    {
        return $this->alternativaCerta;
    }

    /**
     * Set the value of alternativaCerta
     *
     * @return  self
     */
    public function setAlternativaCerta($alternativaCerta)
    {
        $this->alternativaCerta = $alternativaCerta;

        return $this;
    }

    /**
     * Get the value of questao
     */
    public function getQuestao()
    {
        return $this->questao;
    }

    /**
     * Set the value of questao
     *
     * @return  self
     */
    public function setQuestao($questao)
    {
        $this->questao = $questao;

        return $this;
    }

    /**
     * Get the value of idQuestao
     */
    public function getIdQuestao()
    {
        return $this->idQuestao;
    }

    /**
     * Set the value of idQuestao
     *
     * @return  self
     */
    public function setIdQuestao($idQuestao)
    {
        $this->idQuestao = $idQuestao;

        return $this;
    }
}
