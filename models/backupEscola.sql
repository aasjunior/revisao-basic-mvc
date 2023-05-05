drop database escola
create database escola;
use escola

CREATE TABLE IF NOT EXISTS `aluno` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `cidade` varchar(250) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dir` varchar(255) NOT NULL UNIQUE,
  `size_img` bigint unsigned,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `aluno_imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alunoCodigo` int(11) NOT NULL,
  `imagemCodigo` int(11) NOT NULL,
  CONSTRAINT `alunoCodigo_fk` FOREIGN KEY(`alunoCodigo`) REFERENCES `aluno`(`codigo`) ON DELETE CASCADE,
  CONSTRAINT `imagemCodigo_fk` FOREIGN KEY(`imagemCodigo`) REFERENCES `imagens`(`id`) ON DELETE CASCADE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET=latin1;

select * from imagens
select * from aluno
select * from aluno_imagens

DELETE aluno, imagens, aluno_imagens FROM aluno 
INNER JOIN aluno_imagens ON aluno.codigo = aluno_imagens.alunoCodigo
INNER JOIN imagens ON aluno_imagens.imagemCodigo = imagens.id
WHERE aluno.codigo = 2 AND aluno_imagens.imagemCodigo = imagens.id

SELECT * FROM aluno 
INNER JOIN aluno_imagens ON aluno.codigo = aluno_imagens.alunoCodigo
INNER JOIN imagens ON aluno_imagens.imagemCodigo = imagens.id
WHERE aluno.codigo = 2


SELECT imagens.dir 
        FROM imagens 
        INNER JOIN aluno_imagens ON imagens.id = aluno_imagens.imagemCodigo 
        INNER JOIN aluno ON aluno.codigo = aluno_imagens.alunoCodigo 
        WHERE aluno.codigo = 4
        
	

DELETE FROM imagens WHERE imagens.id > 1
DELETE FROM aluno WHERE aluno.codigo > 0

SET SQL_SAFE_UPDATES = 0;