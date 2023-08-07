<?php
# Nome do arquivo: QuizQuestao.php
# Objetivo: classe Model para QuizQuestao

class QuizQuestao
{
    private $idQuizQuestao;
    private $idQuiz;
    private $idQuestao;

    private $quiz;
    private $questao;


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
     * Get the value of idQuizQuestao
     */
    public function getIdQuizQuestao()
    {
        return $this->idQuizQuestao;
    }

    /**
     * Set the value of idQuizQuestao
     *
     * @return  self
     */
    public function setIdQuizQuestao($idQuizQuestao)
    {
        $this->idQuizQuestao = $idQuizQuestao;

        return $this;
    }

    /**
     * Get the value of quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Set the value of quiz
     *
     * @return  self
     */
    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;

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
     * @return  self
     */
    public function setQuestao($questao)
    {
        $this->questao = $questao;

        return $this;
    }
}
