<?php

class EquipeUsuario
{
    private $idEquipeUsuario;
    private $idEquipe;
    private $idUsuario;
    private $pontuacaoUsuario;

    private $usuario;

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
     * Get the value of idEquipe
     */
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * Set the value of idEquipe
     *
     * @return  self
     */
    public function setIdEquipe($idEquipe)
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of pontuacaoUsuario
     */
    public function getPontuacaoUsuario()
    {
        return $this->pontuacaoUsuario;
    }

    /**
     * Set the value of pontuacaoUsuario
     *
     * @return  self
     */
    public function setPontuacaoUsuario($pontuacaoUsuario)
    {
        $this->pontuacaoUsuario = $pontuacaoUsuario;

        return $this;
    }


    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
}
