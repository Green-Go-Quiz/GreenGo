CREATE TABLE usuarios ( 
  id_usuario int AUTO_INCREMENT, 
  nome_usuario varchar(70) NOT NULL, 
  login varchar(15) NOT NULL,
  senha varchar(15) NOT NULL,
  papeis varchar(255),
  PRIMARY KEY (id_usuario) 
);
ALTER TABLE usuarios ADD CONSTRAINT uk_usuarios UNIQUE KEY (login);

/*Inserts usuarios*/
INSERT INTO usuarios (nome_usuario, login, senha) VALUES ('Sr. Administrador', 'admin', 'admin');
INSERT INTO usuarios (nome_usuario, login, senha) VALUES ('Sr. Root', 'root', 'root');
/* tabela questoes 
 Table `green_go`.`questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `green_go`.`questao` (
  `idQuestao` INT NOT NULL,
  `descricaoQ` VARCHAR(200) NOT NULL,
  `grauDifilculdade` ENUM("facil", "medio", "dificil") NOT NULL,
  `pontuacao` INT NOT NULL,
  `imagem` VARCHAR(255) NULL,
  PRIMARY KEY (`idQuestao`))
ENGINE = InnoDB;*/ 