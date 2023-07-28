<?php
# Classe controller para Questão

require_once(__DIR__ . "/../controllers/Controller.php");
require_once(__DIR__ . "/../dao/QuestaoDAO.php");
require_once(__DIR__ . "/../service/QuestaoService.php");
require_once(__DIR__ . "/../models/QuestaoModel.php");
require_once(__DIR__ . "/../models/AlternativaModel.php");
require_once(__DIR__ . "/../dao/AlternativaDAO.php");


class QuestaoController extends Controller
{
    private QuestaoDAO $questaoDao;
    private AlternativaDAO $alternativaDao;
    private QuestaoService $questaoService;

    private array $camposAlternativas = ["alternativa1", "alternativa2", "alternativa3", "alternativa4"];

    public function __construct()
    {
        //if (!$this->usuarioLogado())
        //    exit;
        /*
        if (!$this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR])) {
            echo "Acesso negado";
            exit;
        }
        */

        $this->questaoDao = new QuestaoDAO();
        $this->alternativaDao = new AlternativaDAO();
        $this->questaoService = new QuestaoService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        echo "ta funcionando";
        $questoes = $this->questaoDao->list();

        //Adicionar as alternativas em cada questão
        foreach ($questoes as $questao) {
            $listaAlt = $this->alternativaDao->findAllByQuestao($questao->getIdQuestao());
            $questao->setAlternativas($listaAlt);
        }

        $dados["lista"] = $questoes;

        $this->loadView("questao/listQuestao.php", $dados, $msgErro, $msgSucesso);
    }

    protected function create()
    {

        $dados["id"] = 0;
        
        $dados['alternativas'] = $this->camposAlternativas;
        $this->loadView("questao/form.php", $dados);
    }

 
    
    protected function edit()
    {
        $questao = $this->findQuestaoById();
        if ($questao) {
            $dados["id"] = $questao->getIdQuestao();
            // Carregar as alternativas
            $dados["questao"] = $questao;
            $dados['alternativas'] = $this->alternativaDao->findAllByQuestao($questao->getIdQuestao());

            $this->loadView("questao/form.php", $dados);
        } else {
            $this->list("Questão não encontrada.");
        }
    }

    public function save()
    {
        // Captura os dados do formulário
        $dados["id"] = isset($_POST['id']) ? $_POST['id'] : 0;
        $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : NULL;
        $grauDificuldade = isset($_POST['grauDificuldade']) ? trim($_POST['grauDificuldade']) : NULL;
        $pontuacao = isset($_POST['pontuacao']) ? trim($_POST['pontuacao']) : NULL;
        $imagem = isset($_FILES["imagem"]) ? $_FILES["imagem"] : NULL;

        $textoAlternativa = array();
        foreach ($this->camposAlternativas as $campo) {
            $texto = isset($_POST[$campo]) ? trim($_POST[$campo]) : NULL;
            array_push($textoAlternativa, $texto);
           // Captura a alternativa correta
$indiceCorreta = isset($_POST['alternativa_correta']) ? (int)$_POST['alternativa_correta'] : -1;

        }

        // Cria objeto Questao
        $questao = new Questao();
        $questao->setDescricaoQ($descricao);
        $questao->setGrauDificuldade($grauDificuldade);
        $questao->setPontuacao($pontuacao);
        //$questao->setImagem($imagem);
        // $questao->setCampos_alternativa($campos_alternativa);

        //Criar objetos Alternativa
        $alternativas = array();
        foreach ($textoAlternativa as $texto) {
            $alt = new Alternativa();
            $alt->setDescricaoAlternativa($texto);
            $alt->setAlternativaCerta(0);
            array_push($alternativas, $alt);

            // Captura o índice da alternativa correta do campo "alternativa_correta" enviado pelo formulário
$indiceCorreta = isset($_POST['alternativa_correta']) ? (int)$_POST['alternativa_correta'] : -1;

// Define a alternativa correta no array de alternativas
foreach ($alternativas as $index => $alt) {
    $alt->setAlternativaCerta($index === $indiceCorreta ? 1 : 0);
}

}
        // Valida os dados
        $erros = $this->questaoService->validarQuestao($questao, $imagem);

         if (empty($erros)) {
            $arquivoNome = explode('.', $imagem['name']);
            $arquivoExtensao = $arquivoNome[1];

            $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
            $nomeArquivoSalvar = "imagem_" . $uuid . "." . $arquivoExtensao;

            //Salva o arquivo no diretório defindo em $PATH_ARQUIVOS
            if (move_uploaded_file($imagem["tmp_name"], PATH_ARQUIVOS . "/" . $nomeArquivoSalvar)) {
                $questao->setImagem($nomeArquivoSalvar);
                try {
                    if ($dados["id"] == 0) { // Inserindo
                        $idQuestao = $this->questaoDao->insert($questao);
                        foreach ($alternativas as $alt) {
                            $this->alternativaDao->insert($alt, $idQuestao);
                        }
                    } //else { // Alterando
                       // $questao->setIdQuestao($dados["id"]);
                       // $this->questaoDao->update($questao);
                       else { // Alterando
                        $this->questaoDao->update($questao);
                        $idQuestao = $dados["id"];
                        foreach ($alternativas as $index => $alt) {
                            $idAlternativa = isset($dados["alternativasIds"][$index]) ? $dados["alternativasIds"][$index] : 0;
                            if ($idAlternativa == 0) {
                                // Caso não exista ID da alternativa, insere uma nova
                                $this->alternativaDao->insert($alt, $idQuestao);
                            } else {
                                // Caso exista ID da alternativa, atualiza a alternativa existente
                                $alt->setIdAlternativa($idAlternativa);
                                $this->alternativaDao->update($alt);
                            }
                        }
                       }

                    // Enviar mensagem de sucesso
                    $msg = "Questão salva com sucesso.";
                    $this->list("", $msg);
                    exit;
                } catch (PDOException $e) {
                    $erros = ["Erro ao salvar a questão na base de dados." . $e];
                }
            } else {
                //Caso não consega salvar, exibe o erro
                echo ["Erro, o arquivo n&atilde;o pode ser enviado."];
            }
            // Persiste o objeto

        }

        // Se há erros, volta para o formulário
        $dados["questao"] = $questao;
        $dados['alternativas'] = $this->camposAlternativas;
        $msgsErro = implode("<br>", $erros);
        $this->loadView("questao/form.php", $dados, $msgsErro);
    }

    public function delete()
    {

        //   var_dump($_GET['id']);
        $questao = $this->findQuestaoById();
        if ($questao) {
            $this->questaoDao->deleteById($questao->getIdQuestao());

            //$this->alternativaDao->deleteByIdQuestao($questao->getIdQuestao());

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
