<?php
# Classe controller para Questão
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/QuestaoDAO.php");
require_once(__DIR__ . "/../service/QuestaoService.php");
require_once(__DIR__ . "/../model/Questao.php");

class QuestaoController extends Controller
{
    private QuestaoDAO $questaoDao;
    private QuestaoService $questaoService;

    public function __construct()
    {
        if (!$this->usuarioLogado())
            exit;
        /*
        if (!$this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR])) {
            echo "Acesso negado";
            exit;
        }
        */

        $this->questaoDao = new QuestaoDAO();
        $this->questaoService = new QuestaoService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        echo "ta funcionando";
        $questoes = $this->questaoDao->list();
        $dados["lista"] = $questoes;


        $this->loadView("questao/listQuestao.php", $dados, $msgErro, $msgSucesso);
    }

    protected function create()
    {
        //$dados["descricaoQ"] = " ";
        //$dados["pontuacao"] = 0;
        $dados["id"] = 0;
        //$dados["grauDificuldade"] = ['facil', 'medio', 'dificil'];
        $this->loadView("questao/form.php", $dados);
    }

    protected function edit()
    {
        $questao = $this->findQuestaoById();
        if ($questao) {
            $dados["id"] = $questao->getIdQuestao();
            $dados["questao"] = $questao;

            $this->loadView("questao/form.php", $dados);
        } else
            $this->list("Questão não encontrada.");
    }

    public function save()
    {
        // Captura os dados do formulário
        $dados["id"] = isset($_POST['id']) ? $_POST['id'] : 0;
        $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : NULL;
        $grauDificuldade = isset($_POST['grauDificuldade']) ? trim($_POST['grauDificuldade']) : NULL;
        $pontuacao = isset($_POST['pontuacao']) ? trim($_POST['pontuacao']) : NULL;
        $imagem = isset($_POST['imagem']) ? trim($_POST['imagem']) : NULL;

        // Cria objeto Questao
        $questao = new Questao();
        $questao->setDescricaoQ($descricao);
        $questao->setGrauDificuldade($grauDificuldade);
        $questao->setPontuacao($pontuacao);
        $questao->setImagem($imagem);

        // Valida os dados
        $erros = $this->questaoService->validarQuestao($questao);


        if (empty($erros)) {
            // Persiste o objeto
            try {
                if ($dados["id"] == 0) { // Inserindo
                    $this->questaoDao->insert($questao);
                } else { // Alterando
                    $questao->setIdQuestao($dados["id"]);
                    $this->questaoDao->update($questao);
                }

                // Enviar mensagem de sucesso
                $msg = "Questão salva com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = "[Erro ao salvar a questão na base de dados.]";
            }
        }

        // Se há erros, volta para o formulário
        $dados["questao"] = $questao;
        $msgsErro = implode("<br>", $erros);
        $this->loadView("questao/form.php", $dados, $msgsErro);
    }

    public function delete()
    { 
   
     //   var_dump($_GET['id']);
        $questao = $this->findQuestaoById();
        if ($questao) {
            $this->questaoDao->deleteById($questao->getIdQuestao());
           
            $this->list("", "Questão excluída com sucesso!");
        } else {
            $this->list("Questão não encontrada!"); 
        }
    }


    private function findQuestaoById()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $questao = $this->questaoDao->findById($id);
     //   var_dump($questao);
        return $questao;
    }
}

#Criar objeto da classe
$questaoCont = new QuestaoController();
