<?php
#Classe de controller para planta

include_once(__DIR__."/../dao/PlantaDAO.php");

class PlantaController {

    private $plantaDAO;

    public function __construct() {
        $this->plantaDAO = new PlantaDAO();
    }

    public function listar() {
        return $this->plantaDAO->list();
    }

    public function buscarPorId($idPlanta) {
        return $this->plantaDAO->findById($idPlanta);
    }

    public function buscarPorCodigo($CodNumerico) {
        return $this->plantaDAO->findByCod($CodNumerico);
    }

    public function salvar($planta) {
        $this->plantaDAO->save($planta);
    }

    public function atualizar($planta) {
        $this->plantaDAO->update($planta);
    }

    public function excluir($planta) {
        $this->plantaDAO->delete($planta);
    }
}

?>



