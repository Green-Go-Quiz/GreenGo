<?php

require_once(__DIR__ . "/../models/RespostaUsuarioModel.php");

class RespostaUsuarioService
{

    public function validarRespostaPreenchida(array $respostas, array $questoes)
    {
        $erros = array();

        foreach ($questoes as $idx => $q) {
            if (!isset($respostas[$q->getIdQuestao()]))
                array_push($erros, "Não esqueça de responder a Pergunta " . $idx + 1 . ", ela é obrigatória!");
        }

        return $erros;
    }


    public function validarRespostaUsuario(RespostaUsuario $respostaUsuario, $questao, $alternativa)
    {
        $erros = array();

        $acertou = false;

        foreach ($questao as $questao => $respostaUsuario) :
            $resposta = $respostaUsuario->getIdAlternativa();

            if ($resposta == $questao[$alternativa->alternativaCerta()]) :
                $acertou == true;
            endif;
        endforeach;


        $idxResposta = 1;
        foreach ($respostaUsuario as $resp) {
            if (!$resp->getIdAlternativa())
                array_push($erros, "Não esqueça de responder a Pergunta " . $idxResposta . ", ela é obrigatória!");

            $idxResposta++;
        }

        return $acertou;

        return $erros;
    }
}
