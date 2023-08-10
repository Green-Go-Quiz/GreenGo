<?php

require_once(__DIR__ . "/../models/QuestaoModel.php");

class QuestaoService
{

    /* Método para atualizar uma questão no banco de dados */
    public function validarQuestao(Questao $questao, $imagem, $alternativas)
    {
        $erros = array();

        //Validar campos obrigatórios
        if (!$questao->getDescricaoQ())
            array_push($erros, "O campo [Descrição] é obrigatório.");

        if (!$questao->getGrauDificuldade())
            array_push($erros, "O campo [Grau de dificuldade] é obrigatório.");

        //if (!$questao->getPontuacao())
            //array_push($erros, "O campo [Pontuação] é obrigatório.");

            if (!$questao->getPontuacao()) {
                array_push($erros, "O campo [Pontuação] é obrigatório.");
            } else {
                $pontuacao = $questao->getPontuacao();
                if ($pontuacao < 1 || $pontuacao > 99) {
                    array_push($erros, "A pontuação deve estar entre 1 e 99.");
                }
            }
        $idxQuestao = 1;
        $possuiCorreta = false;
        foreach ($alternativas as $alt) {
            if (!$alt->getDescricaoAlternativa())
                array_push($erros, "O campo [Alternativa ". $idxQuestao ."] é obrigatório.");

            if($alt->getAlternativaCerta())
                $possuiCorreta = true;

            $idxQuestao++;
         }

         if(! $possuiCorreta)
            array_push($erros, "O campo [Alternativa Correta] é obrigatório.");

            
    
        return $erros;


    }
}
