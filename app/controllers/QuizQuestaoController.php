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
        $quizQuestoes = $this->quizQuestaoDao->list();
        $dados["lista"] = $quizQuestoes;
        $this->loadView("quiz_questao/listQuizQuestao.php", $dados, $msgErro, $msgSucesso);
    }

    protected function create()
    {
        $quiz = $this->findQuizById();
        if ($quiz) {
            $dados["quiz"] = $quiz;
            $dados["listaQuestoes"] = $this->questaoDao->list();

            // Crie uma instância de QuizQuestaoModel
            $quizQuestao = new QuizQuestao();

            $dados["quizQuestao"] = $quizQuestao;

            $this->loadView("quizQuestao/form.php", $dados);
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

    public function add()
    {
        $idQuestao = isset($_REQUEST['idQuestao']) ? $_REQUEST['idQuestao'] : 0;
        $idQuiz = isset($_REQUEST['idQuiz']) ? $_REQUEST['idQuiz'] : 0;
        $quiz = $this->quizDao->findById($idQuiz);
        // $questoes = isset($_REQUEST['questoes']) ? $_REQUEST['questoes'] : array(); // Get an array of selected questões IDs
        // Fetch the Quiz object

        // Fetch the selected questões here based on their IDs using your DAO.
        // $selectedQuestoes = array();
        // foreach ($questoes as $questaoId) {
        //     $questao = $this->questaoDao->findById($questaoId);
        //     if ($questao) {
        //         $selectedQuestoes[] = $questao;
        //     }
        // }

        if (!$quiz) {
            // Handle the case where Quiz or Questoes with given IDs are not found in the database.
            $erros = ["Quiz ou Questões não encontradas no banco de dados."];
        } else {
            try {
                if ($idQuestao != 0) {
                    print_r('a');
                    $quizQuestao = $this->quizQuestaoDao->findById($idQuestao);
                    print_r('b');
                    if (!$quizQuestao) {
                        print_r('c');
                        $questao = $this->questaoDao->findById($idQuestao);
                        print_r('d');
                        if ($questao) {
                            print_r('e');
                            $questoes = [$questao];
                            print_r('f');
                            $this->quizQuestaoDao->insertQuizQuestaoAssociations($quiz, $questoes);
                            print_r('g');
                        }
                    }
                }
                // if ($idQuizQuestao == 0) { // Inserting
                //     $this->quizQuestaoDao->insertQuizWithQuestoes($quiz, $selectedQuestoes); // Fix here
                // } else { // Updating
                //     $quizQuestao = $this->quizQuestaoDao->findById($idQuizQuestao);
                //     if ($quizQuestao) {
                //         $quizQuestao->setQuiz($quiz);
                //         $quizQuestao->setQuestao($selectedQuestoes);

                //         $this->quizQuestaoDao->updateQuizWithQuestoes($quiz, $selectedQuestoes);
                //     } else {
                //         // Handle the case where QuizQuestao with given ID is not found in the database.
                //         $erros = ["Associação Quiz-Questão não encontrada no banco de dados."];
                //     }
                // }

                // Send success message
                // $msg = "Associação Quiz-Questão salva com sucesso.";
                // $dados["quiz"] = $quiz; // Adicione esta linha
                // $this->list("", $msg);
                // exit;
            } catch (PDOException $e) {
                print_r($e);
                $erros = ["Erro ao salvar a associação Quiz-Questão na base de dados." . $e->getMessage()];
            }
        }

        $quiz = $this->quizDao->findById($idQuiz);

        // If there are errors, return to the form
        // $dados["id"] = $idQuizQuestao;
        $dados["quiz_id"] = $idQuiz;
        // $dados["questao_id"] = $questoes;
        // $dados["listaQuestoes"] = $selectedQuestoes;
        $dados["quiz"] = $quiz; // Add this line to provide the $quiz object to the view
        $dados["quizQuestao"] = $quiz->getQuestoes();


        $msgsErro = $erros ? implode("<br>", $erros) : "";
        $this->loadView("quizQuestao/form.php", $dados, $msgsErro);
    }
}

#Criar objeto da classe
$quizQuestaoCont = new QuizQuestaoController();
