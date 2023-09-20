-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2023 às 14:55
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

/*SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
*/

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `greengo`
--

-- --------------------------------------------------------
--
-- Estrutura da tabela `usuario`
--
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) DEFAULT NULL,
  `genero` varchar(20) NOT NULL,
  `escolaridade` varchar(20) NOT NULL,
  `loginUsuario` varchar(30) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipoUsuario` tinyint(1) NOT NULL /*1=NORMAL, 2=ADM, 3=PROFESSOR*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;

--
-- Extraindo dados da tabela `usuario`
--

/*INSERT INTO `usuario` (`nomeUsuario`, `genero`, `escolaridade`, `loginUsuario`, `email`, `senha`, `tipoUsuario`) VALUES
('Gabriel', 'Masculino', 'Ensino Superior', 'mandelas', 'gabriel.mandellicardoso@gmail.com', '12345678', 1),
('gabriel', 'Masculino', 'Ensino Médio', 'gabriel', 'gabriel.mandellicardoso@gmail.com', 'eu12345678', 1);

INSERT INTO `usuario` ( `nomeUsuario`, `genero`, `escolaridade`, `loginUsuario`, `email`, `senha`, `tipoUsuario`) VALUES
('Juliana', 'Feminino', 'Ensino Superior', 'juuj', 'juujsantana@gmail.com', '12345678', 2);
*/

INSERT INTO `usuario` (`nomeUsuario`, `genero`, `escolaridade`, `loginUsuario`, `email`, `senha`, `tipoUsuario`) VALUES
('Professor', 'Masculino', 'Ensino Superior', 'professor', 'professor@gmail.com', '$2y$10$HG1poKhwizbPOSOxWSfCj.3d8OQOqIwKv96NR3zVPI5ECNkpUk2gG', 3),
('Adm', 'Masculino', 'Ensino Superior', 'adm', 'adm@gmail.com', '$2y$10$HG1poKhwizbPOSOxWSfCj.3d8OQOqIwKv96NR3zVPI5ECNkpUk2gG', 2),
('Jogador', 'Masculino', 'Ensino Médio', 'jogador', 'jogador@gmail.com', '$2y$10$HG1poKhwizbPOSOxWSfCj.3d8OQOqIwKv96NR3zVPI5ECNkpUk2gG', 1);

--- a senha pra entra é 123 ------

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `idEquipe` int(11) NOT NULL,
  `nomeEquipe` varchar(100) NOT NULL,
  `codEntrada` int(11) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `icone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Índices para tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`);

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idEquipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;  
--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `nomeEquipe`, `codEntrada`, `cor`, `icone`) VALUES
(1, 'tste', 2323, '#e81111', '../../public/icon/samambaia_icon.png'),
(2, 'aasdsd', 222, '#faf200', '../../public/icon/arvore_icon.png'),
(3, 'aasdsd', 323, '#926363', '../../public/icon/arvore_icon.png'),
(4, 'eeee', 222, '#800000', '../../public/icon/samambaia_icon.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe_usuario`
--

CREATE TABLE `equipe_usuario` (
  `idEquipeUsuario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEquipe` int(11) NOT NULL,
  PRIMARY KEY (idEquipeUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Limitadores para a tabela `equipe_usuario`
--
ALTER TABLE `equipe_usuario`
  ADD CONSTRAINT `fk_equipe_usuario` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`),
  ADD CONSTRAINT `fk_usuario_equipe` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

-- --------------------------------------------------------

--
-- Estrutura da tabela `especie`
--

CREATE TABLE `especie` (
  `idEspecie` int(11) NOT NULL,
  `nomePop` varchar(100) NOT NULL,
  `nomeCie` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `imagemEspecie` varchar(200) NOT NULL,
  `frutifera` tinyint(1) NOT NULL,
  `comestivel` tinyint(1) NOT NULL,
  `raridade` tinyint(1) NOT NULL,
  `medicinal` tinyint(1) NOT NULL,
  `toxidade` tinyint(1) NOT NULL,
  `exotica` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idEspecie`);

--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `idEspecie` int(11) NOT NULL AUTO_INCREMENT;  

--
-- Extraindo dados da tabela `especie`
--

INSERT INTO `especie` (`nomePop`, `nomeCie`, `descricao`, `imagemEspecie`, `frutifera`, `comestivel`, `raridade`, `medicinal`, `toxidade`, `exotica`) VALUES
('Cactus', 'Cactus cientifucsio', '<p>Cactus é mto foda tem espinho</p>', '../../public/especies/73052c0da5a25dae226e7271b5b1c3c5.jpg', 1, 1, 0, 0, 0, 0),
('Caladium', 'Caladium cientificus', '<p>verdi e rosa</p>', '../../public/especies/aa60c077117e999ed73341dec33d65ee.jpg', 0, 0, 0, 0, 0, 1),
('Suculenta', 'Muito suculenta', '<p>da vontade de comer só pelo nome</p>', '../../public/especies/0b4b84181c96962a563210e11b41a9d9.jpg', 0, 1, 0, 1, 0, 0),
('Vitoria Regia', 'Vitoria Regia', '<p>Onde os sapos ficam</p>', '../../public/especies/d9954a1e1c365a086ecbb3ca34e72c41.jpg', 0, 0, 0, 0, 0, 1);


-- --------------------------------------------------------

--
-- Estrutura da tabela `zona`
--

CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `nomeZona` varchar(60) NOT NULL,
  `qntPlantas` int(11) DEFAULT NULL,
  `pontoZona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabela `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`);

--
-- AUTO_INCREMENT de tabela `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT;


--
-- Extraindo dados da tabela `zona`
--

INSERT INTO `zona` (`nomeZona`, `qntPlantas`, `pontoZona`) VALUES
('Zona Deserto', NULL, NULL),
('Zona Franca', NULL, NULL),
('Zona Teste', NULL, NULL);


-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estrutura da tabela `planta`
--

CREATE TABLE `planta` (
  `idPlanta` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idEspecie` int(11) NOT NULL,
  `codNumerico` int(11) NOT NULL,
  `imagemPlanta` varchar(200) NOT NULL,
  `pontuacaoPlanta` int(4) NOT NULL,
  `codQR` varchar(5000) NOT NULL,
  `nomeSocial` varchar(60) NOT NULL,
  `historia` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Índices para tabela `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`idPlanta`),
  ADD KEY `idZona` (`idZona`),
  ADD KEY `fkEspecie` (`idEspecie`);

--
-- AUTO_INCREMENT de tabela `planta`
--
ALTER TABLE `planta`
  MODIFY `idPlanta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Extraindo dados da tabela `planta`
--

INSERT INTO `planta` (`idZona`, `idEspecie`, `codNumerico`, `imagemPlanta`, `pontuacaoPlanta`, `codQR`, `nomeSocial`, `historia`) VALUES
(1, 1, 1000, '../../public/plantas/524f302af15ee8555116eb4e487e611b.jpg', 10, '../../public/qrcode/qrcode_1000.png', 'Ana Terra', '<p>Ana Terra História</p>'),
(1, 1, 1001, '../../public/plantas/2dd08102476f925c50224eb0f867b4d0.jpg', 10, '../../public/qrcode/qrcode_1001.png', 'Teste', '<p>teste</p>'),
(1, 1, 30, '../../public/plantas/ea814b9af8efe2f61671059aa10f8130.jpg', 30, '../../public/qrcode/qrcode_30.png', 'Teste 31 05', '<p>AAA</p>');


--
-- Limitadores para a tabela `planta`
--
ALTER TABLE `planta`
  ADD CONSTRAINT `fkEspecie` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkZona` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`) ON DELETE CASCADE;



-- -----------------------------------------------------
-- Nossas tabelas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `green_go`.`questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `questao` (
  `idQuestao` INT NOT NULL AUTO_INCREMENT,
  `descricaoQ` VARCHAR(200) NOT NULL,
  `grauDificuldade` ENUM("facil", "medio", "dificil") NOT NULL,
  `pontuacao` INT NOT NULL,
  `imagem` VARCHAR(255) NULL,
  PRIMARY KEY (`idQuestao`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `green_go`.`alternativa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `alternativa` (
  `idAlternativa` INT NOT NULL AUTO_INCREMENT,
  `descricaoAlternativa` VARCHAR(200) NOT NULL,
  `alternativaCerta` TINYINT NOT NULL,
  `idQuestao` INT NOT NULL,
  PRIMARY KEY (`idAlternativa`),
  CONSTRAINT `fk_alternativa_questao1`
    FOREIGN KEY (`idQuestao`)
    REFERENCES `questao` (`idQuestao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `green_go`.`resposta_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resposta_usuario` (
  `idResposta` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `idQuestao` INT NOT NULL,
  `idAlternativaEscolhida` INT NOT NULL,
  `acertou` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idResposta`),
  CONSTRAINT `fk_resp_usua_usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resp_usua_alternativa1`
    FOREIGN KEY (`idAlternativaEscolhida`)
    REFERENCES `alternativa` (`idAlternativa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resp_usua_questao1`
    FOREIGN KEY (`idQuestao`)
    REFERENCES `questao` (`idQuestao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `green_go`.`questao_especie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `questao_especie` (
  `idQuestaoEspecie` INT NOT NULL AUTO_INCREMENT,
  `idEspecie` INT NOT NULL,
  `idQuestao` INT NOT NULL,
  PRIMARY KEY (`idQuestaoEspecie`),
 CONSTRAINT `fk_idEspecie`
    FOREIGN KEY (`idEspecie`)
    REFERENCES `especie` (`idEspecie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idQuestao`
    FOREIGN KEY (`idQuestao`)
    REFERENCES `questao` (`idQuestao`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `green_go`.`quiz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz` (
  `idQuiz` INT NOT NULL AUTO_INCREMENT,
  `maximoPergunta` INT NOT NULL,
  `nomeQuiz` VARCHAR(45) NOT NULL,
  `comTempo` TINYINT NOT NULL,
  `quantTempo` INT NOT NULL,
  `idZona` INT NOT NULL,
  PRIMARY KEY (`idQuiz`),
  CONSTRAINT `fk_quizzona`
    FOREIGN KEY (`idZona`)
    REFERENCES `zona` (`idZona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION) 
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `green_go`.`quiz_has_questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_questoes` (
  `idQuizQuestoes` INT NOT NULL AUTO_INCREMENT,
  `idQuiz` INT NOT NULL,
  `idQuestao` INT NOT NULL,
  PRIMARY KEY (`idQuizQuestoes`),
  CONSTRAINT `fk_quiz_questao`
    FOREIGN KEY (`idQuiz`)
    REFERENCES `quiz` (`idQuiz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_quiz_questao2`
    FOREIGN KEY (`idQuestao`)
    REFERENCES `questao` (`idQuestao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

ALTER TABLE quiz_questoes ADD CONSTRAINT uk_quiz_questao UNIQUE(idQuiz, idQuestao);

--
-- Estrutura para tabela `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
  `idEquipe` int(11) NOT NULL,
  `nomeEquipe` varchar(100) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `icone` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Fazendo dump de dados para tabela `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `nomeEquipe`, `cor`, `icone`) VALUES
(9, 'Cacto', '#51a97b', '../../public/icon/cacto_icon.png'),
(10, 'Florzinha', '#ee6d87', '../../public/icon/flor_icon.png'),
(11, 'Árvore', '#000000', '../../public/icon/arvore_icon.png'),
(12, 'Planta no Vaso', '#38998d', '../../public/icon/samambaia_icon.png');

--
-- Índices de tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`);

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idEquipe` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;

--
-- Estrutura para tabela `equipe_usuario`
--

CREATE TABLE IF NOT EXISTS `equipe_usuario` (
  `idEquipeUsuario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEquipe` int(11) NOT NULL,
  `pontuacaoUsuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices de tabela `equipe_usuario`
--
ALTER TABLE `equipe_usuario`
  ADD KEY `fk_usuario_equipe` (`idUsuario`), ADD KEY `fk_equipe_usuario` (`idEquipe`);

-- Restrições para tabelas `equipe_usuario`
--
ALTER TABLE `equipe_usuario`
ADD CONSTRAINT `fk_equipe_usuario` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`),
ADD CONSTRAINT `fk_usuario_equipe` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Estrutura para tabela `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `idPartida` int(11) NOT NULL,
  `dataInicio` datetime DEFAULT NULL,
  `dataFim` datetime DEFAULT NULL,
  `limiteJogadores` int(11) NOT NULL,
  `tempoPartida` int(11) NOT NULL,
  `nomePartida` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senhaPartida` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `statusPartida` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `partida`
--

INSERT INTO `partida` (`idPartida`, `dataInicio`, `dataFim`, `limiteJogadores`, `tempoPartida`, `nomePartida`, `senhaPartida`, `statusPartida`) VALUES
(31, NULL, NULL, 20, 20, 'Partida', '123', 1),
(32, NULL, '2023-08-28 20:24:08', 20, 20, 'Partida', '123', 1),
(33, NULL, NULL, 22, 12, 'Partida', '123', 1);

--
-- Índices de tabela `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`idPartida`);

ALTER TABLE `partida`
  MODIFY `idPartida` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--

--
-- Estrutura para tabela `partida_equipe`
--

CREATE TABLE IF NOT EXISTS `partida_equipe` (
  `idPartidaEquipe` int(11) NOT NULL,
  `idEquipe` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `pontuacaoEquipe` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `partida_equipe`
--

INSERT INTO `partida_equipe` (`idPartidaEquipe`, `idEquipe`, `idPartida`, `pontuacaoEquipe`) VALUES
(24, 11, 31, NULL),
(25, 9, 31, NULL),
(26, 11, 32, NULL),
(27, 10, 32, NULL),
(28, 10, 33, NULL);

--
-- Índices de tabela `partida_equipe`
--
ALTER TABLE `partida_equipe`
  ADD PRIMARY KEY (`idPartidaEquipe`), ADD KEY `fk_equipe_partida` (`idEquipe`), ADD KEY `fk_partida_equipe` (`idPartida`);

-- AUTO_INCREMENT de tabela `partida_equipe`
--
ALTER TABLE `partida_equipe`
  MODIFY `idPartidaEquipe` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;

  --
-- Restrições para tabelas `partida_equipe`
--
ALTER TABLE `partida_equipe`
ADD CONSTRAINT `fk_equipe_partida` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`),
ADD CONSTRAINT `fk_partida_equipe` FOREIGN KEY (`idPartida`) REFERENCES `partida` (`idPartida`);

-- --------------------------------------------------------

--
-- Estrutura para tabela `partida_zona`
--

CREATE TABLE IF NOT EXISTS `partida_zona` (
  `idPartidaZona` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `idZona` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `partida_zona`
--

INSERT INTO `partida_zona` (`idPartidaZona`, `idPartida`, `idZona`) VALUES
(23, 31, 35),
(24, 31, 34),
(25, 32, 34),
(26, 32, 36),
(27, 33, 35);

--
-- Índices de tabela `partida_zona`
--
ALTER TABLE `partida_zona`
  ADD PRIMARY KEY (`idPartidaZona`), ADD KEY `fk_zona_partida` (`idZona`), ADD KEY `fk_partida_zona` (`idPartida`);

--
-- AUTO_INCREMENT de tabela `partida_zona`
--
ALTER TABLE `partida_zona`
  MODIFY `idPartidaZona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;

--
-- Restrições para tabelas `partida_zona`
--
ALTER TABLE `partida_zona`
ADD CONSTRAINT `fk_partida_zona` FOREIGN KEY (`idPartida`) REFERENCES `partida` (`idPartida`),
ADD CONSTRAINT `fk_zona_partida` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`);


-- -----------------------------------------------------
-- Table `greengo`.`partida_quiz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `partida_quiz` (
  `idPartidaQuiz` INT NOT NULL AUTO_INCREMENT,
  `idPartida` INT NOT NULL,
  `idQuiz` INT NOT NULL,
  PRIMARY KEY (`idPartidaQuiz`),
  CONSTRAINT `fk_partida_has_quiz_partida1`
    FOREIGN KEY (`idPartida`)
    REFERENCES `partida` (`idPartida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_partida_has_quiz_quiz1`
    FOREIGN KEY (`idQuiz`)
    REFERENCES `quiz` (`idQuiz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

ALTER TABLE partida_quiz ADD CONSTRAINT uk_partida_quiz UNIQUE(idPartida, idQuiz);

-- -----------------------------------------------------
-- POPULARIZANDO O BANCO
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Questões e alternativas
-- -----------------------------------------------------

INSERT INTO `questao` (`idQuestao`, `descricaoQ`, `grauDificuldade`, `pontuacao`, `imagem`) VALUES
(100, 'Qual é a função das raízes das plantas?', 'facil', 5, NULL),
(200, 'Onde ocorre a fotossíntese nas plantas?', 'facil', 5, NULL),
(300, 'Qual é o nome da estrutura das plantas responsável pela absorção de água e nutrientes do solo?', 'facil', 5, NULL),
(400, 'O que é a clorofila?', 'facil', 5, NULL);


INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Absorver luz solar', 0, 100,
('Produzir flores', 0, 100),
('Armazenar água', 0, 100),
('Absorver água e nutrientes do solo', 1, 100);

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Nas folhas', 1, 200),
('Nas raízes', 0, 200),
('No caule', 0, 200),
('Nos frutos', 0, 200);

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Folha', 0, 300),
('Raiz', 1, 300),
('Caule', 0, 300),
('Flor', 0, 300);

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Um tipo de fungo', 0, 400),
('Um pigmento verde presente nas plantas', 1, 400),
('Uma parte das raízes das plantas', 0, 400),
('Um tipo de inseto', 0, 400);

INSERT INTO `questao` (`idQuestao`, `descricaoQ`, `grauDificuldade`, `pontuacao`, `imagem`) VALUES
(500, 'O que é a polinização cruzada nas plantas?', 'medio', 10, NULL),
(600, 'Quais são os principais tipos de tecidos em uma planta?', 'medio', 10, NULL),
(700, 'O que são plantas carnívoras e como elas obtêm nutrientes?', 'medio', 10, 'imagem_c6ad72da-c271-deee-d1fd-6951b23cde6b.jpg'),
(800, 'Explique o ciclo de vida de uma planta com flores.', 'medio', 10, NULL);


INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('A polinização de uma planta por outra da mesma espécie', 0, 500),
('A polinização de uma planta por outra de espécies diferentes', 1, 500),
('A polinização de uma planta por vento', 0, 500),
('A polinização de uma planta por insetos', 0, 500);

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Tecido epitelial e tecido conjuntivo', 0, 600),
('Tecido vascular e tecido muscular', 0, 600),
('Tecido meristemático e tecido permanente', 1, 600),
('Tecido ósseo e tecido nervoso', 0, 600);

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Plantas que se alimentam de outras plantas', 1, 700),
('Plantas que não realizam fotossíntese', 0, 700),
('Plantas que vivem em desertos', 0, 700),
('Plantas que não têm raízes', 0, 700);


INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('As plantas com flores não têm um ciclo de vida definido', 0, 800),
('O ciclo de vida de uma planta com flores inclui apenas as fases de semente e adulta', 0, 800),
('O ciclo de vida de uma planta com flores inclui as fases de semente, germinação, crescimento vegetativo, floração, polinização, frutificação e dispersão de sementes', 1, 800),
('O ciclo de vida de uma planta com flores consiste em apenas três fases: germinação, crescimento e reprodução', 0, 800);




INSERT INTO `questao` (`idQuestao`, `descricaoQ`, `grauDificuldade`, `pontuacao`, `imagem`) VALUES
(9, 'O que são gimnospermas?', 'medio', 10, 'imagem_413e1619-b48d-a2e9-5922-bd0a40ed4c37.jpg'),
(10, 'Cite duas características distintivas das gimnospermas.', 'medio', 10, NULL),
(11, 'Quais são os grupos principais de gimnospermas?', 'dificil', 15, 'imagem_053ce7a0-ac51-f489-0904-6f8de61d5603.jpg'),
(12, 'Explique como as gimnospermas se reproduzem.', 'dificil', 15, 'imagem_5f4139d9-28e3-e96a-4b1d-7b24e6145b13.jpg');


INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('São plantas com flores que produzem sementes dentro de frutos', 0, 9),
('São plantas que produzem sementes nuas, ou seja, sem frutos', 1, 9),
('São plantas que não produzem sementes', 0, 9),
('São plantas aquáticas', 0, 9);

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Produzem sementes nuas e não têm flores verdadeiras', 1, 10),
('Têm flores verdadeiras e produzem sementes dentro de frutos', 0, 10),
('São plantas aquáticas', 0, 10),
('São plantas que não produzem sementes', 0, 10);

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Coníferas, cicadáceas, gnetófitas e ginkgófitas', 1, 11),
('Rosa, margarida, girassol e lírio', 0, 11),
('Orquídeas, samambaias, musgos e hepáticas', 0, 11),
('Bananeira, abacateiro, pereira e maçãzeira', 0, 11);

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('As gimnospermas se reproduzem por meio de sementes que são produzidas em estruturas chamadas cones, onde ocorre a fertilização das sementes.', 1, 12),
('Elas se reproduzem assexuadamente por meio de rizomas subterrâneos.', 0, 12),
('As gimnospermas não se reproduzem por sementes, mas sim por esporos.', 0, 12),
('Elas se reproduzem apenas por brotamento de raízes.', 0, 12);




INSERT INTO `questao` (`idQuestao`, `descricaoQ`, `grauDificuldade`, `pontuacao`, `imagem`) VALUES
(13, 'Qual é o nome científico da margarida?', 'facil', 5, 'imagem_d599a5ed-e2bc-15ed-0a9d-f8ec4a3a3e67.jpg');

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Bellis perennis', 1, 13),
('Rosa chinensis', 0, 13),
('Helianthus annuus', 0, 13),
('Ficus benjamina', 0, 13);


INSERT INTO `questao` (`idQuestao`, `descricaoQ`, `grauDificuldade`, `pontuacao`, `imagem`) VALUES
(14, 'Qual é o nome científico da pitangueira?', 'facil', 5, 'imagem_519dd1fb-50d9-6ef1-5583-37e53113a3a9.jpg');

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Eugenia uniflora', 1, 14),
('Citrus sinensis', 0, 14),
('Morus alba', 0, 14),
('Solanum lycopersicum', 0, 14);



INSERT INTO `questao` (`idQuestao`, `descricaoQ`, `grauDificuldade`, `pontuacao`, `imagem`) VALUES
(15, 'Qual é o nome científico do girassol?', 'facil', 5, 'imagem_67c43e3b-be9f-f543-fe88-1d62ef4c6222.JPG');

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Helianthus annuus', 1, 15),
('Rosa chinensis', 0, 15),
('Bellis perennis', 0, 15),
('Ficus benjamina', 0, 15);

INSERT INTO `questao` (`idQuestao`, `descricaoQ`, `grauDificuldade`, `pontuacao`, `imagem`) VALUES
(16, 'Qual é a característica principal das samambaias em relação à reprodução?', 'medio', 10, 'imagem_7d1fd34e-959f-0d32-9730-0ac93b47c629.jpg');

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Reproduzem-se por meio de sementes', 0, 16),
('Reproduzem-se por meio de esporos', 1, 16),
('Reproduzem-se por meio de bulbos', 0, 16),
('Reproduzem-se assexuadamente por brotos', 0, 16);

INSERT INTO `questao` (`idQuestao`, `descricaoQ`, `grauDificuldade`, `pontuacao`, `imagem`) VALUES
(17, 'O que caracteriza as suculentas em termos de armazenamento de água?', 'medio', 10, 'imagem_340e01f3-0384-69ff-599e-9982a7df1d27.jpg');

INSERT INTO `alternativa` (`descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
('Elas não armazenam água', 0, 17),
('Elas armazenam água em suas raízes', 0, 17),
('Elas armazenam água em suas folhas, caules ou raízes', 1, 17),
('Elas armazenam água em suas flores', 0, 17);



INSERT INTO `zona` (`idZona`, `nomeZona`, `qntPlantas`, `pontoZona`) VALUES
(16, 'Zona Deserto', NULL, NULL),
(19, 'Zona dos Ecossistemas Aquáticos', NULL, NULL),
(21, 'Zona do Vale Encantado', NULL, NULL),
(26, 'Zona da Aventura', NULL, NULL),
(29, 'Zona Árida', NULL, NULL),
(30, 'Zona do Pantanal Mágico', NULL, NULL),
(31, 'Zona das Maravilhas Microscópicas', NULL, NULL),
(32, 'Zona das Florestas Tropicais', NULL, NULL),
(33, 'Zona Desafiadora', NULL, NULL),
(34, 'Theophrastus', NULL, NULL),
(35, 'Zona Eugen Warming', NULL, NULL),
(36, 'Zona Botânica', NULL, NULL),
(37, 'Zona Amaro Macedo', NULL, NULL);


INSERT INTO `quiz` (`idQuiz`, `maximoPergunta`, `nomeQuiz`, `comTempo`, `quantTempo`, `idZona`) VALUES
(4, 20, 'Expedição ao Coração do Deserto', 0, 15, 16),
(11, 50, 'Zona 1', 0, 33, 26),
(12, 10, 'Selva', 1, 30, 35),
(14, 20, 'Estudo de Briófitas', 0, 0, 34),
(15, 20, 'Campo Florido', 1, 30, 26),
(16, 20, 'Expedição', 1, 45, 29),
(17, 10, 'Quiz Botânico: Desafio das Flores', 1, 15, 16),
(18, 8, 'Mistérios do Reino Vegetal', 1, 12, 19),
(19, 12, 'Explorando o Mundo das Plantas', 1, 18, 21),
(20, 9, 'Aventura na Zona da Botânica', 1, 14, 26),
(21, 11, 'Conhecimentos em Botânica', 1, 16, 29),
(22, 10, 'Maravilhas da Flora', 0, 0, 30),
(23, 10, 'Microcosmo Botânico', 1, 13, 31),
(24, 10, 'Selva das Plantas Tropicais', 1, 17, 32),
(25, 10, 'Desafio Botânico', 1, 19, 33),
(26, 8, 'Theophrastus Botanical Quiz', 1, 12, 34),
(27, 9, 'Eugen Warming: Botany Adventure', 1, 14, 35),
(28, 10, 'Quiz Botânico: Teste seu Conhecimento', 1, 18, 36),
(29, 7, 'Amaro Macedo: Conheça as Plantas', 1, 11, 37);


INSERT INTO `partida` (`idPartida`, `dataInicio`, `dataFim`, `limiteJogadores`, `tempoPartida`, `nomePartida`, `senhaPartida`, `statusPartida`) VALUES
(1, '2023-09-03 21:36:37', NULL, 20, 20, 'Minha Partida', '123456', 1),
(2, '2023-09-03 21:38:17', NULL, 15, 38, 'Gimnospermas', 'abcdef', 1),
(31, NULL, NULL, 20, 20, 'Partida', '123', 1),
(32, NULL, '2023-08-28 20:24:08', 20, 20, 'Estudo sobre Plantas', '123', 1),
(33, NULL, NULL, 22, 12, 'Cachorro', '123', 1),
(34, '2023-09-03 21:35:04', NULL, 20, 20, 'Minha Partida', '123456', 1),
(35, NULL, NULL, 18, 15, 'Desafio das Plantas', '456', 1),
(36, NULL, '2023-08-30 14:30:00', 20, 18, 'Jardim Botânico', '789', 1),
(37, NULL, NULL, 16, 14, 'Segredos da Flora', '321', 1),
(38, NULL, NULL, 20, 20, 'Botânica em Foco', '654', 1),
(39, NULL, NULL, 20, 20, 'Desafio Botânico', '123', 1),
(40, NULL, '2023-08-28 20:24:08', 20, 20, 'Mistérios da Flora', '123', 1),
(41, NULL, NULL, 22, 12, 'Aventura Botânica', '123', 1);


INSERT INTO `partida_zona` (`idPartida`, `idZona`) VALUES
(1, 16),
(2, 19),
(31, 21),
(32, 26),
(33, 29),
(34, 30),
(35, 31),
(36, 32),
(37, 33),
(38, 34),
(39, 35),
(40, 36),
(41, 37);


