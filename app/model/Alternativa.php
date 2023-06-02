<?php
#Nome do arquivo: Alternativa.php
#Objetivo: classe Model para Alternativa

class campos_alternativa {
    private $idAlternativa;
    private $descricaoResposta;
    private $respostaCerta;
    private $idQuestao;
    
    // Getters e Setters
    public function getIdAlternativa() {
        return $this->idAlternativa;
    }
    
    public function setIdAlternativa($idAlternativa) {
        $this->idAlternativa = $idAlternativa;
    }
    
    public function getDescricaoResposta() {
        return $this->descricaoResposta;
    }
    
    public function setDescricaoResposta($descricaoResposta) {
        $this->descricaoResposta = $descricaoResposta;
    }
    
    public function getRespostaCerta() {
        return $this->respostaCerta;
    }
    
    public function setRespostaCerta($respostaCerta) {
        $this->respostaCerta = $respostaCerta;
    }
    
    public function getIdQuestao() {
        return $this->idQuestao;
    }
    
    public function setIdQuestao($idQuestao) {
        $this->idQuestao = $idQuestao;
    }
}
