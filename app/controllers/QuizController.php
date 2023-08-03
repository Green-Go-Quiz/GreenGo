<?php
# Classe controller para Qui
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../service/QuizService.php");
require_once(__DIR__ . "/../dao/QuestaoDAO.php");
require_once(__DIR__ . "/../dao/ZonaDAO.php");
require_once(__DIR__ . "/../models/QuizModel.php");
require_once(__DIR__ . "/../models/QuestaoModel.php");

class QuizController extends Controller
{
    private QuizDAO $quizDao;
    private QuestaoDAO $questaoDao;
    private QuizService $quizService;
    private ZonaDAO $zonaDao;


    public function __construct()
    {
        /*if (!$this->usuarioLogado())
            exit;
        */

        $this->quizDao = new QuizDAO();
        $this->quizService = new QuizService();
        $this->zonaDao = new ZonaDAO();


        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        $quizzes = $this->quizDao->list();
        $dados["lista"] = $quizzes;

        $this->loadView("quiz/listQuiz.php", $dados, $msgErro, $msgSucesso);
    }


    protected function create()
    {
        $dados["id"] = 0;
        $dados['zonas'] = $this->zonaDao->list();
        $this->loadView("quiz/form.php", $dados);
    }

    protected function edit()
    {
        $quiz = $this->findQuizById();
        if ($quiz) {
            $dados["id"] = $quiz->getIdQuiz();
            $dados['zonas'] = $this->zonaDao->list();
            $dados["quiz"] = $quiz;

            $this->loadView("quiz/form.php", $dados);
        } else {
            $this->list("Quiz não encontrado.");
        }
    }

 

    public function save()
    {
        // Captura os dados do formulário
        $dados["id"] = isset($_POST['idQuiz']) ? $_POST['idQuiz'] : 0;
        $maximoPergunta = isset($_POST['maximoPergunta']) ? (int) $_POST['maximoPergunta'] : null;
        $nomeQuiz = isset($_POST['nomeQuiz']) ? trim($_POST['nomeQuiz']) : "";
        $comTempo = isset($_POST['comTempo']) ? (int) $_POST['comTempo'] : 0;
        $quantTempo = isset($_POST['quantTempo']) ? (int) $_POST['quantTempo'] : null;
        $idZona = isset($_POST['zona']) ? $_POST['zona'] : 0; // Array de IDs das zonas selecionadas

        // Cria objeto Quiz
        $quiz = new Quiz();
        $quiz->setMaximoPergunta($maximoPergunta);
        $quiz->setNomeQuiz($nomeQuiz);
        $quiz->setComTempo($comTempo);
        $quiz->setQuantTempo($quantTempo);
        $quiz->setIdZona($idZona);

        

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
                $erros[] = "Erro ao salvar o quiz na base de dados." . $e;
            }
        }

        // Enviar mensagem de erro
        $msgErro = implode("<br>", $erros);
        $dados['zonas'] = $this->zonaDao->list();
        $dados["quiz"] = $quiz;
        $this->loadView("quiz/form.php", $dados, $msgErro);
        //$this->list($msgErro);
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
    private function insertQuizQuestaoAssociations(int $quizId, array $questoes)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO quiz_questao (idQuiz, idQuestao) VALUES (:idQuiz, :idQuestao)";

        $stm = $conn->prepare($sql);

        foreach ($questoes as $questao) {
            $stm->bindValue(":idQuiz", $quizId);
            $stm->bindValue(":idQuestao", $questao->getIdQuestao());
            $stm->execute();
        }
    }

    private function deleteQuizQuestaoAssociations(int $quizId)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM quiz_questao WHERE idQuiz = :idQuiz";

        $stm = $conn->prepare($sql);
        $stm->bindValue(":idQuiz", $quizId);
        $stm->execute();
    }
}


#Criar objeto da classe
$quizCont = new QuizController();
