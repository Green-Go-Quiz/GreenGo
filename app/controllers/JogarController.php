<?php
# Classe controller para QuizQuestao

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../service/RespostaUsuarioService.php");
require_once(__DIR__ . "/../dao/QuizQuestaoDAO.php");
require_once(__DIR__ . "/../dao/QuizDAO.php");
require_once(__DIR__ . "/../dao/QuestaoDAO.php");
require_once(__DIR__ . "/../dao/AlternativaDAO.php");
require_once(__DIR__ . "/../dao/RespostaUsuarioDAO.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");
require_once(__DIR__ . "/../models/QuizModel.php");
require_once(__DIR__ . "/../models/QuestaoModel.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");
require_once(__DIR__ . "/../models/EquipeUsuarioModel.php");
require_once(__DIR__ . "/../dao/EquipeUsuarioDAO.php");
require_once(__DIR__ . "/../dao/PartidaDAO.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");



class JogarController extends Controller
{
    private QuizQuestaoDAO $quizQuestaoDao;
    private QuestaoDAO $questaoDao;
    private QuizDAO $quizDao;
    private AlternativaDAO $alternativaDao;
    private RespostaUsuarioDAO $respostaUsuarioDao;
    private RespostaUsuarioService $respostaUsuarioService;
    private EquipeUsuarioDAO $equipeUsuarioDao;
    private PartidaDAO $partidaDao;
    private UsuarioDAO $usuarioDao;

    public function __construct()
    {
        $this->quizQuestaoDao = new QuizQuestaoDAO();
        $this->quizDao = new QuizDAO();
        $this->questaoDao = new QuestaoDAO();
        $this->alternativaDao = new AlternativaDAO();
        $this->respostaUsuarioDao = new RespostaUsuarioDAO();
        $this->respostaUsuarioService = new RespostaUsuarioService();
        $this->equipeUsuarioDao = new EquipeUsuarioDAO();
        $this->partidaDao = new PartidaDAO();
        $this->usuarioDao = new UsuarioDAO();

        $this->handleAction();
    }

    protected function listarQuestao(string $msgErro = "", string $msgSucesso = "")
    {
        $quiz = $this->findQuizById();
        $idPartida = $_GET['idPartida'];
        $questoes = $this->quizQuestaoDao->listByQuizJOG($quiz->getIdQuiz());
        //Adicionar as alternativas em cada questão
        foreach ($questoes as $questao) {
            $listaAlt = $this->alternativaDao->findAllByQuestao($questao->getIdQuestao());
            $questao->setAlternativas($listaAlt);
        }

        //$dados["listaQuestoesQuiz"] = $this->quizQuestaoDao->listByQuiz($quiz->getIdQuiz());

        $dados["questoes"] = $questoes;
        $dados["quiz"] = $quiz;
        $dados["idPartida"] = $idPartida;


        $this->loadView("partidaQuiz/partidaJOG.php", $dados, $msgErro, $msgSucesso);
    }

    protected function listarPontuacao(string $msgErro = "", string $msgSucesso = "")
    {
        $quiz = $this->findQuizById();
        $questoes = $this->quizQuestaoDao->listByQuizJOG($quiz->getIdQuiz());


        $idPartida = $_GET['idPartida'];
        session_start();
        $idUsuarioLogado = $_SESSION['ID'];

        $idEquipeUsuario = $this->equipeUsuarioDao->findIdEquipeUsuario($idUsuarioLogado, $idPartida);
        if (!$idEquipeUsuario) {
            echo "Erro ao carregar o ID do usuário na equipe.";
            exit;
        }

        //Adicionar as alternativas em cada questão
        $pontuacaoTotal = 0;
        foreach ($questoes as $questao) {
            $listaAlt = $this->alternativaDao->findAllByQuestao($questao->getIdQuestao());
            $questao->setAlternativas($listaAlt);

            //
            $respostasUsuario = $this->respostaUsuarioDao->findRespostaUsuario($questao->getIdQuestao(), $idEquipeUsuario, $quiz->getIdQuiz());

            if ($respostasUsuario) {
                $questao->setAcertou($respostasUsuario->getAcertou());
                $questao->setIdAlternativaResposta($respostasUsuario->getIdAlternativa());
            } else
                $questao->setAcertou(0);

            if ($questao->getAcertou())
                $pontuacaoTotal += $questao->getPontuacao();
        }

        //$idResposta = $this->respostaUsuarioDao->findById();
        //$respostasUsuario = $this->respostaUsuarioDao->findByIdRespostaUsuario(int $idResposta, int $idUsuario); // Substitua $userId pelo ID do usuário atual


        //$dados["listaQuestoesQuiz"] = $this->quizQuestaoDao->listByQuiz($quiz->getIdQuiz());

        $dados["questoes"] = $questoes;
        $dados["quiz"] = $quiz;
        $dados["pontuacao"] = $pontuacaoTotal;
        $dados['idPartida'] = $idPartida;
        // $dados["respostasUsuario"] = $respostasUsuario;


        $this->loadView("partidaQuiz/pontuacaoPartidaJOG.php", $dados, $msgErro, $msgSucesso);
    }

    protected function save()
    {

        $quiz = $this->findQuizById();
        $questoes = $this->quizQuestaoDao->listByQuizJOG($quiz->getIdQuiz());

        $idPartida = $_GET['idPartida'];
        session_start();
        $idUsuarioLogado = $_SESSION['ID'];

        $idEquipeUsuario = $this->equipeUsuarioDao->findIdEquipeUsuario($idUsuarioLogado, $idPartida);
        if (!$idEquipeUsuario) {
            echo "Erro ao carregar o ID do usuário na equipe.";
            exit;
        }

        //Adicionar as alternativas em cada questão
        foreach ($questoes as $questao) {
            $listaAlt = $this->alternativaDao->findAllByQuestao($questao->getIdQuestao());
            $questao->setAlternativas($listaAlt);
        }


        //echo "<pre>" . print_r($questoes, true) . "</pre>";
        //exit;

        //Carregar as respostas que vieram da tela

        $respostas = array();
        foreach ($questoes as $questao) {
            $idQuestao = $questao->getIdQuestao();

            //Validar se veio a resposta
            if (isset($_POST['altQuestao_' . $questao->getIdQuestao()])) {
                //1- Criar o objeto RespostaUsuario

                $idAlternativaResposta = $_POST['altQuestao_' . $questao->getIdQuestao()];

                //2- Adicionar o objeto no Array $respostas
                $respostaUsuario = new RespostaUsuario();
                $respostaUsuario->setIdQuestao($questao->getIdQuestao());
                $respostaUsuario->setIdQuiz($quiz->getIdQuiz());


                $respostaUsuario->setIdEquipeUsuario($idEquipeUsuario);
                $respostaUsuario->setIdAlternativa($idAlternativaResposta);
                $respostaUsuario->setAcertou($questao->isAlternativaCertaById($idAlternativaResposta));
                $respostas[$idQuestao] = $respostaUsuario;
            }
        }

        //echo "<pre>" . print_r($respostas, true) . "</pre>";
        //exit;

        //Chamar o controller para verificar se todas as questoes foram respondidas
        $erros = $this->respostaUsuarioService->validarRespostaPreenchida($respostas, $questoes);
        //print_r($erros);
        //exit;



        //Persistir os dados
        if (empty($erros)) {
            foreach ($respostas as $respostaUsuario) {
                $this->respostaUsuarioDao->insertRespostaUsuario($respostaUsuario);
            }

            $url = BASEURL . "/controllers/JogarController.php?action=listarPontuacao&id=" . $quiz->getIdQuiz() . "&idPartida=" . $idPartida;
            header("location: " . $url);

            /*
            // Persiste o objeto
            try {
                $this->respostaUsuarioDao->insertRespostaUsuario($respostaUsuario);
                $msg = "Quiz salvo com sucesso.";
                $this->listarQuestao("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros[] = "Você não respondeu a todas as perguntas" . $e;
            }
            */
        } else { //Erro de validacão
            $msgErro = implode("<br>", $erros);
            $this->listarQuestao($msgErro);
        }

        /*foreach ($respostas as $respostaUsuario) {
            $this->respostaUsuarioDao->insertRespostaUsuario(
                $respostaUsuario->getIdQuestao(),
                $respostaUsuario->getIdAlternativa(),
                $respostaUsuario->getEquipeUsuario(),
                $respostaUsuario->getAcertou()
            );
        }*/

        //1- Chamar o respostaUsuarioDAO e passar o array de respostas
        //1.1 - No DAO, deve-se fazer um INSERT para cada objeto do array

        /*
        $respostas = $this->respostaDao->list();
        $repostasUsuario = $this->respostaUsuarioDao->listByResposta($respostas->getIdResposta());

        foreach ($questoes as $questao) {
            $idAlternativaResposta = $_POST['altQuestao_' . $questao->getIdQuestao()];

            $respostaUsuario = new RespostaUsuario();
            $respostaUsuario->setIdUsuario($_SESSION['idUsuario']);
            $respostaUsuario->setIdQuestao($idQuestao);
            $respostaUsuario->setIdResposta($idResposta);
            //questao só existe em resposta

            $questao = $questaoDao->findById($questao->getIdQuestao());
            if ($respostaSelecionada == $questao->getIdAlternativaCorreta()) {
                $respostaUsuario->setAcertou(1);
            } else {
                $respostaUsuario->setAcertou(0);
            }

            // criar metodo do respostaUsuario para salvar no dao?

        }
        */
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
