CREATE DATABASE IF NOT EXISTS TDE_DBPT;
USE TDE_DBPT;

CREATE TABLE IF NOT EXISTS USUARIO(
	ID_USUARIO INT AUTO_INCREMENT PRIMARY KEY,
	NOME_USER VARCHAR(200),
	CPF VARCHAR(15),
	TELEFONE VARCHAR(15)
);
CREATE TABLE IF NOT EXISTS JOGO(
	ID_JOGO INT AUTO_INCREMENT PRIMARY KEY,
	NOME_JOGO VARCHAR(100)
);
CREATE TABLE IF NOT EXISTS FLIPERAMA(
	ID_FLIPER INT AUTO_INCREMENT PRIMARY KEY,
	COD_SERIE VARCHAR(20),
    FK_ID_JOGO INT,
	FOREIGN KEY (FK_ID_JOGO) REFERENCES JOGO (ID_JOGO)
);