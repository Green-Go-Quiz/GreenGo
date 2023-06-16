<?php
#Nome do arquivo: config.php
#Objetivo: define constantes para serem utilizadas no projeto

//Banco de dados: conexão MySQL
define('DB_HOST', 'mysql-server');
define('DB_NAME', 'greengo');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

//Caminho para adionar imagens, scripts e chamar páginas no sistema
//Deve ter o nome da pasta do projeto no servidor APACHE
define('BASEURL', '/php/Green-Go---Game/app');

//Nome do sistema
define('APP_NAME', 'Green Go');

//Página inicial do sistema
define('HOME_PAGE_ALUNO', BASEURL . '/controllers/HomeController.php?action=homeAluno');

//Página de login do sistema
define('LOGIN_PAGE', BASEURL . '/controllers/LoginController.php?action=login');

//Página de logout do sistema
define('LOGOUT_PAGE', BASEURL . '/controllers/LoginController.php?action=logout');

//Sessão do usuário
define('SESSAO_USUARIO_ID', "usuarioLogadoId");
define('SESSAO_USUARIO_NOME', "usuarioLogadoNome");
define('SESSAO_USUARIO_PAPEIS', "usuarioLogadoPapeis");



?>