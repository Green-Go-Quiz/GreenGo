<?php
# Classe controller para QuizQuestao
session_start();
if (!isset($_SESSION["tempo"])) {
    $_SESSION["tempo"] = 0;
}
require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/QuizQuestaoDAO.php");
require_once(__DIR__ . "/../dao/PartidaQuizDAO.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../dao/ZonaDAO.php");
require_once(__DIR__ . "/../dao/PartidaDAO.php");
require_once(__DIR__ . "/../models/PartidaQuizModel.php");
require_once(__DIR__ . "/../models/QuizModel.php");
require_once(__DIR__ . "/../models/PartidaModel.php");

class PartidaQuizController extends Controller
{

    private $tempoPartida = 0; // Variável para rastrear o tempo restante da partida
    private $partida;

    private PartidaQuizDAO $partidaQuizDao;
    private PartidaDAO $partidaDao;
    private QuizDAO $quizDao;
    private ZonaDAO $zonaDao;

    private PartidaQuiz $partidaQuiz; // Adicione esta linha


    public function __construct()
    {

        $this->partidaQuizDao = new PartidaQuizDAO();
        $this->quizDao = new QuizDAO();
        $this->partidaDao = new PartidaDAO();
        $this->zonaDao = new ZonaDAO();
        $this->partidaQuiz = new PartidaQuiz();
        $this->partida = new Partida();
        $this->tempoPartida = $this->partida->getTempoPartida();

        $this->handleAction();
    }


    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        $partidaQuizzes = $this->partidaQuizDao->list($this->partidaQuiz->getIdPartida());
        $dados["lista"] = $partidaQuizzes;

        $this->loadView("partidaQuiz/form.php", $dados, $msgErro, $msgSucesso);
    }

    protected function listar(string $msgErro = "", string $msgSucesso = "")
    {
        $partidaQuizzes = $this->partidaQuizDao->list();
        $dados["listaPartidasQuiz"] = $partidaQuizzes;



        $this->loadView("partidaQuiz/listJOG.php", $dados, $msgErro, $msgSucesso);
    }


    protected function create()
    {
        $partida = $this->findPartidaById();

        if ($partida) {
            $listaZona = $this->zonaDao->listByPartida($partida->getIdPartida());
            $partida->setZonas($listaZona);

            $dados["partida"] = $partida;
            //$zona = $this->findZonaById();
            //$dados["zona"] = $zona;
            //$dados["listaQuizzes"] = $this->quizDao->zonaComumComPartida($partida->getIdPartida());
            $dados["listaQuizzes"] = $this->quizDao->zonaComumComPartida($partida->getIdPartida());

            $dados["listaPartidasQuiz"] = $this->partidaQuizDao->listByPartida($partida->getIdPartida());


            $this->loadView("partidaQuiz/form.php", $dados);
        }
    }

    private function findPartidaById()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $partida = $this->partidaDao->findById($id);
        return $partida;
    }

    private function findZonaById()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $zona = $this->zonaDao->findById($id);
        return $zona;
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
        $listaZona = $this->zonaDao->listByPartida($partida->getIdPartida());
        $partida->setZonas($listaZona);

        $quiz = $this->quizDao->findById($idQuiz);
        if (!$quiz) {
            array_push($erros, "Quiz não encontrado no banco de dados.");
        }

        $partidaQuiz = $this->partidaQuizDao->findByIdPartidaQuiz($idPartida, $idQuiz);
        if ($partidaQuiz) {
            array_push($erros, "O quiz já existe nesta partida.");
        }

        // Verificação do tempo
        if ($partida && $quiz && $quiz->getQuantTempo() > $partida->getTempoPartida()) {
            array_push($erros, "O tempo do quiz não pode ser maior do que o tempo da partida.");
        }

        if (!$erros) {

            try {
                $this->partidaQuizDao->insertPartidaQuiz($idPartida, $idQuiz);
                $tempoQuiz = $quiz->getQuantTempo();
                $_SESSION["tempo"] += $tempoQuiz;
                var_dump($_SESSION["tempo"]);
                $this->subtrairTempoPartida($tempoQuiz);
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar a associação Partida-Quiz na base de dados." . $e->getMessage()];
            }
        }

        //$partida = $this->partidaDao->findById($idPartida);
        $dados["tempoPartida"] = $this->tempoPartida;

        $dados["partida"] = $partida;

        //$dados["listaQuizzes"] = $this->quizDao->zonaComumComPartida($idPartida);
        $dados["listaQuizzes"] = $this->quizDao->zonaComumComPartida($partida->getIdPartida());

        $dados["listaPartidasQuiz"] = $this->partidaQuizDao->listByPartida($partida->getIdPartida());

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
                // Recupere o tempo do quiz removido e adicione-o de volta ao tempo da partida
                //$tempoQuiz = $this->partidaQuiz->getQuiz()->getQuantTempo();
                //$this->adicionarTempoPartida($tempoQuiz);
            } catch (PDOException $e) {
                $msg = ["Erro ao salvar a associação Partida-Quiz na base de dados." . $e->getMessage()];
            }
        }
        $dados["tempoPartida"] = $this->tempoPartida;

        //$this->list("", $msg);
        header('location: PartidaQuizController.php?action=create&id=' .  $this->partidaQuiz->getIdPartida());
    }

    private function subtrairTempoPartida($tempoQuiz)
    {
        $this->tempoPartida -= $tempoQuiz;

        // Certifique-se de que o tempo restante nunca seja negativo
        if ($this->tempoPartida < 0) {
            $this->tempoPartida = 0;
        }
    }

    // Método para adicionar o tempo do quiz de volta ao tempo restante da partida
    private function adicionarTempoPartida($tempoQuiz)
    {
        $this->tempoPartida += $tempoQuiz;
    }
}

#Criar objeto da classe
$partidaQuizCont = new PartidaQuizController();
