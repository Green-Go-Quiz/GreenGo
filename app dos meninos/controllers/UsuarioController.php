<?php
#Classe de controller para especie

include_once(__DIR__."/../dao/UsuarioDAO.php");

class UsuarioController {

    private $usuarioDAO;

    protected function handleAction() {
        //Captura a ação do parâmetro GET
        $action = NULL;
        if(isset($_GET['action']))
            $action = $_GET['action'];
        
        //Chama a ação
        $this->callAction($action);
    }

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function listar() {
        return $this->usuarioDAO->list();
    }

    public function buscarPorId($idUsuario) {
        return $this->usuarioDAO->findById($idUsuario);
    }

    public function manterSessaoADM($nomeADM) {
        $this->usuarioDAO->manterSessaoADM($nomeADM);
    }

    public function logar($usuario) {
        $this->usuarioDAO->logon($usuario);
    }

    public function sair($nomeADM) {
        $this->usuarioDAO->logout($nomeADM);
    }

    public function sairInd($nomeADM) {
        $this->usuarioDAO->logoutInd($nomeADM);
    }


    public function salvar($usuario) {
        $this->usuarioDAO->save($usuario);
    }

    public function atualizar($usuario) {
        $this->usuarioDAO->update($usuario);
    }

    public function excluir($usuario) {
        $this->usuarioDAO->delete($usuario);
    }
}

?>



