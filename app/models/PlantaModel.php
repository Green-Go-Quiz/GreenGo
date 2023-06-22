<?php

Class Planta {

    private $IdPlanta;
    private $NomeSocial;
    private $Pontos;
    private $QrCode;
    private $CodNumerico;
    private $Especie;
    private $ImagemPlanta;
    private $zona;
    private $PlantaHistoria;


    public function __toString() {
        return $this->ImagemPlanta;
    }
    /**
     * Get the value of IdPlanta
     */ 
    public function getIdPlanta()
    {
        return $this->IdPlanta;
    }

    /**
     * Set the value of IdPlanta
     *
     * @return  self
     */ 
    public function setIdPlanta($IdPlanta)
    {
        $this->IdPlanta = $IdPlanta;

        return $this;
    }

    /**
     * Get the value of NomeSocial
     */ 
    public function getNomeSocial()
    {
        return $this->NomeSocial;
    }

    /**
     * Set the value of NomeSocial
     *
     * @return  self
     */ 
    public function setNomeSocial($NomeSocial)
    {
        $this->NomeSocial = $NomeSocial;

        return $this;
    }

    /**
     * Get the value of CodNumerico
     */ 
    public function getCodNumerico()
    {
        return $this->CodNumerico;
    }

    /**
     * Set the value of CodNumerico
     *
     * @return  self
     */ 
    public function setCodNumerico($CodNumerico)
    {
        $this->CodNumerico = $CodNumerico;

        return $this;
    }

    /**
     * Get the value of Especie
     */ 
    public function getEspecie()
    {
        return $this->Especie;
    }

    /**
     * Set the value of Especie
     *
     * @return  self
     */ 
    public function setEspecie($Especie)
    {
        $this->Especie = $Especie;

        return $this;
    }

    /**
     * Get the value of zona
     */ 
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set the value of zona
     *
     * @return  self
     */ 
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get the value of PlantaHistoria
     */ 
    public function getPlantaHistoria()
    {
        return $this->PlantaHistoria;
    }

    /**
     * Set the value of PlantaHistoria
     *
     * @return  self
     */ 
    public function setPlantaHistoria($PlantaHistoria)
    {
        $this->PlantaHistoria = $PlantaHistoria;

        return $this;
    }

    /**
     * Get the value of Pontos
     */ 
    public function getPontos()
    {
        return $this->Pontos;
    }

    /**
     * Set the value of Pontos
     *
     * @return  self
     */ 
    public function setPontos($Pontos)
    {
        $this->Pontos = $Pontos;

        return $this;
    }

    /**
     * Get the value of ImagemPlanta
     */ 
    public function getImagemPlanta()
    {
        return $this->ImagemPlanta;
    }

    /**
     * Set the value of ImagemPlanta
     *
     * @return  self
     */ 
    public function setImagemPlanta($ImagemPlanta)
    {
        $this->ImagemPlanta = $ImagemPlanta;

        return $this;
    }

    /**
     * Get the value of QrCode
     */ 
    public function getQrCode()
    {
        return $this->QrCode;
    }

    /**
     * Set the value of QrCode
     *
     * @return  self
     */ 
    public function setQrCode($QrCode)
    {
        $this->QrCode = $QrCode;

        return $this;
    }
}