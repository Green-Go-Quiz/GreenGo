<?php

require_once(__DIR__ . "/../models/RespostaUsuarioModel.php");

class RespostaUsuarioService
{

    public function validarRespostaUsuario(RespostaUsuario $respostaUsuario, $questao, $alternativa)
    {
        $erros = array();

        $acertou = $respostaUsuario->getAcertou()->false;

        foreach ($questao as $questao => $respostaUsuario) :
            $resposta = $respostaUsuario->getIdAlternativa();

            if ($resposta == $questao[$alternativa->alternativaCerta()]) :
                $acertou == true;
            endif;
        endforeach;


        $idxResposta = 1;
        foreach ($respostaUsuario as $resp) {
            if (!$resp->getIdAlternativa())
                array_push($erros, "Não esqueça de responder a questão " . $idxResposta . ", ela é obrigatória!");

            $idxResposta++;
        }

        return $acertou;

        return $erros;
    }
}
