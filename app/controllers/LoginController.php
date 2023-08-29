<?php
#Classe de controller para especie
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once(__DIR__ . "/../util/config.php");

include_once(__DIR__ . "/../dao/UsuarioDAO.php");

class LoginController
{

    private $usuarioDAO;

    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function logar($usuario)
    {
        $this->usuarioDAO->logon($usuario);
    }

    public static function manterUsuario()
    {

        session_start();

        $nomeADM = $_SESSION['NOME'];
        $idADM = $_SESSION['ID'];
        $tipoUsuario = $_SESSION['TIPO'];
    }

    public static function sair()
    {
        session_start();

        session_write_close();
        header("Location: login.php");
    }

    public static function verificarAcesso($allowedTypes)
    {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['ID'])) {
            $nologin = "Você precisa se conectar primeiro!";
            header('location: ../users/login.php?aviso=' . urlencode($nologin));;
            exit;
        }

        $tipoUsuario = $_SESSION['TIPO'];

        if (!in_array($tipoUsuario, $allowedTypes)) {
            header("location: ../home/erro.php");
            exit;
        }
    }
}
