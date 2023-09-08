<?php
#Classe DAO para o model de personagem

#Classe DAO para o model de Personagem
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/EquipeModel.php");
include_once(__DIR__ . "/../models/ZonaModel.php");
include_once(__DIR__ . "/../models/PartidaModel.php");
include_once(__DIR__ . "/../models/UsuarioModel.php");

class PartidaDAO
{

    private const SQL_PARTIDA = "SELECT p.* FROM partida p";

    private function mapZonas($resultSql)
    {
        print_r("oiii");

        $zonas = array();
        foreach ($resultSql as $reg) :

            $zona = new Zona();
            $zona->setIdZona($reg['idZona']);
            $zona->setNomeZona($reg['nomeZona']);
            $zona->setQntdPlanta($reg['qntPlantas']);
            $zona->setPontosTotais($reg['pontoZona']);

            array_push($zonas, $zona);
        endforeach;

        return $zonas;
    }
    private function mapPartidas($resultSql)
    {

        $partidas = array();
        foreach ($resultSql as $reg) :

            $partida = new Partida();
            //$partida->setIdAdm($reg['idUsuario']);
            $partida->setIdPartida($reg['idPartida']);
            $partida->setNomePartida($reg['nomePartida']);
            $partida->setDataInicio($reg['dataInicio']);
            $partida->setDataFim($reg['dataFim']);
            $partida->setTempoPartida($reg['tempoPartida']);
            $partida->setSenha($reg['senhaPartida']);
            $partida->setLimiteJogadores($reg['limiteJogadores']);

            array_push($partidas, $partida);
        endforeach;

        return $partidas;
    }


    public function list()
    {
        $conn = Connection::getConn();
        $sql = "SELECT * FROM partida p ORDER BY p.idPartida";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapPartidas($result);
    }

    public function findById($idPartida)
    {
        $conn = Connection::getConn();

        $sql = PartidaDAO::SQL_PARTIDA .
            " WHERE p.idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);
        $result = $stmt->fetchAll();

        //Criar o objeto Partida
        $partidas = $this->mapPartidas($result);

        if (count($partidas) == 1)
            return $partidas[0];
        elseif (count($partidas) == 0)
            return null;
    }


    public function savePartida(Partida $partida)
    {
        $conn = Connection::getConn();

        $sql = "INSERT INTO partida (idUsuario, nomePartida, limiteJogadores, senhaPartida, tempoPartida) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $partida->getIdAdm(),
            $partida->getNomePartida(),
            $partida->getLimiteJogadores(),
            $partida->getSenha(),
            $partida->getTempoPartida(),
        ]);

        $idPartida = $conn->lastInsertId();
        $partida->setIdPartida($conn->lastInsertId());
        $this->saveEquipe($partida, $idPartida);
        $this->saveZona($partida, $idPartida);
    }

    public function saveEquipe(Partida $partida, $idPartida)
    {
        $conn = Connection::getConn();
        $equipes = $partida->getEquipes();

        foreach ($equipes as $equipe) {
            $sql = "INSERT INTO partida_equipe (idEquipe, idPartida) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $equipe,
                $idPartida,
            ]);
        };
        return;
    }

    public function saveUsuarioEquipe($idPartidaEquipe, $idUsuario)
    {

        var_dump($idPartidaEquipe);
        $conn = Connection::getConn();

        $sql = "INSERT INTO partida_usuario (idPartidaEquipe, idUsuario) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idPartidaEquipe,
            $idUsuario,
        ]);

        return;
    }

    public function findPartidaEquipe($idEquipe, $idPartida)
    {

        $conn = Connection::getConn();

        $sql = "SELECT * FROM partida_equipe WHERE idEquipe = ? AND idPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idEquipe,
            $idPartida,
        ]);

        // Obtenha o resultado da consulta
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifique se a consulta retornou algum resultado
        if ($result) {
            // O valor de 'idPartidaEquipe' está em $result['idPartidaEquipe']
            $idPartidaEquipe = $result['idPartidaEquipe'];
            return $idPartidaEquipe;
        } else {
            // A consulta não retornou resultados, faça o tratamento apropriado, como retornar um valor padrão ou lançar uma exceção.
            return null; // Ou outra ação apropriada
        }
    }

    public function usuarioInEquipe($idUsuario)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM partida_usuario pu WHERE pu.idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idUsuario
        ]);

        $result = $stmt->fetchAll();
        if (count($result) >= 1)
            return true;
        else {
            return null;
        }
    }



    public function findByLoginSenha(string $IdPartida, string $Senha)
    {
        $conn = Connection::getConn();
        $sql = PartidaDAO::SQL_PARTIDA . " WHERE idPartida = ? AND senhaPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$IdPartida, $Senha]);
        $result = $stmt->fetchAll();

        $partidas = $this->mapPartidas($result);

        if (count($partidas) === 1) {
            return $partidas[0];
        }

        return null;
    }

    public function enterRoom($idPartida, $Senha)
    {

        $partida = $this->findByLoginSenha($idPartida, $Senha);

        if ($partida !== null) {
            return true;
        } else {
            return false;
        }
    }


    public function saveZona(Partida $partida, $idPartida)
    {
        $conn = Connection::getConn();
        $zonas = $partida->getZonas();

        foreach ($zonas as $zona) {
            $sql = "INSERT INTO partida_zona (idZona, idPartida) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $zona,
                $idPartida,
            ]);
        };
    }

    public function update(Planta $planta)
    {
        $conn = Connection::getConn();

        $sql = "UPDATE planta SET nomeSocial = ?, codQR = ?, codNumerico = ?, pontuacaoPlanta = ?, historia = ?, imagemPlanta = ?, idZona = ?, idEspecie = ?, idUsuario = ? WHERE idPlanta = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $planta->getNomeSocial(), $planta->getQrCode(), $planta->getCodNumerico(),
            $planta->getPontos(), $planta->getPlantaHistoria(), $planta->getImagemPlanta(), $planta->getZona()->getIdZona(), $planta->getEspecie()->getIdEspecie(), $planta->getUsuario()->getIdUsuario(), $planta->getIdPlanta()
        ]);
    }


    public function delete(Planta $planta)
    {
        $conn = Connection::getConn();


        $sql = "DELETE FROM planta WHERE idPlanta = ?";
        $arquivo_del = $planta->getImagemPlanta();
        if (file_exists($arquivo_del)) {
            unlink($arquivo_del);
        }
        $qrcode_del = $planta->getQrCode();
        if (file_exists($qrcode_del)) {
            unlink($qrcode_del);
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$planta->getIdPlanta()]);
    }

    public function deleteImage($idPlanta)
    {
        $plantaCont = new PlantaController();
        $planta = $plantaCont->buscarPorId($idPlanta);

        $img_del = $planta->getImagemPlanta();
        if (file_exists($img_del)) {
            unlink($img_del);
        }
    }
}
