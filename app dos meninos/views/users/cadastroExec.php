<?php

include_once(__DIR__."/../../models/UsuarioModel.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");

$nomeUsuario = $_POST["field_nome"];
$login = $_POST['field_login'];
$email = $_POST['field_email'];
$senha = $_POST['field_password'];
$genero = $_POST['field_genero'];
$escolaridade = $_POST['field_escolaridade'];
$tipoUsuario = $_POST['aluno'];

//$senhaEsconde = $senha;
//$hashSenha = password_hash($senhaEsconde, PASSWORD_DEFAULT);

$usuario = new Usuario();
$usuario->setNomeUsuario($nomeUsuario);
$usuario->setLogin($login);
$usuario->setEmail($email);
$usuario->setSenha($senha);
$usuario->setGenero($genero);
$usuario->setEscolaridade($escolaridade);
$usuario->setTipoUsuario($tipoUsuario);

$usuarioCont = new UsuarioController();
$usuarioCont->salvar($usuario);

header("location: login.php");
?>