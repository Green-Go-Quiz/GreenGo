<?php
#Nome do arquivo: Quiz.php
#Objetivo: classe Model para Quiz

class Quiz
{

    private $id;
    private $maximoPergunta;
    private $nome;
    private $comTempo;
    private $quantTempo;
    private $questao;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

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
     * Get the value of questao
     */
    public function getQuestao()
    {
        return $this->questao;
    }

    /**
     * Set the value of questao
     *
     * @return self
     */
    public function setQuestao($questao)
    {
        $this->questao = $questao;

        return $this;
    }
}
