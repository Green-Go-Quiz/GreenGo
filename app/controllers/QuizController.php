<?php
# Classe controller para Qui
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../models/service/QuizService.php");
require_once(__DIR__ . "/../dao/QuestaoDAO.php");
require_once(__DIR__ . "/../models/QuizModel.php");
require_once(__DIR__ . "/../models/QuestaoModel.php");


class QuizController extends Controller
{
    private QuizDAO $quizDao;
    private QuestaoDAO $questaoDao;
    private QuizService $quizService;


    public function __construct()
    {
        if (!$this->usuarioLogado())
            exit;


        $this->quizDao = new QuizDAO();
        //$this->quizService = new QuizService();


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

    /*public function save()
    {
        // Captura os dados do formulário
        $dados["id"] = isset($_POST['id']) ? $_POST['id'] : 0;
        $maximoPergunta = isset($_POST['maximoPergunta']) ? (int) $_POST['maximoPergunta'] : 0;
        $nomeQuiz = isset($_POST['nomeQuiz']) ? trim($_POST['nomeQuiz']) : "";
        $comTempo = isset($_POST['comTempo']) ? (int) $_POST['comTempo'] : 0;
        $quantTempo = isset($_POST['quantTempo']) ? (int) $_POST['quantTempo'] : 0;
        $idQuestao = isset($_POST['idQuestao']) ? (int) $_POST['idQuestao'] : 0;
        echo "salvou: ";
        // Cria objeto Quiz
        $quiz = new Quiz();
        $quiz->setMaximoPergunta($maximoPergunta);
        $quiz->setNomeQuiz($nomeQuiz);
        $quiz->setComTempo($comTempo);
        $quiz->setQuantTempo($quantTempo);
        $quiz->setIdQuestao($idQuestao);
        echo "criou o objeto   ";

        // Verifica se o ID da questão foi selecionado e válido
        if ($idQuestao > 0) {
            $quiz->setIdQuestao($idQuestao); // Define o ID da questão no objeto Quiz
        } else {
            $erros[] = "Selecione uma questão.";
        }

        // Valida os dados
        $erros = $this->quizService->validarQuiz($quiz);
        echo   "ta validando";
        if (empty($erros)) {
            // Persiste o objeto
            try {
                if ($dados["id"] == 0) { // Inserindo  
                    $this->quizDao->insert($quiz);
                    echo "inseriu"; // trava aqui
                } else { // Alterando
                    $quiz->setIdQuiz($dados["id"]);
                    $this->quizDao->update($quiz);
                }

                // Enviar mensagem de sucesso
                $msg = "Quiz salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros[] = "Erro ao salvar o quiz na base de dados.";
            }
        }

        // Enviar mensagem de erro
        $msgErro = implode("<br>", $erros);
        $this->list($msgErro);
    }*/

    public function save()
    {
        // Captura os dados do formulário
        $dados["id"] = isset($_POST['id']) ? $_POST['id'] : 0;
        $maximoPergunta = isset($_POST['maximoPergunta']) ? (int) $_POST['maximoPergunta'] : 0;
        $nomeQuiz = isset($_POST['nomeQuiz']) ? trim($_POST['nomeQuiz']) : "";
        $comTempo = isset($_POST['comTempo']) ? (int) $_POST['comTempo'] : 0;
        $quantTempo = isset($_POST['quantTempo']) ? (int) $_POST['quantTempo'] : 0;
        $idQuestoes = isset($_POST['idQuestoes']) ? $_POST['idQuestoes'] : array(); // Array de IDs das questões selecionadas

        // Cria objeto Quiz
        $quiz = new Quiz();
        $quiz->setMaximoPergunta($maximoPergunta);
        $quiz->setNomeQuiz($nomeQuiz);
        $quiz->setComTempo($comTempo);
        $quiz->setQuantTempo($quantTempo);

        // Adiciona as questões ao objeto Quiz
        foreach ($idQuestoes as $idQuestao) {
            // Recupera a questão do banco de dados (supondo que você tenha uma função para isso)
            $questao = $this->questaoDao->findById($idQuestao);
            if ($questao) {
                $quiz->addQuestao($questao);
            }
        }

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
                $erros[] = "Erro ao salvar o quiz na base de dados.";
            }
        }

        // Enviar mensagem de erro
        $msgErro = implode("<br>", $erros);
        $this->list($msgErro);
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