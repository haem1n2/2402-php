CREATE DATABASE to_do_list;
USE to_do_list;

CREATE TABLE boards (
	NO INT PRIMARY KEY AUTO_INCREMENT
	,title VARCHAR(100) NOT NULL 
	,content VARCHAR(1000) NOT NULL 
	,created_at DATETIME NOT NULL  DEFAULT CURRENT_TIMESTAMP
	,updated_at DATETIME NOT NULL  DEFAULT CURRENT_TIMESTAMP
	,deleted_at DATETIME 
);
