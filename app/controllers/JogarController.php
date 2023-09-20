<?php
# Classe controller para QuizQuestao

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/QuizQuestaoDAO.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../dao/QuestaoDAO.php");
require_once(__DIR__ . "/../dao/AlternativaDAO.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");
require_once(__DIR__ . "/../models/QuizModel.php");
require_once(__DIR__ . "/../models/QuestaoModel.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");


class JogarController extends Controller
{
    private QuizQuestaoDAO $quizQuestaoDao;
    private QuizDAO $quizDao;
    private AlternativaDAO $alternativaDao;
    //private QuestaoDAO $questaoDao;
    //private QuizQuestao $quizQuestao; // Adicione esta linha


    public function __construct()
    {
        $this->quizQuestaoDao = new QuizQuestaoDAO();
        $this->quizDao = new QuizDAO();
        $this->alternativaDao = new AlternativaDAO();

        //$this->questaoDao = new QuestaoDAO();
        //$this->quizQuestao = new QuizQuestao(); // Instancie a classe QuizQuestaoModel
        $this->handleAction();
    }

    protected function listarQuestao(string $msgErro = "", string $msgSucesso = "")
    {
        $quiz = $this->findQuizById();
        $questoes = $this->quizQuestaoDao->listByQuizJOG($quiz->getIdQuiz());
        //Adicionar as alternativas em cada questão
        foreach ($questoes as $questao) {
            $listaAlt = $this->alternativaDao->findAllByQuestao($questao->getIdQuestao());
            $questao->setAlternativas($listaAlt);
        }

        //$dados["listaQuestoesQuiz"] = $this->quizQuestaoDao->listByQuiz($quiz->getIdQuiz());

        $dados["questoes"] = $questoes;
        $dados["quiz"] = $quiz;

        $this->loadView("partidaQuiz/partidaJOG.php", $dados, $msgErro, $msgSucesso);
    }

    private function save()
    {
        $quiz = $this->findQuizById();
        $questoes = $this->quizQuestaoDao->listByQuizJOG($quiz->getIdQuiz());

        foreach ($questoes as $questao) {
            $idAlternativaResposta = $_POST['altQuestao_' . $questao->getIdQuestao()];
        }
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
}

#Criar objeto da classe
new JogarController();
