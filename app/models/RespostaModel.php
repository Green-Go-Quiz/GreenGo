<?php

class Resposta
{
    private $idResposta;
    private $idQuestao;
    private $quantidadeAlt;
    private $respostaCerta;
    private $descricaoR;

    private $resposta;
    private $questao;

    /**
     * Get the value of idResposta
     */
    public function getIdResposta()
    {
        return $this->idResposta;
    }

    /**
     * Set the value of idResposta
     *
     * @return  self
     */
    public function setIdResposta($idResposta)
    {
        $this->idResposta = $idResposta;

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

    /**
     * Get the value of quantidadeAlt
     */
    public function getQuantidadeAlt()
    {
        return $this->quantidadeAlt;
    }

    /**
     * Set the value of quantidadeAlt
     *
     * @return  self
     */
    public function setQuantidadeAlt($quantidadeAlt)
    {
        $this->quantidadeAlt = $quantidadeAlt;

        return $this;
    }

    /**
     * Get the value of respostaCerta
     */
    public function getRespostaCerta()
    {
        return $this->respostaCerta;
    }

    /**
     * Set the value of respostaCerta
     *
     * @return  self
     */
    public function setRespostaCerta($respostaCerta)
    {
        $this->respostaCerta = $respostaCerta;

        return $this;
    }

    /**
     * Get the value of descricaoR
     */
    public function getDescricaoR()
    {
        return $this->descricaoR;
    }

    /**
     * Set the value of descricaoR
     *
     * @return  self
     */
    public function setDescricaoR($descricaoR)
    {
        $this->descricaoR = $descricaoR;

        return $this;
    }

    /**
     * Get the value of Resposta
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * Set the value of Resposta
     *
     * @return  self
     */
    public function setResposta($Resposta)
    {
        $this->resposta = $Resposta;

        return $this;
    }

    /**
     * Get the value of Questao
     */
    public function getQuestao()
    {
        return $this->questao;
    }

    /**
     * Set the value of Questao
     *
     * @return  self
     */
    public function setQuestao($Questao)
    {
        $this->questao = $Questao;

        return $this;
    }
}
