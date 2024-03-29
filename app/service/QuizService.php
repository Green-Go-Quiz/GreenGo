<?php

require_once(__DIR__ . "/../models/QuizModel.php");

class QuizService
{
    /* Método para validar os dados do quiz */
    public function validarQuiz(Quiz $quiz)
    {
        $erros = array();

        // Validar campos vazios
        if (!$quiz->getMaximoPergunta())
            array_push($erros, "O campo [Máximo de Perguntas] é obrigatório.");

        if (!$quiz->getNomeQuiz())
            array_push($erros, "O campo [Nome do Quiz] é obrigatório.");

        if (!$quiz->getIdZona())
            array_push($erros, "O campo [Zona] é obrigatório.");

        if ($quiz->getComTempo() && !$quiz->getQuantTempo())
            array_push($erros, "O campo [Quantidade de Tempo] é obrigatório quando [Com Tempo] é selecionado.");

        else if ($quiz->getComTempo() and ($quiz->getQuantTempo() < 1 ||  $quiz->getQuantTempo() > 100))
            array_push($erros, "O campo [Quantidade de Tempo] deve estar entre 1 e 100.");

        return $erros;
    }

    /* Método para salvar o quiz no banco de dados */
    public function salvarQuiz(Quiz $quiz)
    {
        // Lógica para salvar o quiz no banco de dados
        // ...
    }

    /* Método para buscar um quiz pelo ID */
    public function buscarQuizPorId($idQuiz)
    {
        // Lógica para buscar o quiz no banco de dados pelo ID
        // ...

        // Retornar o objeto Quiz encontrado ou null caso não exista
        return null;
    }

    /* Método para atualizar um quiz */
    public function atualizarQuiz(Quiz $quiz)
    {
        // Lógica para atualizar o quiz no banco de dados
        // ...
    }

    /* Método para excluir um quiz */
    public function excluirQuiz($idQuiz)
    {
        // Lógica para excluir o quiz do banco de dados
        // ...
    }
}
