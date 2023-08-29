<?php
#Classe DAO para o model de personagem
#Classe DAO para o model de Personagem
include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/UsuarioModel.php");
class UsuarioDAO
{
    private const SQL_USUARIO = "SELECT * FROM usuario u";

    private function mapUsuarios($resultSql)
    {
        $usuarios = array();
        foreach ($resultSql as $reg) :

            $usuario = new Usuario();
            $usuario->setIdUsuario($reg['idUsuario']);
            $usuario->setLogin($reg['loginUsuario']);
            $usuario->setNomeUsuario($reg['nomeUsuario']);
            $usuario->setGenero($reg['genero']);
            $usuario->setEmail($reg['email']);
            $usuario->setEscolaridade($reg['escolaridade']);
            $usuario->setSenha($reg['senha']);
            $usuario->setTipoUsuario($reg['tipoUsuario']);
            array_push($usuarios, $usuario);
        endforeach;
        return $usuarios;
    }

    public function list()
    {
        $conn = Connection::getConn();
        $sql = UsuarioDAO::SQL_USUARIO .
            " ORDER BY u.nomeUsuario";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapUsuarios($result);
    }

    public function findById($idUsuario)
    {
        $conn = Connection::getConn();
        $sql = UsuarioDAO::SQL_USUARIO .
            " WHERE u.idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idUsuario]);
        $result = $stmt->fetchAll();
        //Criar o objeto Planta
        $usuarios = $this->mapUsuarios($result);
        if (count($usuarios) == 1)
            return $usuarios[0];
        elseif (count($usuarios) == 0)
            return null;
        die("UsuarioDAO.findById - Erro: mais de um usuario" .
            " encontrado para o ID " . $idUsuario);
    }

    public function findByLoginSenha(string $login, string $senha)
    {
        $conn = Connection::getConn();
        $sql = UsuarioDAO::SQL_USUARIO . " WHERE (email = ? OR loginUsuario = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$login, $login]);
        $result = $stmt->fetchAll();


        $usuarios = $this->mapUsuarios($result);

        foreach ($usuarios as $usuario) {
            $hashSenhaArmazenada = $usuario->getSenha();
            if (password_verify($senha, $hashSenhaArmazenada)) {
                return $usuarios[0];
            } else {
                return null;;
            }
        }
    }

    public function logon(Usuario $usuario)
    {
        $email_or_login = $usuario->getLogin();
        $senha = $usuario->getSenha();

        $usuario = $this->findByLoginSenha($email_or_login, $senha);
        if ($usuario == null) {
            $aviso = "E-mail ou Senha incorretos!!!";
            header('location: login.php?aviso=' . urlencode($aviso));
            exit;
        } else {
            $this->createSession($usuario);
        }
    }

    public function createSession(Usuario $usuario)
    {

        session_start();
        $_SESSION['ID'] = $usuario->getIdUsuario();
        $_SESSION['NOME'] = $usuario->getNomeUsuario();
        $_SESSION['TIPO'] = $usuario->getTipoUsuario();

        $tipo = $usuario->getTipoUsuario();



        if ($tipo == 1) {
            header("location: ../indexJOG.php");
        } else if ($tipo == 2) {
            header("location: ../indexADM.php");
        } else {
            echo ("implementar professor!");
        }
    }

    public function manterSessaoADM($nomeADM)
    {
        session_start();

        if (isset($_SESSION['adm'])) {
            $nomeADM = $_SESSION['adm'];
        } else if (isset($_SESSION['normal'])) {
            header("location: users/login.php");
        } else if (!isset($_SESSION['adm']) && !isset($_SESSION['normal'])) {
            header("Location: users/login.php");
            exit;
        }
    }

    public function logoutInd($nomeADM)
    {
        session_start();

        session_destroy();
        header("Location: users/login.php");
    }

    public function logout($nomeADM)
    {
        session_start();

        session_destroy();
        header("Location: ../users/login.php");
    }

    public function save(Usuario $usuario)
    {
        $conn = Connection::getConn();
        $sql = "INSERT INTO usuario (nomeUsuario, loginUsuario, senha, email, genero, tipoUsuario, escolaridade)" .
            " VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $usuario->getNomeUsuario(), $usuario->getLogin(), $usuario->getSenha(), $usuario->getEmail(),
            $usuario->getGenero(), $usuario->getTipoUsuario(), $usuario->getEscolaridade()
        ]);
    }

    public function update(Usuario $usuario)
    {
        $conn = Connection::getConn();

        $sql = "UPDATE usuario SET nomeUsuario = ?, loginUsuario = ?, senha = ?, email = ?, genero = ?, tipoUsuario = ?, escolaridade = ? WHERE idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $usuario->getNomeUsuario(), $usuario->getLogin(), $usuario->getSenha(), $usuario->getEmail(),
            $usuario->getGenero(), $usuario->getTipoUsuario(), $usuario->getEscolaridade(), $usuario->getIdUsuario()
        ]);
    }

    public function delete(Usuario $usuario)
    {
        $conn = Connection::getConn();

        $sql = "DELETE FROM usuario WHERE idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario->getIdUsuario()]);
    }
}
