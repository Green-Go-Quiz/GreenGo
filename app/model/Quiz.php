<?php
#Nome do arquivo: Quiz.php
#Objetivo: classe Model para Quiz

class Quiz
{

    private $idQuiz;
    private $maximoPergunta;
    private $nomeQuiz;
    private $comTempo;
    private $quantTempo;
    private $idQuestao;



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
     * Get the value of idQuiz
     */
    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    /**
     * Set the value of idQuiz
     *
     * @return  self
     */
    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;

        return $this;
    }

    /**
     * Get the value of idQuestao
     */
    public function getIdQuestao()
    {
        return $this->idQuestao;
    }

    /**
     * Set the value of idQuestao
     *
     * @return  self
     */
    public function setIdQuestao($idQuestao)
    {
        $this->idQuestao = $idQuestao;

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
     * @return  self
     */
    public function setNomeQuiz($nomeQuiz)
    {
        $this->nomeQuiz = $nomeQuiz;

        return $this;
    }
}
