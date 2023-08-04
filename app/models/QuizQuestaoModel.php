<?php
# Nome do arquivo: QuizQuestao.php
# Objetivo: classe Model para QuizQuestao

class QuizQuestao
{
    private $idQuizQuestao;
    private $idQuiz;
    private $idQuestao;

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
}
