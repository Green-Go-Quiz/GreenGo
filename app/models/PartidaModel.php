<?php

class Partida
{

    private $IdPartida;
    private $IdADM;
    private $DataInicio;
    private $DataFim;
    private $LimiteJogadores;
    private $Zonas;
    private $Equipes;
    private $Senha;
    private $TempoPartida;
    private $NomePartida;
    private $StatusPartida;
    private $PontuacaoEquipe;
    private $PontuacaoUsuario;



    public function __toString()
    {
        return $this->DataInicio;
        return $this->DataFim;
    }
    /**
     * Get the value of IdPartida
     */
    public function getIdPartida()
    {
        return $this->IdPartida;
    }

    /**
     * Set the value of IdPartida
     *
     * @return  self
     */
    public function setIdPartida($IdPartida)
    {
        $this->IdPartida = $IdPartida;

        return $this;
    }

    /**
     * Get the value of DataInicio
     */
    public function getDataInicio()
    {
        return $this->DataInicio;
    }

    /**
     * Set the value of DataInicio
     *
     * @return  self
     */
    public function setDataInicio($DataInicio)
    {
        $this->DataInicio = $DataInicio;

        return $this;
    }

    /**
     * Get the value of DataFim
     */
    public function getDataFim()
    {
        return $this->DataFim;
    }

    /**
     * Set the value of DataFim
     *
     * @return  self
     */
    public function setDataFim($DataFim)
    {
        $this->DataFim = $DataFim;

        return $this;
    }

    /**
     * Get the value of LimiteJogadores
     */
    public function getLimiteJogadores()
    {
        return $this->LimiteJogadores;
    }

    /**
     * Set the value of LimiteJogadores
     *
     * @return  self
     */
    public function setLimiteJogadores($LimiteJogadores)
    {
        $this->LimiteJogadores = $LimiteJogadores;

        return $this;
    }

    /**
     * Get the value of Zonas
     */
    public function getZonas()
    {
        return $this->Zonas;
    }

    public function getZonasTexto()
    {
        $str = "";
        if ($this->Zonas !== null) {
            foreach ($this->Zonas as $zona) {
                $str .= $zona->getNomeZona() . "\n";
            }
        }

        $str = trim($str);
        return str_replace("\n", "<br>", $str);
    }

    /**
     * Set the value of Zonas
     *
     * @return  self
     */
    public function setZonas($Zonas)
    {
        $this->Zonas = $Zonas;

        return $this;
    }

    /**
     * Get the value of Equipes
     */
    public function getEquipes()
    {
        return $this->Equipes;
    }

    /**
     * Set the value of Equipes
     *
     * @return  self
     */
    public function setEquipes($Equipes)
    {
        $this->Equipes = $Equipes;

        return $this;
    }

    /**
     * Get the value of PontuacaoEquipe
     */
    public function getPontuacaoEquipe()
    {
        return $this->PontuacaoEquipe;
    }

    /**
     * Set the value of PontuacaoEquipe
     *
     * @return  self
     */
    public function setPontuacaoEquipe($PontuacaoEquipe)
    {
        $this->PontuacaoEquipe = $PontuacaoEquipe;

        return $this;
    }

    /**
     * Get the value of PontuacaoUsuario
     */
    public function getPontuacaoUsuario()
    {
        return $this->PontuacaoUsuario;
    }

    /**
     * Set the value of PontuacaoUsuario
     *
     * @return  self
     */
    public function setPontuacaoUsuario($PontuacaoUsuario)
    {
        $this->PontuacaoUsuario = $PontuacaoUsuario;

        return $this;
    }

    /**
     * Get the value of Senha
     */
    public function getSenha()
    {
        return $this->Senha;
    }

    /**
     * Set the value of Senha
     *
     * @return  self
     */
    public function setSenha($Senha)
    {
        $this->Senha = $Senha;

        return $this;
    }

    /**
     * Get the value of TempoPartida
     */
    public function getTempoPartida()
    {
        return $this->TempoPartida;
    }

    /**
     * Set the value of TempoPartida
     *
     * @return  self
     */
    public function setTempoPartida($TempoPartida)
    {
        $this->TempoPartida = $TempoPartida;

        return $this;
    }

    /**
     * Get the value of NomePartida
     */
    public function getNomePartida()
    {
        return $this->NomePartida;
    }

    /**
     * Set the value of NomePartida
     *
     * @return  self
     */
    public function setNomePartida($NomePartida)
    {
        $this->NomePartida = $NomePartida;

        return $this;
    }

    /**
     * Get the value of StatusPartida
     */
    public function getStatusPartida()
    {
        return $this->StatusPartida;
    }

    /**
     * Set the value of StatusPartida
     *
     * @return  self
     */
    public function setStatusPartida($StatusPartida)
    {
        $this->StatusPartida = $StatusPartida;

        return $this;
    }

    /**
     * Get the value of IdADM
     */
    public function getIdADM()
    {
        return $this->IdADM;
    }

    /**
     * Set the value of IdADM
     *
     * @return  self
     */
    public function setIdADM($IdADM)
    {
        $this->IdADM = $IdADM;

        return $this;
    }
}
