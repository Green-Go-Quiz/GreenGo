<?php

class RespostaUsuario
{
    private $idRespostaUsuario;
    private $idResposta;
    private $idUsuario;
    private $acertou;

    private $resposta;
    private $usuario;

    public function getIdRespostaUsuario()
    {
        return $this->idRespostaUsuario;
    }

    public function getIdResposta()
    {
        return $this->idResposta;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getAcertou()
    {
        return $this->acertou;
    }

    // Métodos Setters
    public function setIdRespostaUsuario($idRespostaUsuario)
    {
        $this->idRespostaUsuario = $idRespostaUsuario;
    }

    public function setIdResposta($idResposta)
    {
        $this->idResposta = $idResposta;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setAcertou($acertou)
    {
        $this->acertou = $acertou;
    }

    /**
     * Get the value of resposta
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * Set the value of resposta
     *
     * @return  self
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;

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
