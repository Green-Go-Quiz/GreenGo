<?php
class PartidaQuiz
{
    private $idPartidaQuiz;
    private $idPartida;
    private $idQuiz;

    private $partida;
    private $quiz;
    private $zonas;

    public function getIdPartidaQuiz()
    {
        return $this->idPartidaQuiz;
    }

    public function setIdPartidaQuiz($idPartidaQuiz)
    {
        $this->idPartidaQuiz = $idPartidaQuiz;
    }

    public function getIdPartida()
    {
        return $this->idPartida;
    }

    public function setIdPartida($idPartida)
    {
        $this->idPartida = $idPartida;
    }

    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;
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
     * Get the value of partida
     */
    public function getPartida()
    {
        return $this->partida;
    }

    /**
     * Set the value of partida
     *
     * @return  self
     */
    public function setPartida($partida)
    {
        $this->partida = $partida;

        return $this;
    }

    /**
     * Get the value of alternativas
     */
    public function getZonas()
    {
        return $this->zonas;
    }

    /**
     * Set the value of alternativas
     *
     * @return  self
     */
    public function setZonas($zonas)
    {
        $this->zonas = $zonas;

        return $this;
    }
}
