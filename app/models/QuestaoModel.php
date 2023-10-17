<?php
#Nome do arquivo: Questao.php
#Objetivo: classe Model para Questao
use Intervention\Image\ImageManagerStatic as Image;

class Questao
{

    private $idQuestao;
    private $descricaoQ;
    private $grauDificuldade;
    private $pontuacao;
    private $imagem;

    private $alternativas; //Campo que armazena um array de objetos Alternativa


    /**
     * Get the value of idPergunta
     */
    public function getIdQuestao()
    {
        return $this->idQuestao;
    }

    public function setIdQuestao($idQuestao)
    {
        $this->idQuestao = $idQuestao;

        return $this;
    }

    /**
     * Get the value of descricaoP
     */
    public function getDescricaoQ()
    {
        return $this->descricaoQ;
    }

    /**
     * Set the value of descricaoP
     *
     * @return  self
     */
    public function setDescricaoQ($descricaoQ)
    {
        $this->descricaoQ = $descricaoQ;

        return $this;
    }

    /**
     * Get the value of grauDificuldade
     */
    public function getGrauDificuldade()
    {
        return $this->grauDificuldade;
    }

    public function getGrauDificuldadeTexto()
    {
        $grau = '';
        if ($this->grauDificuldade == 'facil')
            $grau = 'Fácil';
        elseif ($this->grauDificuldade == 'medio')
            $grau = 'Médio';
        elseif ($this->grauDificuldade == 'dificil')
            $grau = 'Difícil';

        return $grau;
    }

    /**
     * Set the value of grauDificuldade
     *
     * @return  self
     */
    public function setGrauDificuldade($grauDificuldade)
    {
        $this->grauDificuldade = $grauDificuldade;

        return $this;
    }

    /**
     * Get the value of pontuacao
     */
    public function getPontuacao()
    {
        return $this->pontuacao;
    }

    /**
     * Set the value of pontuacao
     *
     * @return  self
     */
    public function setPontuacao($pontuacao)
    {
        $this->pontuacao = $pontuacao;

        return $this;
    }

    /**
     * Get the value of imagem
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }


    public function getImagemPequena()
    {
        if ($this->imagem) {
            $imagem = Image::make($this->imagem);
            $imagem->fit(25, 25); // Redimensiona a imagem para 25x25 pixels
            return $imagem->response();
        }
        return null;
    }



    /**
     * Get the value of alternativas
     */
    public function getAlternativas()
    {
        return $this->alternativas;
    }

    public function getAlternativasTexto()
    {
        $str = "";
        foreach ($this->alternativas as $alt) {
            $str .= $alt->getDescricaoAlternativa() . "\n";
        }

        $str = trim($str);
        return str_replace("\n", "<br>", $str);
    }

    /**
     * Set the value of alternativas
     *
     * @return  self
     */
    public function setAlternativas($alternativas)
    {
        $this->alternativas = $alternativas;

        return $this;
    }


    public function getAlternativaCertaTexto()
    {
        $alternativas = $this->getAlternativas();
        foreach ($alternativas as $alternativa) {
            if ($alternativa->getAlternativaCerta() == 1) {
                return $alternativa->getDescricaoAlternativa();
            }
        }
        return "Nenhuma alternativa correta definida.";
    }

    public function isAlternativaCerta($idx)
    {
        $alternativas = $this->getAlternativas();
        if (isset($alternativas[$idx]) and $alternativas[$idx]->getAlternativaCerta())
            return true;

        return false;
    }

    public function isAlternativaCertaById($idAlternativa)
    {
        $alternativas = $this->getAlternativas();
        foreach ($alternativas as $alt) {
            if ($alt->getIdAlternativa() == $idAlternativa)
                return $alt->getAlternativaCerta();
        }

        return false;
    }

    public function getAlternativasTextoTratada()
    {
        $textoAlternativas = "";
        $icone = "﹡";

        foreach ($this->alternativas as $alternativa) {
            $textoAlternativas .= $icone . $alternativa->getDescricaoAlternativa() . ";<br>";
        }

        $textoAlternativas = rtrim($textoAlternativas, "; ");
        if (strlen($textoAlternativas) > 150) {
            // Trunca a descrição para 125 caracteres e adiciona três pontos (...).
            $textoAlternativas = substr($textoAlternativas, 0, 100) . '...';
        }

        return $textoAlternativas;
    }

    public function getAlternativaCertaTextoTratada()
    {
        $alternativas = $this->getAlternativas();
        $icone = "﹡";

        foreach ($alternativas as $alternativa) {
            if ($alternativa->getAlternativaCerta() == 1) {
                return $icone . $alternativa->getDescricaoAlternativa();
            }
        }
        return "Nenhuma alternativa correta definida.";
    }

    public function getDescricaoQTruncada()
    {
        $descricao = $this->descricaoQ;

        // Verifica se a descrição é maior que 125 caracteres
        if (strlen($descricao) > 50) {
            // Trunca a descrição para 125 caracteres e adiciona três pontos (...).
            $descricao = substr($descricao, 0, 50) . '...';
        }

        return $descricao;
    }
}
