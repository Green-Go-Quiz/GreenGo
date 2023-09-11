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

