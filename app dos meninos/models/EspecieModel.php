<?php
class Especie {
	private $IdEspecie;
	private $ImagemEspecie;
	private $Descricao;
	private $NomePopular;
	private $NomeCientifico;
	private $Frutifera;
	private $Toxidade;
	private $Exotica;
	private $Raridade;
	private $Medicinal;
	private $Comestivel;
	

	//Construtor da classe
    public function __construct($id="",$nomep="", $nomec="")
    {
        $this->IdEspecie = $id;
        $this->NomePopular = $nomep;
        $this->NomeCientifico = $nomec;
    }

	public function __toString() {
        return $this->NomePopular;
		return $this->NomeCientifico;
    }

	public function getIdEspecie()
	{
		return $this->IdEspecie;
	}

	
	public function setIdEspecie($IdEspecie)
	{
		$this->IdEspecie = $IdEspecie;

		return $this;
	}


	public function getImagemEspecie()
	{
		return $this->ImagemEspecie;
	}


	public function setImagemEspecie($ImagemEspecie)
	{
		$this->ImagemEspecie = $ImagemEspecie;

		return $this;
	}


	public function getDescricao()
	{
		return $this->Descricao;
	}

	public function setDescricao($Descricao)
	{
		$this->Descricao = $Descricao;

		return $this;
	}

	/**
	 * Get the value of NomePopular
	 */ 
	public function getNomePopular()
	{
		return $this->NomePopular;
	}

	/**
	 * Set the value of NomePopular
	 *
	 * @return  self
	 */ 
	public function setNomePopular($NomePopular)
	{
		$this->NomePopular = $NomePopular;

		return $this;
	}

	/**
	 * Get the value of NomeCientifico
	 */ 
	public function getNomeCientifico()
	{
		return $this->NomeCientifico;
	}

	/**
	 * Set the value of NomeCientifico
	 *
	 * @return  self
	 */ 
	public function setNomeCientifico($NomeCientifico)
	{
		$this->NomeCientifico = $NomeCientifico;

		return $this;
	}

	/**
	 * Get the value of Frutifera
	 */ 
	public function getFrutifera()
	{
		return $this->Frutifera;
	}

	/**
	 * Set the value of Frutifera
	 *
	 * @return  self
	 */ 
	public function setFrutifera($Frutifera)
	{
		$this->Frutifera = $Frutifera;

		return $this;
	}

	/**
	 * Get the value of Toxidade
	 */ 
	public function getToxidade()
	{
		return $this->Toxidade;
	}

	/**
	 * Set the value of Toxidade
	 *
	 * @return  self
	 */ 
	public function setToxidade($Toxidade)
	{
		$this->Toxidade = $Toxidade;

		return $this;
	}

	/**
	 * Get the value of Exotica
	 */ 
	public function getExotica()
	{
		return $this->Exotica;
	}

	/**
	 * Set the value of Exotica
	 *
	 * @return  self
	 */ 
	public function setExotica($Exotica)
	{
		$this->Exotica = $Exotica;

		return $this;
	}

	/**
	 * Get the value of Raridade
	 */ 
	public function getRaridade()
	{
		return $this->Raridade;
	}

	/**
	 * Set the value of Raridade
	 *
	 * @return  self
	 */ 
	public function setRaridade($Raridade)
	{
		$this->Raridade = $Raridade;

		return $this;
	}

	/**
	 * Get the value of Medicinal
	 */ 
	public function getMedicinal()
	{
		return $this->Medicinal;
	}

	/**
	 * Set the value of Medicinal
	 *
	 * @return  self
	 */ 
	public function setMedicinal($Medicinal)
	{
		$this->Medicinal = $Medicinal;

		return $this;
	}

	/**
	 * Get the value of Comestivel
	 */ 
	public function getComestivel()
	{
		return $this->Comestivel;
	}

	/**
	 * Set the value of Comestivel
	 *
	 * @return  self
	 */ 
	public function setComestivel($Comestivel)
	{
		$this->Comestivel = $Comestivel;

		return $this;
	}
}