-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2023 às 14:55
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `greengo`
--

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
  `idEquipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Extraindo dados da tabela `especie`
--

INSERT INTO `especie` (`idEspecie`, `nomePop`, `nomeCie`, `descricao`, `imagemEspecie`, `frutifera`, `comestivel`, `raridade`, `medicinal`, `toxidade`, `exotica`) VALUES
(18, 'Cactus', 'Cactus cientifucsio', '<p>Cactus é mto foda tem espinho</p>', '../../public/especies/73052c0da5a25dae226e7271b5b1c3c5.jpg', 1, 1, 0, 0, 0, 0),
(19, 'Caladium', 'Caladium cientificus', '<p>verdi e rosa</p>', '../../public/especies/aa60c077117e999ed73341dec33d65ee.jpg', 0, 0, 0, 0, 0, 1),
(20, 'Suculenta', 'Muito suculenta', '<p>da vontade de comer só pelo nome</p>', '../../public/especies/0b4b84181c96962a563210e11b41a9d9.jpg', 0, 1, 0, 1, 0, 0),
(21, 'Vitoria Regia', 'Vitoria Regia', '<p>Onde os sapos ficam</p>', '../../public/especies/d9954a1e1c365a086ecbb3ca34e72c41.jpg', 0, 0, 0, 0, 0, 1);

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

--
-- Extraindo dados da tabela `planta`
--

INSERT INTO `planta` (`idPlanta`, `idZona`, `idEspecie`, `codNumerico`, `imagemPlanta`, `pontuacaoPlanta`, `codQR`, `nomeSocial`, `historia`) VALUES
(67, 16, 18, 1000, '../../public/plantas/524f302af15ee8555116eb4e487e611b.jpg', 10, '../../public/qrcode/qrcode_1000.png', 'Ana Terra', '<p>Ana Terra História</p>'),
(68, 16, 18, 1001, '../../public/plantas/2dd08102476f925c50224eb0f867b4d0.jpg', 10, '../../public/qrcode/qrcode_1001.png', 'Teste', '<p>teste</p>'),
(69, 16, 18, 30, '../../public/plantas/ea814b9af8efe2f61671059aa10f8130.jpg', 30, '../../public/qrcode/qrcode_30.png', 'Teste 31 05', '<p>AAA</p>');

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
  `tipoUsuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `genero`, `escolaridade`, `loginUsuario`, `email`, `senha`, `tipoUsuario`) VALUES
(19, 'Gabriel', 'Masculino', 'Ensino Superior', 'mandelas', 'gabriel.mandellicardoso@gmail.com', '12345678', 1),
(20, 'gabriel', 'Masculino', 'Ensino Médio', 'gabriel', 'gabriel.mandellicardoso@gmail.com', 'eu12345678', 1);

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
-- Extraindo dados da tabela `zona`
--

INSERT INTO `zona` (`idZona`, `nomeZona`, `qntPlantas`, `pontoZona`) VALUES
(16, 'Zona Deserto', NULL, NULL),
(19, 'Zona Franca', NULL, NULL),
(21, 'Zona Teste', NULL, NULL),
(26, 'aaa', NULL, NULL),
(29, 'aa', NULL, NULL),
(30, 'aaa', NULL, NULL),
(31, 'aaaa', NULL, NULL),
(32, 'aa', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`);

--
-- Índices para tabela `equipe_usuario`
--
ALTER TABLE `equipe_usuario`
  ADD KEY `fk_usuario_equipe` (`idUsuario`),
  ADD KEY `fk_equipe_usuario` (`idEquipe`);

--
-- Índices para tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idEspecie`);

-- Índices para tabela `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`idPlanta`),
  ADD KEY `idZona` (`idZona`),
  ADD KEY `fkEspecie` (`idEspecie`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices para tabela `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idEquipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `idEspecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de tabela `planta`
--
ALTER TABLE `planta`
  MODIFY `idPlanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `equipe_usuario`
--
ALTER TABLE `equipe_usuario`
  ADD CONSTRAINT `fk_equipe_usuario` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`),
  ADD CONSTRAINT `fk_usuario_equipe` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `planta`
--
ALTER TABLE `planta`
  ADD CONSTRAINT `fkEspecie` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkZona` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`) ON DELETE CASCADE;

--



-- -----------------------------------------------------
-- Nossas tabelas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `green_go`.`questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `questao` (
  `idQuestao` INT NOT NULL AUTO_INCREMENT,
  `descricaoQ` VARCHAR(200) NOT NULL,
  `grauDifilculdade` ENUM("facil", "medio", "dificil") NOT NULL,
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
    ON DELETE NO ACTION
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

