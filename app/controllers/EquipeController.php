<?php
#Classe de controller para equipe

include_once(__DIR__."/../dao/EquipeDAO.php");

class EquipeController {

    private $equipeDAO;

    public function __construct() {
        $this->equipeDAO = new EquipeDAO();
    }

    public function listar() {
        return $this->equipeDAO->list();
    }

    public function buscarPorId($idEquipe) {
        return $this->equipeDAO->findById($idEquipe);
    }

    public function salvar($equipe) {
        $this->equipeDAO->save($equipe);
    }

    public function atualizar($equipe) {
        $this->equipeDAO->update($equipe);
    }

    public function excluir($equipe) {
        $this->equipeDAO->delete($equipe);
    }
}

?>



