CREATE DATABASE todolist;

USE todolist;

CREATE TABLE todo(
		NO INT PRIMARY KEY AUTO_INCREMENT
	,title VARCHAR(100) NOT NULL  
	,created_at DATETIME NOT NULL  DEFAULT CURRENT_TIMESTAMP
	,updated_at DATETIME NOT NULL  DEFAULT CURRENT_TIMESTAMP
	,deleted_at DATETIME
	,flg_com char(1) DEFAULT 0
);