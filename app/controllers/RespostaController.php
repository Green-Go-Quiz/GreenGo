<?php

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/respostaDAO.php");
require_once(__DIR__ . "/../dao/questaoDAO.php");
require_once(__DIR__ . "/../models/PartidaModel.php");

class RespostaController extends Controller
{
    private RespostaDAO $respostaDao;
    private QuestaoDAO $questaoDao;

    private $resposta;

    public function __construct()
    {

        $this->respostaDao = new respostaDAO();
        $this->questaoDao = new QuestaoDAO();
        $this->resposta = new Resposta();

        $this->handleAction();
    }


    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        $respostas = $this->respostaDao->list($this->resposta->getIdResposta());
        $dados["lista"] = $respostas;

        $this->loadView("partidaQuiz/resultadoJOG.php", $dados, $msgErro, $msgSucesso);
    }

    private function findRespostaById()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $resposta = $this->respostaDao->findById($id);
        return $resposta;
    }


    private function findRespostasById()
    {
        $id = 0;
        if (isset($_GET['idResposta'])) {
            $id = $_GET['idResposta'];
        }
        $resposta = $this->respostaDao->findById($id);

        return $resposta;
    }
}

#Criar objeto da classe
$partidaQuizCont = new PartidaQuizController();
