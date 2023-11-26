<?php

include_once(__DIR__ . "/../../controllers/LoginController.php");
include_once(__DIR__ . "/../../models/UsuarioModel.php");


$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = new Usuario;
$usuario->setLogin($email);
$usuario->setSenha($senha);


$loginCont = new LoginController;
$loginCont->logar($usuario);
