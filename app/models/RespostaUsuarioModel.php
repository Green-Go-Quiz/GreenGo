<?php

class RespostaUsuario
{
    private $idRespostaUsuario;
    private $idQuestao;
    private $idAlternativa;
    private $idEquipeUsuario;
    private $acertou;

    private $questao;
    private $equipeUsuario;


    /**
     * Get the value of idRespostaUsuario
     */
    public function getIdRespostaUsuario()
    {
        return $this->idRespostaUsuario;
    }

    /**
     * Set the value of idRespostaUsuario
     *
     * @return  self
     */
    public function setIdRespostaUsuario($idRespostaUsuario)
    {
        $this->idRespostaUsuario = $idRespostaUsuario;

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
     * Get the value of idEquipeUsuario
     */
    public function getIdEquipeUsuario()
    {
        return $this->idEquipeUsuario;
    }

    /**
     * Set the value of idEquipeUsuario
     *
     * @return  self
     */
    public function setIdEquipeUsuario($idEquipeUsuario)
    {
        $this->idEquipeUsuario = $idEquipeUsuario;

        return $this;
    }

    /**
     * Get the value of acertou
     */
    public function getAcertou()
    {
        return $this->acertou;
    }

    /**
     * Set the value of acertou
     *
     * @return  self
     */
    public function setAcertou($acertou)
    {
        $this->acertou = $acertou;

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
     * Get the value of equipeUsuario
     */
    public function getEquipeUsuario()
    {
        return $this->equipeUsuario;
    }

    /**
     * Set the value of equipeUsuario
     *
     * @return  self
     */
    public function setEquipeUsuario($equipeUsuario)
    {
        $this->equipeUsuario = $equipeUsuario;

        return $this;
    }
}
