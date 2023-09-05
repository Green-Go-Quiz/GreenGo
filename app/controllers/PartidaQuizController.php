<?php
# Classe controller para QuizQuestao

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/QuizQuestaoDAO.php");
require_once(__DIR__ . "/../dao/PartidaQuizDAO.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../dao/PartidaDAO.php");
require_once(__DIR__ . "/../models/PartidaQuizModel.php");
require_once(__DIR__ . "/../models/QuizModel.php");
require_once(__DIR__ . "/../models/PartidaModel.php");


class PartidaQuizController extends Controller
{
    private PartidaQuizDAO $partidaQuizDao;
    private PartidaDAO $partidaDao;
    private QuizDAO $quizDao;
    private PartidaQuiz $partidaQuiz; // Adicione esta linha


    public function __construct()
    {
        print_r("oiii");

        $this->partidaQuizDao = new PartidaQuizDAO();
        $this->quizDao = new QuizDAO();
        $this->partidaDao = new PartidaDAO();
        $this->partidaQuiz = new PartidaQuiz();
        print_r($this->partidaDao);

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        print_r("HELPPPPPPP");
        $partidaQuizzes = $this->partidaQuizDao->listByPartida($this->partidaQuiz->getIdPartida());
        $dados["lista"] = $partidaQuizzes;

        $this->loadView("partidaQuiz/form.php", $dados, $msgErro, $msgSucesso);
    }



    protected function create()
    {
        $partida = $this->findPartidaById();
        print_r("HELPPPPPPP");

        if ($partida) {
            $dados["partida"] = $partida;
            print_r($dados);

            $dados["listaQuizzes"] = $this->quizDao->list();
            $dados["listaPartidasQuiz"] = $this->partidaQuizDao->listByPartida($partida->getIdQuiz());

            $this->loadView("partidaQuiz/form.php", $dados);
        }
    }

    private function findPartidaById()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $quiz = $this->quizDao->findById($id);
        return $quiz;
    }

    private function findPartidaQuizzesById()
    {
        $id = 0;
        if (isset($_GET['idPartidaQuiz'])) {
            $id = $_GET['idPartidaQuiz'];
        }
        $partidaQuiz = $this->partidaQuizDao->findById($id);

        return $partidaQuiz;
    }

    public function add()
    {
        $idPartida = isset($_GET['idPartida']) ? $_GET['idPartida'] : 0;
        $idQuiz = isset($_GET['idQuiz']) ? $_GET['idQuiz'] : 0;

        $erros = array();

        $partida = $this->partidaDao->findById($idPartida);
        if (!$partida) {
            array_push($erros, "Partida não encontrada no banco de dados.");
        }

        $quiz = $this->quizDao->findById($idQuiz);
        if (!$quiz) {
            array_push($erros, "Quiz não encontrado no banco de dados.");
        }

        $partidaQuiz = $this->partidaQuizDao->findByIdPartidaQuiz($idPartida, $idQuiz);
        if ($partidaQuiz) {
            array_push($erros, "O quiz já existe nesta partida.");
        }
        if (!$erros) {

            try {
                $this->partidaQuizDao->insertPartidaQuiz($idPartida, $idQuiz);
            } catch (PDOException $e) {
                //print_r($e);
                $erros = ["Erro ao salvar a associação Partida-Quiz na base de dados." . $e->getMessage()];
            }
        }

        $partida = $this->partidaDao->findById($idPartida);
        $dados["partida"] = $partida;
        $dados["listaQuizzes"] = $this->quizDao->list();
        $dados["listaPartidasQuiz"] = $this->partidaQuizDao->listByPartida($quiz->getIdPartida());

        $msgsErro = $erros ? implode("<br>", $erros) : "";

        $msgSucesso = "";
        if (!$msgsErro)
            $msgSucesso = 'Quiz adicionado à Partida com sucesso.';

        $this->loadView("partidaQuiz/form.php", $dados, $msgsErro, $msgSucesso);
    }

    public function delete()
    {
        $this->partidaQuiz = $this->findPartidaQuizzesById();
        $msg = "";


        if (!$msg) {

            try {
                $this->partidaQuizDao->deleteById($this->partidaQuiz->getIdPartidaQuiz());
            } catch (PDOException $e) {
                //print_r($e);
                $msg = ["Erro ao salvar a associação Partida-Quiz na base de dados." . $e->getMessage()];
            }
        }

        //$this->list("", $msg);
        header('location: PartidaQuizController.php?action=create&id=' .  $this->partidaQuiz->getIdPartida());
    }
}

#Criar objeto da classe
$partidaQuizCont = new PartidaQuizController();
