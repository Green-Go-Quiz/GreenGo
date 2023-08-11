<?php
#Classe de controller para Zona

include_once(__DIR__ . "/../dao/ZonaDAO.php");

class ZonaController {

    private $ZonaDAO;

    public function __construct() {
        $this->ZonaDAO = new ZonaDAO();
    }

    public function listar() {
        $zonaDAO = new ZonaDAO();
        return $zonaDAO->list();
    }

    public function buscarPorId($idZona) {
        return $this->zonaDAO->findById($idZona);
    }

    public function salvar($zona) {
        $this->zonaDAO->save($zona);
    }

    public function atualizar($zona) {
        $this->zonaDAO->update($zona);
    }

    public function excluir($zona) {
        $this->zonaDAO->delete($zona);
    }
}


?>