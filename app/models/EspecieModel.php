<?php
class Especie
{
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

	public function getNomePopular()
	{
		return $this->NomePopular;
	}

	public function setNomePopular($NomePopular)
	{
		$this->NomePopular = $NomePopular;
		return $this;
	}

	public function getNomeCientifico()
	{
		return $this->NomeCientifico;
	}

	public function setNomeCientifico($NomeCientifico)
	{
		$this->NomeCientifico = $NomeCientifico;
		return $this;
	}

	public function getFrutifera()
	{
		return $this->Frutifera;
	}

	public function setFrutifera($Frutifera)
	{
		$this->Frutifera = $Frutifera;
		return $this;
	}

	public function getToxidade()
	{
		return $this->Toxidade;
	}

	public function setToxidade($Toxidade)
	{
		$this->Toxidade = $Toxidade;
		return $this;
	}

	public function getExotica()
	{
		return $this->Exotica;
	}

	public function setExotica($Exotica)
	{
		$this->Exotica = $Exotica;
		return $this;
	}

	public function getRaridade()
	{
		return $this->Raridade;
	}

	public function setRaridade($Raridade)
	{
		$this->Raridade = $Raridade;
		return $this;
	}

	public function getMedicinal()
	{
		return $this->Medicinal;
	}

	public function setMedicinal($Medicinal)
	{
		$this->Medicinal = $Medicinal;
		return $this;
	}

	public function getComestivel()
	{
		return $this->Comestivel;
	}

	public function setComestivel($Comestivel)
	{
		$this->Comestivel = $Comestivel;
		return $this;
	}
}
