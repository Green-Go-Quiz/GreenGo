<?php

require_once(__DIR__ . "/../model/Quiz.php");

class QuizService
{

    /* Método para validar os dados de um quiz */
    public function validarQuiz(Quiz $quiz)
    {
        $erros = array();

        // Validar campos obrigatórios
        if (!$quiz->getMaximoPergunta())
            array_push($erros, "O campo [Máximo de perguntas] é obrigatório.");

        if (!$quiz->getNome())
            array_push($erros, "O campo [Nome do quiz] é obrigatório.");

        if ($quiz->getComTempo() && !$quiz->getQuantTempo())
            array_push($erros, "O campo [Quantidade de tempo] é obrigatório quando 'Com tempo' é marcado.");


        return $erros;
    }
}
