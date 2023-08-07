<?php
# Classe controller para QuizQuestao

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/QuizQuestaoDAO.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");

class QuizQuestaoController extends Controller
{
    private QuizQuestaoDAO $quizQuestaoDao;
    private QuizDAO $quizDao;


    public function __construct()
    {
        $this->quizQuestaoDao = new QuizQuestaoDAO();
        $this->quizDao = new QuizDAO();
        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        $quizQuestoes = $this->quizQuestaoDao->list();
        $dados["lista"] = $quizQuestoes;
        $this->loadView("quiz_questao/listQuizQuestao.php", $dados, $msgErro, $msgSucesso);
    }

    protected function create()
    {
        $quiz = $this->findQuizById();
        if ($quiz) {
            $dados["quiz"] = $quiz;
            $dados["listaQuestoes"] = array();
            $this->loadView("quizQuestao/form.php", $dados);
        }


        // Apenas renderiza o formulário de criação de QuizQuestao
        //$dados["id"] = 0;

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


    public function save()
    {
        $idQuizQuestao = isset($_POST['id']) ? $_POST['id'] : 0;
        $idQuiz = isset($_POST['quiz_id']) ? $_POST['quiz_id'] : 0;
        $questoes = isset($_POST['questoes']) ? $_POST['questoes'] : array(); // Get an array of selected questões IDs

        // Validation of the data
        // Implement the validation of the IDs of Quiz and Questão, check if they exist in the database.

        // Create a new QuizQuestao instance
        $quizQuestao = new QuizQuestao();
        $quizQuestao->setIdQuizQuestao($idQuizQuestao);

        // Assuming you have Quiz and Questao classes with their respective methods for fetching from the database,
        // you can fetch the Quiz and Questao objects using their IDs.
        $quiz = Quiz::getById($idQuiz);

        // You can fetch the selected questões here based on their IDs using your DAO.
        $selectedQuestoes = array();
        foreach ($questoes as $questaoId) {
            $questao = Questao::getById($questaoId);
            if ($questao) {
                $selectedQuestoes[] = $questao;
            }
        }

        if (!$quiz || empty($selectedQuestoes)) {
            // Handle the case where Quiz or Questoes with given IDs are not found in the database.
            $erros = ["Quiz ou Questões não encontradas no banco de dados."];
        } else {
            $quizQuestao->setQuiz($quiz);
            // Set the array of selected Questoes
            $quizQuestao->setQuestao($selectedQuestoes);

            try {
                if ($idQuizQuestao == 0) { // Inserting
                    $this->quizQuestaoDao->insertQuizWithQuestoes($quizQuestao, $selectedQuestoes);
                } else { // Updating
                    $this->quizQuestaoDao->updateQuizWithQuestoes($quizQuestao, $selectedQuestoes);
                }

                // Send success message
                $msg = "Associação Quiz-Questão salva com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar a associação Quiz-Questão na base de dados." . $e->getMessage()];
            }
        }

        // If there are errors, return to the form
        $dados["id"] = $idQuizQuestao;
        $dados["quiz_id"] = $idQuiz;
        $dados["questao_id"] = $questoes;
        $msgsErro = implode("<br>", $erros);
        $this->loadView("quiz_questao/formQuizQuestao.php", $dados, $msgsErro);
    }
}

#Criar objeto da classe
$quizQuestaoCont = new QuizQuestaoController();
