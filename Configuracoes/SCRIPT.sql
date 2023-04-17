CREATE DATABASE IF NOT EXISTS ecteacom_ectea;
USE ecteacom_ectea;

CREATE TABLE IF NOT EXISTS tbl_tipoContrato(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nomeTipoContrato VERCHAR(100) UNIQUE NOT NULL,
  quantidade INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS tbl_acessos(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255) UNIQUE NOT NULL,
  senha VARCHAR(15) NOT NULL, 
  tipoAcesso INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS tbl_instituicao(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  razaoSocial VARCHAR(255) NOT NULL,
  CNPJ VARCHAR(15) UNIQUE NOT NULL,
  unidade VARCHAR (100) NOT NULL,
  telefone VARCHAR (10) NOT NULL,
  tipoContrato INTEGER,
  acesso INTEGER,
  FOREIGN KEY (tipoContrato) REFERENCES tbl_tipoContrato(id),
  FOREIGN KEY (acesso) REFERENCES tbl_acessos(id)
);

CREATE TABLE IF NOT EXISTS tbl_turma(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  descricao TEXT
);


CREATE TABLE IF NOT EXISTS tbl_profissional(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nome TEXT,
  cpf TEXT,
  tipoProfissional TEXT,
  turma TEXT,
  FOREIGN KEY (turma) REFERENCES tbl_turma(id)
);

CREATE TABLE IF NOT EXISTS tbl_crianca(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nome TEXT,
  datanascimento TEXT,
  turma TEXT,
  FOREIGN KEY (turma) REFERENCES tbl_turma(id)
);

CREATE TABLE IF NOT EXISTS tbl_imagemTarefa(
id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  caminho VARCHAR(255) NOT NULL,
  frase VARCHAR (255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserindo uma imagem na tbl_imagemTarefa
INSERT INTO tbl_imagemTarefa (nome, caminho, frase)
VALUES ('imagem1.jpg', '/Projeto/View/imagens/Imagens Tarefas/imagem1.png', "Imagem1");
INSERT INTO tbl_imagemTarefa (nome, caminho, frase)
VALUES ('imagem2.jpg', '/Projeto/View/imagens/Imagens Tarefas/imagem2.png', "Imagem2");INSERT INTO tbl_imagemTarefa (nome, caminho, frase)
VALUES ('imagem3.jpg', '/Projeto/View/imagens/Imagens Tarefas/imagem3.png', "Imagem3");
INSERT INTO tbl_imagemTarefa (nome, caminho, frase)
VALUES ('imagem4.jpg', '/Projeto/View/imagens/Imagens Tarefas/imagem4.png', "Imagem4");
INSERT INTO tbl_imagemTarefa (nome,  caminho, frase)
VALUES ('imagem5.jpg', '/Projeto/View/imagens/Imagens Tarefas/imagem5.png', "Imagem5");
INSERT INTO tbl_imagemTarefa (nome, caminho, frase)
VALUES ('imagem6.jpg', '/Projeto/View/imagens/Imagens Tarefas/imagem6.png', "Imagem6");


INSERT INTO tbl_tipoAcessos (nomeAcesso, quantidade) VALUES ('Básico',50);

-- Inserindo administradores na tbl_acesso
insert into tbl_acessos(email, senha, tipoAcesso) values ("felipe@ectea.com", "felipe@123", 1);
insert into tbl_acessos(email, senha, tipoAcesso) values ("aline@ectea", "aline@123", 1);
insert into tbl_acessos(email, senha, tipoAcesso) values ("flavio@ectea", "barrella@123", 1);

insert into tbl_instituicao(razaoSocial, CNPJ, unidade, telefone, tipoAcesso, acesso) values ("Ectea", "12345678900", "Embu das Artes", "123456", 1, 1);
insert into tbl_instituicao(razaoSocial, CNPJ, unidade, telefone, tipoAcesso, acesso) values ("Ectea2", "12345678901", "Itapecerica", "1234567", 1, 1);



			
INSERT INTO tbl_acessos (email, senha, tipoAcesso)
                VALUES ("teste@teste", ":senha", 2);
INSERT INTO tbl_instituicao
                (razaoSocial, CNPJ, unidade, telefone, tipoAcesso, acesso)
                VALUES
                (":rsocial", "99", ":unidade", "33", 1, (SELECT MAX(id) FROM tbl_acessos));

                
select * from tbl_instituicao;

SELECT * FROM tbl_acessos
            INNER JOIN tbl_instituicao
            ON tbl_acessos.id = tbl_instituicao.id;

drop database educatea;

select * from tbl_imagemTarefa