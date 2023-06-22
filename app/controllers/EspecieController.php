<?php
#Classe de controller para especie

include_once(__DIR__."/../dao/EspecieDAO.php");

class EspecieController {

    private $especieDAO;

    public function __construct() {
        $this->especieDAO = new EspecieDAO();
    }

    public function listar() {
        return $this->especieDAO->list();
    }

    public function buscarPorId($idEspecie) {
        return $this->especieDAO->findById($idEspecie);
    }

    public function salvar($especie) {
        $this->especieDAO->save($especie);
    }

    public function atualizar($especie) {
        $this->especieDAO->update($especie);
    }

    public function excluir($especie) {
        $this->especieDAO->delete($especie);
    }
}

?>



