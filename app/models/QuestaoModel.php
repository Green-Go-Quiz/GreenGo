<?php
#Nome do arquivo: Questao.php
#Objetivo: classe Model para Questao

class Questao
{

    private $idQuestao;
    private $descricaoQ;
    private $grauDificuldade;
    private $pontuacao;
    private $imagem;

    private $alternativas; //Campo que armazena um array de objetos Alternativa


    /**
     * Get the value of idPergunta
     */
    public function getIdQuestao()
    {
        return $this->idQuestao;
    }

    public function setIdQuestao($idQuestao)
    {
        $this->idQuestao = $idQuestao;

        return $this;
    }

    /**
     * Get the value of descricaoP
     */
    public function getDescricaoQ()
    {
        return $this->descricaoQ;
    }

    /**
     * Set the value of descricaoP
     *
     * @return  self
     */
    public function setDescricaoQ($descricaoQ)
    {
        $this->descricaoQ = $descricaoQ;

        return $this;
    }

    /**
     * Get the value of grauDificuldade
     */
    public function getGrauDificuldade()
    {
        return $this->grauDificuldade;
    }

    public function getGrauDificuldadeTexto()
    {
        $grau = '';
        if ($this->grauDificuldade == 'facil')
            $grau = 'Fácil';
        elseif ($this->grauDificuldade == 'medio')
            $grau = 'Médio';
        elseif ($this->grauDificuldade == 'dificil')
            $grau = 'Difícil';

        return $grau;
    }

    /**
     * Set the value of grauDificuldade
     *
     * @return  self
     */
    public function setGrauDificuldade($grauDificuldade)
    {
        $this->grauDificuldade = $grauDificuldade;

        return $this;
    }

    /**
     * Get the value of pontuacao
     */
    public function getPontuacao()
    {
        return $this->pontuacao;
    }

    /**
     * Set the value of pontuacao
     *
     * @return  self
     */
    public function setPontuacao($pontuacao)
    {
        $this->pontuacao = $pontuacao;

        return $this;
    }

    /**
     * Get the value of imagem
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get the value of alternativas
     */
    public function getAlternativas()
    {
        return $this->alternativas;
    }

    public function getAlternativasTexto()
    {
        $str = "";
        foreach ($this->alternativas as $alt) {
            $str .= $alt->getDescricaoAlternativa() . "\n";
        }

        $str = trim($str);
        return str_replace("\n", "<br>", $str);
    }

    /**
     * Set the value of alternativas
     *
     * @return  self
     */
    public function setAlternativas($alternativas)
    {
        $this->alternativas = $alternativas;

        return $this;
    }
  

public function getAlternativaCertaTexto()
{
    $alternativas = $this->getAlternativas();
    foreach ($alternativas as $alternativa) {
        if ($alternativa->getAlternativaCerta() == 1) {
            return $alternativa->getDescricaoAlternativa();
        }
    }
    return "Nenhuma alternativa correta definida.";
}

}
