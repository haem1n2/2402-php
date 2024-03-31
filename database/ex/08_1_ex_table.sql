-- DB 생성
CREATE DATABASE test;
-- db 선택
USE test;
-- table 생성
CREATE TABLE users (
	user_id INT PRIMARY KEY AUTO_INCREMENT
-- 프라이마리키키에는 자동으로 낫널 
	,user_name VARCHAR(50) NOT NULL 
	,user_tel VARCHAR(20) NOT NULL COMMENT '- 제외 숫자'
	,user_addr VARCHAR(150) NOT NULL 
	,user_birth_at DATE NOT NULL COMMENT 'YYYY-MM-DD'
	,user_gender CHAR(1) NOT NULL COMMENT '0 : 남자, 1: 여자'
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at DATETIME  COMMENT 'YYYY-MM-DD hh:mi:ss'
);
CREATE TABLE products (
	product_id INT PRIMARY KEY AUTO_INCREMENT 
	,product_name VARCHAR(200) NOT NULL 
	,product_price INT NOT NULL 
	,create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,delete_at DATETIME COMMENT 'YYYY-MM-DD hh:mi:ss'
);
-- 주문 테이블
CREATE TABLE orders (
	order_id    	INT 		PRIMARY KEY AUTO_INCREMENT 
	,USER_id 		INT 		NOT NULL 
	,product_id		INT		NOT NULL 
	,payment_type	CHAR(1) 	NOT NULL DEFAULT '0' COMMENT '0 : 결제전, 1: 카드, 2 : 계좌이체'
	
	
);
	

-- ALTER TABLE : 테이블의 구조를 수정하는 SQL
-- FK 추가
ALTER TABLE orders ADD CONSTRAINT fk_orders_user_id foreign KEY (USER_id)
REFERENCES users(user_id);

ALTER TABLE orders ADD CONSTRAINT fk_orders_product_id FOREIGN KEY (product_id)
REFERENCES products(product_id);

-- users 테이블에 회원id가 추가 필요
ALTER TABLE users ADD COLUMN user_member_id VARCHAR(100) NOT NULL UNIQUE;
ALTER TABLE users ADD CONSTRAINT uk_users_user_member_id UNIQUE (user_member_id);

-- unique삭제 
ALTER TABLE users DROP CONSTRAINT uk_users_user_member_id;

-- user_member_id 데이터타입 변경
-- varshar 크기를 늘리는건 상관없는데 줄이는건 안됨.
ALTER TABLE users MODIFY COLUMN user_member_id VARCHAR(150) NOT NULL;

-- 테이블 삭제
DROP TABLE orders;
DROP TABLE users, products;

-- 데이터 베이스 삭제
DROP DATABASE test;

-- drop이 붙으면 삭제

-- truncate table : 테이블의 모든 데이터를 삭제
TRUNCATE TABLE titles; 

