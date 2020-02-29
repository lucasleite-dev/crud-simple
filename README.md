#Create this mysql database

CREATE SCHEMA `planodesaude` ;

CREATE TABLE `planodesaude`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `idade` INT NOT NULL,
  `plano` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `telefone2` VARCHAR(45) NULL,
  `dependentes` INT NOT NULL,
  `mensalidade` VARCHAR(45) NOT NULL,
  `apartamento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`));