/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

create database biblioteca;
use biblioteca;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `classificacao_usuario` int(2) NOT NULL,
  `telefone_usuario` int(9) NOT NULL,
  `endereco_usuario` varchar(200) NOT NULL,
  `complemento_usuario` varchar(200),
  `cep_usuario` int(8) NOT NULL,
  `municipio_usuario` varchar(200) NOT NULL,
  `estado_usuario` varchar(2) NOT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `editoras` (
  `cod_editora` int(11) NOT NULL AUTO_INCREMENT,
  `nome_editora` varchar(200) NOT NULL,
  `telefone_editora` int(9) NOT NULL,
  `endereco_editora` varchar(200) NOT NULL,
  `complemento_editora` varchar(200),
  `cep_editora` int(8) NOT NULL,
  `municipio_editora` varchar(200) NOT NULL,
  `estado_editora` varchar(2) NOT NULL,
  PRIMARY KEY (`cod_editora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `autores` (
  `cod_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(200) NOT NULL,
  `telefone_autor` int(9) NOT NULL,
  `endereco_autor` varchar(200) NOT NULL,
  `complemento_autor` varchar(200),
  `cep_autor` int(8) NOT NULL,
  `municipio_autor` varchar(200) NOT NULL,
  `estado_autor` varchar(2) NOT NULL,
  PRIMARY KEY (`cod_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `areas_de_conhecimento` (
  `cod_area_de_conhecimento` int(11) NOT NULL AUTO_INCREMENT,
  `desc_area_de_conhecimento` varchar(200) NOT NULL,
  PRIMARY KEY (`cod_area_de_conhecimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `palavras_chave` (
  `cod_palavra_chave` int(11) NOT NULL AUTO_INCREMENT,
  `desc_palavra_chave` varchar(200) NOT NULL,
  PRIMARY KEY (`cod_palavra_chave`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `titulos` (
  `cod_titulo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_titulo` varchar(200) NOT NULL,
  `cod_editora` int(11) NOT NULL,
  `cod_area_de_conhecimento` int(11) NOT NULL,
  PRIMARY KEY (`cod_titulo`),
  foreign key(cod_editora) references editoras(cod_editora),
  foreign key(cod_area_de_conhecimento) references areas_de_conhecimento(cod_area_de_conhecimento)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `exemplares` (
  `cod_exemplar` int(11) NOT NULL AUTO_INCREMENT,
  `cod_titulo` int(11) NOT NULL,
  `emprestado_exemplar` int(1) NOT NULL ,
  PRIMARY KEY (`cod_exemplar`),
  foreign key(cod_titulo) references titulos(cod_titulo)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `titulos_autores` (
  `cod_titulo` int(11) NOT NULL,
  `cod_autor` int(11) NOT NULL ,
  foreign key(cod_titulo) references titulos(cod_titulo),
  foreign key(cod_autor) references autores(cod_autor),
  PRIMARY KEY(`cod_titulo`,`cod_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `titulos_palavras_chaves` (
  `cod_titulo` int(11) NOT NULL,
  `cod_palavra_chave` int(11) NOT NULL,
  foreign key(cod_titulo) references titulos(cod_titulo),
  foreign key(cod_palavra_chave) references palavras_chave(cod_palavra_chave),
  PRIMARY KEY(`cod_titulo`,`cod_palavra_chave`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `usuarios_exemplares` (
  `cod_usuario` int(11) NOT NULL,
  `cod_exemplar` int(11) NOT NULL,
  `data_emprestimo` date  NOT NULL,
  `data_devolucao` date  NOT NULL,
  foreign key(cod_usuario) references usuarios(cod_usuario),
  foreign key(cod_exemplar) references exemplares(cod_exemplar),
  PRIMARY KEY(`cod_usuario`,`cod_exemplar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `informacoes` (
  `dias_renovacao` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `areas_de_conhecimento` (`cod_area_de_conhecimento`, `desc_area_de_conhecimento`) VALUES (NULL, 'Area de Conhecimento 1');
INSERT INTO `autores` (`cod_autor`, `nome_autor`, `telefone_autor`, `endereco_autor`, `complemento_autor`, `cep_autor`, `municipio_autor`, `estado_autor`) VALUES (NULL, 'Autor 1', '454564564', 'Endereco Autor 1', '', '54564564', 'Municipio Autor 1', 'AL');
INSERT INTO `autores` (`cod_autor`, `nome_autor`, `telefone_autor`, `endereco_autor`, `complemento_autor`, `cep_autor`, `municipio_autor`, `estado_autor`) VALUES (NULL, 'Autor 2', '654565645', 'Endereco Autor 2', '', '24564654', 'Municipio Autor 2', 'BA');
INSERT INTO `autores` (`cod_autor`, `nome_autor`, `telefone_autor`, `endereco_autor`, `complemento_autor`, `cep_autor`, `municipio_autor`, `estado_autor`) VALUES (NULL, 'Autor 3', '456456456', 'Endereco Autor 3', '', '69789789', 'Municipio Autor 3', 'PR');
INSERT INTO `editoras` (`cod_editora`, `nome_editora`, `telefone_editora`, `endereco_editora`, `complemento_editora`, `cep_editora`, `municipio_editora`, `estado_editora`) VALUES (NULL, 'Alta Books', '32788069', 'Viuva Claudio', '', '20970031', 'Rio de Janeiro', 'RJ');
INSERT INTO `editoras` (`cod_editora`, `nome_editora`, `telefone_editora`, `endereco_editora`, `complemento_editora`, `cep_editora`, `municipio_editora`, `estado_editora`) VALUES (NULL, 'Editora UFMG', '989787897', 'Av. Antonio Carlos', '', '84545489', 'Belo Horizonte', 'MG');
INSERT INTO `editoras` (`cod_editora`, `nome_editora`, `telefone_editora`, `endereco_editora`, `complemento_editora`, `cep_editora`, `municipio_editora`, `estado_editora`) VALUES (NULL, 'L&PM', '465456456', 'Rua Afonso Celso', '', '54564564', 'SÃ¢o Paulo', 'SP');
INSERT INTO `palavras_chave` (`cod_palavra_chave`, `desc_palavra_chave`) VALUES (NULL, 'calculo');
INSERT INTO `palavras_chave` (`cod_palavra_chave`, `desc_palavra_chave`) VALUES (NULL, 'limites');
INSERT INTO `palavras_chave` (`cod_palavra_chave`, `desc_palavra_chave`) VALUES (NULL, 'derivadas');
INSERT INTO `palavras_chave` (`cod_palavra_chave`, `desc_palavra_chave`) VALUES (NULL, 'integrais');
INSERT INTO `titulos` (`cod_titulo`, `nome_titulo`, `cod_editora`, `cod_area_de_conhecimento`) VALUES (NULL, 'Calculo Vol.1', '1', '1');
INSERT INTO `titulos_autores` (`cod_titulo`, `cod_autor`) VALUES ('1', '1');
INSERT INTO `titulos_autores` (`cod_titulo`, `cod_autor`) VALUES ('1', '2');
INSERT INTO `titulos_palavras_chaves` (`cod_titulo`, `cod_palavra_chave`) VALUES ('1', '1');
INSERT INTO `titulos_palavras_chaves` (`cod_titulo`, `cod_palavra_chave`) VALUES ('1', '2');
INSERT INTO `titulos_palavras_chaves` (`cod_titulo`, `cod_palavra_chave`) VALUES ('1', '3');
INSERT INTO `titulos_palavras_chaves` (`cod_titulo`, `cod_palavra_chave`) VALUES ('1', '4');
INSERT INTO `informacoes` (`dias_renovacao`) VALUES (7);
INSERT INTO `usuarios` (`cod_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `classificacao_usuario`, `telefone_usuario`, `endereco_usuario`, `complemento_usuario`, `cep_usuario`, `municipio_usuario`, `estado_usuario`) VALUES (NULL, 'Bibliotecario', 'adm@hotmail.com', '202cb962ac59075b964b07152d234b70', '4', '123456789', 'dsfsfs', 'adsd', '16395440', 'dasda', 'SP');
INSERT INTO `usuarios` (`cod_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `classificacao_usuario`, `telefone_usuario`, `endereco_usuario`, `complemento_usuario`, `cep_usuario`, `municipio_usuario`, `estado_usuario`) VALUES (NULL, 'Lucas Oliveira de Souza', 'lucas@hotmail.com', '202cb962ac59075b964b07152d234b70', '1', '954613277', 'Rua Alvorada', 'casa 2', '15645456', 'Carapicuiba', 'SP');
INSERT INTO `usuarios` (`cod_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `classificacao_usuario`, `telefone_usuario`, `endereco_usuario`, `complemento_usuario`, `cep_usuario`, `municipio_usuario`, `estado_usuario`) VALUES (NULL, 'Lucas Salazar Reis', 'salazar@hotmail.com', '167954f88d755e0259f687714fbce15e', '1', '565665656', 'R. Rosa, 37', '', '96784564', 'Osasco', 'SP');
INSERT INTO `usuarios` (`cod_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `classificacao_usuario`, `telefone_usuario`, `endereco_usuario`, `complemento_usuario`, `cep_usuario`, `municipio_usuario`, `estado_usuario`) VALUES (NULL, 'Gustavo Oliveira da Silva', 'gstv@hotmail.com', '313482c36ef8eeb371890c7bfcb81a07', '1', '646464564', 'Rua Dalva', '', '45645645', 'Carapicuiba', 'SP');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;