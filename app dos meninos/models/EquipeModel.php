<?php 

Class Equipe {

    private $idEquipe;
    private $nomeEquipe;
    private $codEntrada;
    private $corEquipe;
    private $iconeEquipe;

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
     * Get the value of nomeEquipe
     */ 
    public function getNomeEquipe()
    {
        return $this->nomeEquipe;
    }

    /**
     * Set the value of nomeEquipe
     *
     * @return  self
     */ 
    public function setNomeEquipe($nomeEquipe)
    {
        $this->nomeEquipe = $nomeEquipe;

        return $this;
    }

    /**
     * Get the value of codEntrada
     */ 
    public function getCodEntrada()
    {
        return $this->codEntrada;
    }

    /**
     * Set the value of codEntrada
     *
     * @return  self
     */ 
    public function setCodEntrada($codEntrada)
    {
        $this->codEntrada = $codEntrada;

        return $this;
    }

    /**
     * Get the value of corEquipe
     */ 
    public function getCorEquipe()
    {
        return $this->corEquipe;
    }

    /**
     * Set the value of corEquipe
     *
     * @return  self
     */ 
    public function setCorEquipe($corEquipe)
    {
        $this->corEquipe = $corEquipe;

        return $this;
    }

    /**
     * Get the value of iconeEquipe
     */ 
    public function getIconeEquipe()
    {
        return $this->iconeEquipe;
    }

    /**
     * Set the value of iconeEquipe
     *
     * @return  self
     */ 
    public function setIconeEquipe($iconeEquipe)
    {
        $this->iconeEquipe = $iconeEquipe;

        return $this;
    }
}