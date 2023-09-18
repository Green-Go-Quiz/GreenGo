<?php
# Classe controller para QuizQuestao

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/QuizQuestaoDAO.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../dao/QuestaoDAO.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");
require_once(__DIR__ . "/../models/QuizModel.php");
require_once(__DIR__ . "/../models/QuestaoModel.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");


class QuizQuestaoController extends Controller
{
    private QuizQuestaoDAO $quizQuestaoDao;
    private QuizDAO $quizDao;
    private QuestaoDAO $questaoDao;
    private QuizQuestao $quizQuestao; // Adicione esta linha


    public function __construct()
    {
        $this->quizQuestaoDao = new QuizQuestaoDAO();
        $this->quizDao = new QuizDAO();
        $this->questaoDao = new QuestaoDAO();
        $this->quizQuestao = new QuizQuestao(); // Instancie a classe QuizQuestaoModel
        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        $quizQuestoes = $this->quizQuestaoDao->listByQuiz($this->quizQuestao->getIdQuiz());
        $dados["lista"] = $quizQuestoes;

        $this->loadView("quizQuestao/form.php", $dados, $msgErro, $msgSucesso);
    }

    /*
    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        $quizQuestoes = $this->quizQuestaoDao->list();
        $dados["lista"] = $quizQuestoes;
        $this->loadView("quiz_questao/listQuizQuestao.php", $dados, $msgErro, $msgSucesso);
    }
    */

    protected function create()
    {
        $quiz = $this->findQuizById();
        if ($quiz) {
            $dados["quiz"] = $quiz;

            $dados["listaQuestoes"] = $this->questaoDao->list();

            $dados["listaQuestoesQuiz"] = $this->quizQuestaoDao->listByQuiz($quiz->getIdQuiz());


            $this->loadView("quizQuestao/form.php", $dados);
        }
    }

    protected function listarQuestao(string $msgErro = "", string $msgSucesso = "")
    {
        $quiz = $this->findQuizById();
        $questoes = $this->quizQuestaoDao->listByQuiz($quiz->getIdQuiz());
        $dados["questoes"] = $questoes;
        $dados["quiz"] = $quiz;

        $this->loadView("partidaQuiz/partidaJOG.php", $dados, $msgErro, $msgSucesso);
    }

    private function findQuizById()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $quiz = $this->quizDao->findById($id);

        return $quiz;
    }

    private function findQuizQuestoesById()
    {
        $id = 0;
        if (isset($_GET['idQuizQuestao'])) {
            $id = $_GET['idQuizQuestao'];
        }
        $quizQuestao = $this->quizQuestaoDao->findById($id);

        return $quizQuestao;
    }

    public function add()
    {
        $idQuestao = isset($_GET['idQuestao']) ? $_GET['idQuestao'] : 0;
        $idQuiz = isset($_GET['idQuiz']) ? $_GET['idQuiz'] : 0;

        $erros = array();

        $quiz = $this->quizDao->findById($idQuiz);
        if (!$quiz) {
            array_push($erros, "Quiz não encontrado no banco de dados.");
        }

        $questao = $this->questaoDao->findById($idQuestao);
        if (!$questao) {
            array_push($erros, "Questão não encontrada no banco de dados.");
        }

        //TODO Validar se a questao já existe no quiz
        $quizQuestao = $this->quizQuestaoDao->findByIdQuizQuestao($idQuiz, $idQuestao);
        if ($quizQuestao) {
            array_push($erros, "A questão já existe neste quiz.");
        }
        if (!$erros) {

            try {
                $this->quizQuestaoDao->insertQuizQuestao($idQuiz, $idQuestao);
            } catch (PDOException $e) {
                //print_r($e);
                $erros = ["Erro ao salvar a associação Quiz-Questão na base de dados." . $e->getMessage()];
            }
        }

        $quiz = $this->quizDao->findById($idQuiz);
        $dados["quiz"] = $quiz;
        $dados["listaQuestoes"] = $this->questaoDao->list();
        $dados["listaQuestoesQuiz"] = $this->quizQuestaoDao->listByQuiz($quiz->getIdQuiz());

        $msgsErro = $erros ? implode("<br>", $erros) : "";

        $msgSucesso = "";
        if (!$msgsErro)
            $msgSucesso = 'Questão adicionada ao Quiz com sucesso.';

        $this->loadView("quizQuestao/form.php", $dados, $msgsErro, $msgSucesso);
    }

    public function delete()
    {
        $this->quizQuestao = $this->findQuizQuestoesById();
        $msg = "";


        if (!$msg) {

            try {
                $this->quizQuestaoDao->deleteById($this->quizQuestao->getIdQuizQuestao());
            } catch (PDOException $e) {
                //print_r($e);
                $msg = ["Erro ao salvar a associação Quiz-Questão na base de dados." . $e->getMessage()];
            }
        }

        //$this->list("", $msg);
        header('location: QuizQuestaoController.php?action=create&id=' .  $this->quizQuestao->getIdQuiz());
    }
}

#Criar objeto da classe
$quizQuestaoCont = new QuizQuestaoController();
