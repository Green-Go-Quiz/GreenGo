<?php

class Quiz
{
    // Propriedades da tabela "quiz"
    private $idQuiz;
    private $maximoPergunta;
    private $nomeQuiz;
    private $comTempo;
    private $quantTempo;
    private $questoes; // Array para armazenar as questões relacionadas
    private $idZona;

    // Propriedade relacionada com a tabela "zona"
    //private $zona;

    // Métodos getter e setter para cada propriedade

    public function addQuestao(Questao $questao)
    {
        $this->questoes[] = $questao;
    }

    public function getQuestoes()
    {
        return $this->questoes;
    }

    /**
     * Get the value of idQuiz
     */
    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    /**
     * Set the value of idQuiz
     *
     * @return self
     */
    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;

        return $this;
    }

    /**
     * Get the value of maximoPergunta
     */
    public function getMaximoPergunta()
    {
        return $this->maximoPergunta;
    }

    /**
     * Set the value of maximoPergunta
     *
     * @return self
     */
    public function setMaximoPergunta($maximoPergunta)
    {
        $this->maximoPergunta = $maximoPergunta;

        return $this;
    }

    /**
     * Get the value of nomeQuiz
     */
    public function getNomeQuiz()
    {
        return $this->nomeQuiz;
    }

    /**
     * Set the value of nomeQuiz
     *
     * @return self
     */
    public function setNomeQuiz($nomeQuiz)
    {
        $this->nomeQuiz = $nomeQuiz;

        return $this;
    }

    /**
     * Get the value of comTempo
     */
    public function getComTempo()
    {
        return $this->comTempo;
    }

    /**
     * Set the value of comTempo
     *
     * @return self
     */
    public function setComTempo($comTempo)
    {
        $this->comTempo = $comTempo;

        return $this;
    }

    /**
     * Get the value of quantTempo
     */
    public function getQuantTempo()
    {
        return $this->quantTempo;
    }

    /**
     * Set the value of quantTempo
     *
     * @return self
     */
    public function setQuantTempo($quantTempo)
    {
        $this->quantTempo = $quantTempo;

        return $this;
    }

    /**
     * Get the value of zona
     
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set the value of zona
     *
     *
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }
     */

    /**
     * Get the value of idZona
     */
    public function getIdZona()
    {
        return $this->idZona;
    }

    /**
     * Set the value of idZona
     *
     * @return  self
     */
    public function setIdZona($idZona)
    {
        $this->idZona = $idZona;

        return $this;
    }
}
