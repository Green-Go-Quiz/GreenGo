<?php
#Nome do arquivo: config.php
#Objetivo: define constantes para serem utilizadas no projeto

//Banco de dados: conexão MySQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'green_go');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

//Caminho para adionar imagens, scripts e chamar páginas no sistema
//Deve ter o nome da pasta do projeto no servidor APACHE
define('BASEURL', '/GreenGo/app');

//Nome do sistema
define('APP_NAME', 'Template do Projeto Integrador');

//Página inicial do sistema
define('HOME_PAGE', BASEURL . '/controller/HomeController.php?action=home');

//Página de logout do sistema
define('LOGIN_PAGE', BASEURL . '/controller/LoginController.php?action=login');

//Página de login do sistema
define('LOGOUT_PAGE', BASEURL . '/controller/LoginController.php?action=logout');

//Sessão do usuário
define('SESSAO_USUARIO_ID', "usuarioLogadoId");
define('SESSAO_USUARIO_NOME', "usuarioLogadoNome");
define('SESSAO_USUARIO_PAPEIS', "usuarioLogadoPapeis");

//Caminho do diretório para salvar imagens
define('PATH_ARQUIVOS', __DIR__ . '/../../arquivos');
define('BASEURL_ARQUIVOS', BASEURL . '/../arquivos');
define('BASEURL_LOGO_PROJETO',BASEURL .'/../logo');
