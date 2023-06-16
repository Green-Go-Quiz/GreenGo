<?php 
#Classe controller para a Home do sistema
require_once(__DIR__ . "/Controller.php");

class HomeController extends Controller {

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        //Seta uma action padrão caso a mesmo não tenha sido enviada por parâmetro
        $this->setActionDefault("homeAluno");

        $this->handleAction();
    }

    protected function homeAluno() {
        $this->loadView("indexJOG.php", []);
    }

    protected function homeADM() {
        $this->loadView("../views/indexADM.php", []);
    }
}


#Criar objeto da classe
$homeCont = new HomeController();