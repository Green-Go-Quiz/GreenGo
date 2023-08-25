<?php

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/QuestaoEspecieDAO.php");
require_once(__DIR__ . "/../dao/EspecieDAO.php");
require_once(__DIR__ . "/../dao/QuestaoDAO.php");
require_once(__DIR__ . "/../dao/AlternativaDAO.php");
require_once(__DIR__ . "/../models/QuestaoEspecieModel.php");
require_once(__DIR__ . "/../models/EspecieModel.php");
require_once(__DIR__ . "/../models/QuestaoModel.php");
require_once(__DIR__ . "/../models/QuizQuestaoModel.php");


class QuestaoEspecieController extends Controller
{
    private QuestaoEspecieDAO $questaoEspecieDao;
    private EspecieDAO $especieDao;
    private QuestaoDAO $questaoDao;
    private QuestaoEspecie $questaoEspecie;
    private AlternativaDAO $alternativaDao;
    public function __construct()
    {
        $this->questaoEspecieDao = new QuestaoEspecieDAO();
        $this->especieDao = new EspecieDAO();
        $this->questaoDao = new QuestaoDAO();
        $this->questaoEspecie = new QuestaoEspecie(); // Instancie a classe QuestaoEspecieModel
        $this->alternativaDao = new AlternativaDAO();
        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        $questaoEspecies = $this->questaoEspecieDao->listByQuestao($this->questaoEspecie->getIdQuestao());
        $dados["lista"] = $questaoEspecies;

        $this->loadView("questaoEspecie/form.php", $dados, $msgErro, $msgSucesso);
    }

    protected function create()
    {
        $questao = $this->findQuestaoById();
        if ($questao) {
            $dados["questao"] = $questao;
            $dados["listaEspecie"] = $this->especieDao->list();
            $dados["listaQuestoesEspecie"] = $this->questaoEspecieDao->listByQuestao($questao->getIdQuestao());

            $this->loadView("questaoEspecie/form.php", $dados);
        }
    }

    private function findQuestaoById()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $questao = $this->questaoDao->findById($id);
        if ($questao)
            $questao->setAlternativas($this->alternativaDao->findAllByQuestao($id));
        return $questao;
    }

    private function findQuestaoEspecieById()
    {
        $id = 0;
        if (isset($_GET['idQuestaoEspecie'])) {
            $id = $_GET['idQuestaoEspecie'];
        }
        $questaoEspecie = $this->questaoEspecieDao->findById($id);

        return $questaoEspecie;
    }

    public function add()
    {
        $idQuestao = isset($_GET['idQuestao']) ? $_GET['idQuestao'] : 0;
        $idEspecie = isset($_GET['idEspecie']) ? $_GET['idEspecie'] : 0;

        $erros = array();

        $especie = $this->especieDao->findById($idEspecie);
        if (!$especie) {
            array_push($erros, "Espécie não encontrada no banco de dados.");
        }

        $questao = $this->questaoDao->findById($idQuestao);
        if (!$questao) {
            array_push($erros, "Questão não encontrada no banco de dados.");
        }

        $especie = $this->especieDao->findById($idEspecie);
        if (!$especie) {
            array_push($erros, "Espécie não encontrada no banco de dados.");
        }

        $questaoEspecie = $this->questaoEspecieDao->findByIdEspecieQuestao($idEspecie, $idQuestao);
        if ($questaoEspecie) {
            array_push($erros, "A espécie já existe nesta questão.");
        }

        if (!$erros) {
            try {
                $this->questaoEspecieDao->insertQuestaoEspecie($idEspecie, $idQuestao);
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar a associação Questão-Espécie na base de dados." . $e->getMessage()];
            }
        }


        //$questao = $this->questaoDao->findById($idQuestao);
        if ($questao)
            $questao->setAlternativas($this->alternativaDao->findAllByQuestao($questao->getIdQuestao()));
        $dados["questao"] = $questao;
        $dados["listaEspecie"] = $this->especieDao->list();
        $dados["listaQuestoesEspecie"] = $this->questaoEspecieDao->listByQuestao($questao->getIdQuestao());



        $msgsErro = $erros ? implode("<br>", $erros) : "";

        $msgSucesso = "";
        if (!$msgsErro) {
            $msgSucesso = 'Espécie adicionada à questão com sucesso.';
        }

        $this->loadView("questaoEspecie/form.php", $dados, $msgsErro, $msgSucesso);
    }

    public function delete()
    {
        $this->questaoEspecie = $this->findQuestaoEspecieById();
        $msg = "";

        if (!$msg) {
            try {
                $this->questaoEspecieDao->deleteById($this->questaoEspecie->getIdQuestaoEspecie());
            } catch (PDOException $e) {
                $msg = ["Erro ao excluir a associação Questão-Espécie na base de dados." . $e->getMessage()];
            }
        }

        header('location: QuestaoEspecieController.php?action=create&id=' . $this->questaoEspecie->getIdQuestao());
    }
}

$questaoEspecieCont = new QuestaoEspecieController();
