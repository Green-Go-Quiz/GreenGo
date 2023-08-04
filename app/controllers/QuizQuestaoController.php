<?php
# Classe controller para QuizQuestao

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/QuizQuestaoDAO.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");

class QuizQuestaoController extends Controller
{
    private QuizQuestaoDAO $quizQuestaoDao;

    public function __construct()
    {
        $this->quizQuestaoDao = new QuizQuestaoDAO();
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
        // Apenas renderiza o formulário de criação de QuizQuestao
        $dados["id"] = 0;
        $dados["quiz_id"] = 0;
        $dados["questao_id"] = 0;
        $this->loadView("quiz_questao/formQuizQuestao.php", $dados);
    }

    protected function edit()
    {
        $quizQuestao = $this->findQuizQuestaoById();
        if ($quizQuestao) {
            $dados["id"] = $quizQuestao->getIdQuizQuestao();
            $dados["quiz_id"] = $quizQuestao->getQuiz()->getIdQuiz();
            $dados["questao_id"] = $quizQuestao->getQuestao()->getIdQuestao();
            $this->loadView("quiz_questao/formQuizQuestao.php", $dados);
        } else {
            $this->list("Associação Quiz-Questão não encontrada.");
        }
    }

    public function save()
    {
        $idQuizQuestao = isset($_POST['id']) ? $_POST['id'] : 0;
        $idQuiz = isset($_POST['quiz_id']) ? $_POST['quiz_id'] : 0;
        $idQuestao = isset($_POST['questao_id']) ? $_POST['questao_id'] : 0;

        // Validation of the data
        // Implement the validation of the IDs of Quiz and Questão, check if they exist in the database.

        // Create a new QuizQuestao instance
        $quizQuestao = new QuizQuestao();
        $quizQuestao->setIdQuizQuestao($idQuizQuestao);
        $quizQuestao->setIdQuiz($idQuiz);
        $quizQuestao->setIdQuestao($idQuestao);

        try {
            if ($idQuizQuestao == 0) { // Inserting
                // Assuming $this->quizQuestaoDao is an instance of the QuizQuestaoDAO class
                $this->quizQuestaoDao->insertQuizWithQuestoes($quizQuestao, $questoes);
            } else { // Updating
                // Implement the updateQuizWithQuestoes() method in the QuizQuestaoDAO class
                $this->quizQuestaoDao->updateQuizWithQuestoes($quizQuestao, $questoes);
            }

            // Send success message
            $msg = "Associação Quiz-Questão salva com sucesso.";
            $this->list("", $msg);
            exit;
        } catch (PDOException $e) {
            $erros = ["Erro ao salvar a associação Quiz-Questão na base de dados." . $e->getMessage()];
        }

        // If there are errors, return to the form
        $dados["id"] = $idQuizQuestao;
        $dados["quiz_id"] = $idQuiz;
        $dados["questao_id"] = $idQuestao;
        $msgsErro = implode("<br>", $erros);
        $this->loadView("quiz_questao/formQuizQuestao.php", $dados, $msgsErro);
    }


    public function delete()
    {
        $quizQuestao = $this->findQuizQuestaoById();
        if ($quizQuestao) {
            $this->quizQuestaoDao->deleteById($quizQuestao->getIdQuizQuestao());
            $this->list("", "Associação Quiz-Questão excluída com sucesso!");
        } else {
            $this->list("Associação Quiz-Questão não encontrada!");
        }
    }

    private function findQuizQuestaoById()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        return $this->quizQuestaoDao->findById($id);
    }
}

#Criar objeto da classe
$quizQuestaoCont = new QuizQuestaoController();
