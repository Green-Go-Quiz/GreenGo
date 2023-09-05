<?php
#Classe de controller para partida

require_once(__DIR__ . "/Controller.php");
include_once(__DIR__ . "/../dao/PartidaDAO.php");
include_once(__DIR__ . "/../dao/EquipeDAO.php");
include_once(__DIR__ . "/../dao/PlantaDAO.php");
include_once(__DIR__ . "/../dao/ZonaDAO.php");

class PartidaController extends Controller
{

    private $partidaDAO;
    private $equipeDAO;
    private $zonaDAO;
    private $plantaDAO;

    public function __construct()
    {
        $this->partidaDAO = new PartidaDAO();
        $this->plantaDAO = new PlantaDAO();
        $this->equipeDAO = new EquipeDAO();
        $this->zonaDAO = new ZonaDAO();
        $this->handleAction();
    }

    public function listar()
    {
        echo 'oiii';
        return $this->partidaDAO->list();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "")
    {
        $partidas = $this->partidaDAO->list();

        //TODO adicionar zonas às partidas
        /*foreach ($partidas as $partida) {
            $listaAlt = $this->alternativaDao->findAllByQuestao($questao->getIdQuestao());
            $questao->setAlternativas($listaAlt);
        }*/

        $dados["lista"] = $partidas;

        $this->loadView("partida/listPartida.php", $dados, $msgErro, $msgSucesso);
    }


    public function buscarPorId($idPartida)
    {
        print_r("oiii");

        $partida = $this->partidaDAO->findById($idPartida);
        if ($partida) {
            $zonas = $this->zonaDAO->listByPartida($idPartida);
            $equipes = $this->equipeDAO->listByPartida($idPartida);
            $partida->setEquipes($equipes);
            $partida->setZonas($zonas);
        }
        return $partida;
    }

    public function salvarPartida($partida)
    {
        $this->partidaDAO->savePartida($partida);
    }

    public function salvarUsuarioEquipe($idEquipe, $idPartida)
    {

        $idPartidaEquipe = $this->partidaDAO->findPartidaEquipe($idEquipe, $idPartida);

        $idUsuario = $_SESSION["ID"];
        $inEquipe = $this->partidaDAO->usuarioInEquipe($idUsuario);
        var_dump($inEquipe);

        if ($inEquipe) {
            $error = "Você já pertence a uma equipe!";
            return $error;
        } else {
            $this->partidaDAO->saveUsuarioEquipe($idPartidaEquipe, $idUsuario);
        }
    }

    public function checarQRCode($statusPartida, $plantaId, $arrayPlantas)
    {


        if ($statusPartida) {
            if (!in_array($plantaId, $arrayPlantas)) {
                $arrayPlantas[] = $plantaId;
                $planta = $this->plantaDAO->findById($plantaId);
                $_SESSION["PONTOS"] += $planta->getPontos();
                $_SESSION['PLANTAS_LIDAS'] = $arrayPlantas;
                echo "Parabéns, você encontrou uma nova planta!";
            } else {
                echo "Você já leu esse QR Code para esta planta.";
            }
        } else {
            exit;
        }
    }

    public function atualizar($planta)
    {
        $this->partidaDAO->update($planta);
    }

    public function excluir($planta)
    {
        $this->partidaDAO->delete($planta);
    }

    public function apagarImagem($idPlanta)
    {
        $this->partidaDAO->deleteImage($idPlanta);
    }
}

$partidaCont = new PartidaController();
