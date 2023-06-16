<?php
#Arquivo com a declaração da classe Stand

class Zona {

    private $IdZona;
    private $NomeZona;
    private $QntdPlanta;
    private $PontosTotais;

    //Construtor da classe
    public function __construct($id="",$nome="", $qntP="", $pontosT=0)
    {
        $this->IdZona = $id;
        $this->NomeZona = $nome;
        $this->QntdPlanta = $qntP;
        $this->PontosTotais = $pontosT;
    }
    
    public function __toString() {
        return $this->NomeZona;
    }
    /**
     * Get the value of IdZona
     */ 
    public function getIdZona()
    {
        return $this->IdZona;
    }

    /**
     * Set the value of IdZona
     *
     * @return  self
     */ 
    public function setIdZona($IdZona)
    {
        $this->IdZona = $IdZona;

        return $this;
    }

    /**
     * Get the value of QntdPlanta
     */ 
    public function getQntdPlanta()
    {
        return $this->QntdPlanta;
    }

    /**
     * Set the value of QntdPlanta
     *
     * @return  self
     */ 
    public function setQntdPlanta($QntdPlanta)
    {
        $this->QntdPlanta = $QntdPlanta;

        return $this;
    }

    /**
     * Get the value of NomeZona
     */ 
    public function getNomeZona()
    {
        return $this->NomeZona;
    }

    /**
     * Set the value of NomeZona
     *
     * @return  self
     */ 
    public function setNomeZona($NomeZona)
    {
        $this->NomeZona = $NomeZona;

        return $this;
    }

    /**
     * Get the value of PontosTotais
     */ 
    public function getPontosTotais()
    {
        return $this->PontosTotais;
    }

    /**
     * Set the value of PontosTotais
     *
     * @return  self
     */ 
    public function setPontosTotais($PontosTotais)
    {
        $this->PontosTotais = $PontosTotais;

        return $this;
    }
    }
    /**
     * Get the value of idStand
     */ 
   

?>