<?php
# Classe controller para Quiz

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../service/QuizService.php");

require_once(__DIR__ . "/../model/Quiz.php");

class QuizController extends Controller
{
    private QuizDAO $quizDao;
    private QuizService $quizService;


    public function __construct()
    {
        if (!$this->usuarioLogado())
            exit;


        $this->quizDao = new QuizDAO();
        $this->quizService = new QuizService();


        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        echo "passoou";
        $quizzes = $this->quizDao->list();
        $dados["lista"] = $quizzes;

        $this->loadView("quiz/listQuiz.php", $dados, $msgErro, $msgSucesso);
    }


    protected function create()
    {
        $dados["id"] = 0;
        $this->loadView("quiz/form.php", $dados);
    }

    protected function edit()
    {
        $quiz = $this->findQuizById();
        if ($quiz) {
            $dados["id"] = $quiz->getIdQuiz();
            $dados["quiz"] = $quiz;

            $this->loadView("quiz/form.php", $dados);
        } else {
            $this->list("Quiz não encontrado.");
        }
    }

    public function save()
    {
        // Captura os dados do formulário
        $dados["id"] = isset($_POST['id']) ? $_POST['id'] : 0;
        $maximoPergunta = isset($_POST['maximoPergunta']) ? (int) $_POST['maximoPergunta'] : 0;
        $nomeQuiz = isset($_POST['nomeQuiz']) ? trim($_POST['nomeQuiz']) : "";
        $comTempo = isset($_POST['comTempo']) ? (int) $_POST['comTempo'] : 0;
        $quantTempo = isset($_POST['quantTempo']) ? (int) $_POST['quantTempo'] : 0;
        $idQuestao = isset($_POST['idQuestao']) ? (int) $_POST['idQuestao'] : 0;

        // Cria objeto Quiz
        $quiz = new Quiz();
        $quiz->setMaximoPergunta($maximoPergunta);
        $quiz->setNome($nomeQuiz);
        $quiz->setComTempo($comTempo);
        $quiz->setQuantTempo($quantTempo);
        $quiz->setIdQuestao($idQuestao);

        // Valida os dados
        $erros = $this->quizService->validarQuiz($quiz);

        if (empty($erros)) {
            // Persiste o objeto
            try {
                if ($dados["id"] == 0) { // Inserindo
                    $this->quizDao->insert($quiz);
                } else { // Alterando
                    $quiz->setIdQuiz($dados["id"]);
                    $this->quizDao->update($quiz);
                }

                // Enviar mensagem de sucesso
                $msg = "Quiz salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = "[Erro ao salvar o quiz na base de dados.]";
            }
        }
    }
    public function delete()
    {
        $quiz = $this->findQuizById();
        if ($quiz) {
            $this->quizDao->deleteById($quiz->getIdQuiz());
            $this->list("", "Quiz excluído com sucesso!");
        } else {
            $this->list("Quiz não encontrado!");
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
$quizCont = new QuizController();
