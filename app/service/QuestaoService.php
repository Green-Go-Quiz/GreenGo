<?php

require_once(__DIR__ . "/../model/Questao.php");

class QuestaoService
{

    /* Método para atualizar uma questão no banco de dados */
    public function validarQuestao(Questao $questao)
    {
        $erros = array();

        //Validar campos obrigatórios
        if (!$questao->getDescricaoQ())
            array_push($erros, "O campo [Descrição] é obrigatório.");

        if (!$questao->getGrauDificuldade())
            array_push($erros, "O campo [Grau de dificuldade] é obrigatório.");

        if (!$questao->getPontuacao())
            array_push($erros, "O campo [Pontuação] é obrigatório.");

  //if (!$questao->getcampos_Alternativa())
           // array_push($erros, "O campo [alternativa] é obrigatório."); 
        
            return $erros;


        //Deve ser utilizado o Dao nessa circunstância? Ele teria o papel de fazer a atualização dos dados no banco de dados,
        //retornando um método true

    }
}
