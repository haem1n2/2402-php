-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO employees(emp_no, birth_date, first_name, last_name,gender, hire_date)
VALUES
	(500001,20000516,'lee','hyunsoo','m',DATE(NOW()));

-- 2. 월급, 직책, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO salaries (emp_no, salary, from_date, TO_date)
VALUES 
	(500001,50000,DATE(NOW()), 99990101);
INSERT INTO titles (emp_no, title, from_date, TO_date)
VALUES 
	(500001,'신입',DATE(NOW()), 99990101);
INSERT INTO dept_emp (emp_no, dept_no, from_date, TO_date)
VALUES 
	(500001,'d001',DATE(NOW()), 99990101);

-- 3. 짝궁의 [1,2]것도 넣어주세요.
INSERT INTO employees(emp_no, birth_date, first_name, last_name,gender, hire_date)
	VALUES (500002,19900222,'o','n','m',20240311)
	,(500002,19900322,'s','b','m',20240311);
INSERT INTO titles (emp_no, title, from_date, TO_date)
	VALUES (500002,'신입',DATE(NOW()), 99990101)
	,(500003,'신입',DATE(NOW()), 99990101);
INSERT INTO salaries (emp_no, salary, from_date, TO_date)
	VALUES (500002,50001,DATE(NOW()),DATE99990101)
	,(500003,50001,DATE(NOW()), 99990101);
INSERT INTO dept_emp (emp_no, dept_no, from_date, TO_date)
	VALUES (500002,'d001',DATE(NOW()), 99990101)
	,(500003,'d001',DATE(NOW()), 99990101);
-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.
UPDATE dept_emp
SET to_date = DATE(now())
WHERE emp_no IN(500001, 500002, 500003)
;
INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
VALUES
(500001, 'd009', DATE(NOW()), 99990101)
,(500002, 'd009', DATE(NOW()), 99990101)
,(500003, 'd009', DATE(NOW()), 99990101)
;

-- 5 . 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM titles WHERE emp_no IN(500002, 500003);
DELETE FROM salaries WHERE emp_no IN(500002, 500003);
DELETE FROM dept_emp WHERE emp_no IN(500002, 500003);
DELETE FROM employees WHERE emp_no IN(500002, 500003);

-- 6. 'd009'부서의 관리자를 나로 변경해 주세요.
UPDATE dept_manager
SET  TO DATE = DATE(NOW())
WHERE dept_no = '009'
	AND TO_date > DATE(NOW())
INSERT INTO dept_manager(dept_no, emp_no, from_date, TO_date)
VALUES ('d009',500001,DATE(NOW()), 99990101)
);	

-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE titles
SET to_date = DATE(NOW())
WHERE emp_no = 500001
;
INSERT INTO titles(emp_no, title, from_date, to_date)
VALUES(500001, 'Senior Engineer', DATE(NOW()), 99990101)
;

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT 
	emp.emp_no
	,emp.first_name
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date > DATE(NOW())
		AND sal.salary IN(
		(SELECT MAX(salary) FROM salaries WHERE to_date > DATE(NOW()))
		,(SELECT MIN(salary) FROM salaries WHERE to_date > DATE(NOW()))
	)
;
-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT 
	AVG(salary)
FROM salaries
WHERE to_date > DATE(NOW())
;

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT 
	AVG(salary) avg_sal
FROM salaries
WHERE emp_no = 499975;

-- 11. 아래 구조의 테이블을 작성하는 SQL을 작성해 주세요.
CREATE TABLE users (
	userid 		INT 			PRIMARY KEY AUTO_INCREMENT
	,username 	VARCHAR(30) NOT NULL 
	,authflg 	CHAR(1)		DEFAULT '0'
	,birthday	DATE 			NOT NULL 
	,created_at DATETIME 	DEFAULT CURRENT_TIMESTAMP()
);
-- 12. [01]에서 만든 테이블에 아래 데이터를 입력해 주세요
INSERT INTO users (username, authflg, birthday, created_at)
VALUES ('그린','0', 20240126, NOW());

-- 13. [02]에서 만든 레코드를 아래 데이터로 갱신해 주세요.
UPDATE users
SET
	username = '테스터'
	,authflg ='1'
	,birthday = 20070301
WHERE userid = 1;

-- 14. [02]에서 만든 레코드를 삭제해 주세요.
DELETE FROM users
WHERE userid = 1;

-- 15. [01]에서 만든 테이블에 아래 Column을 추가해 주세요.
ALTER TABLE users ADD COLUMN user_addr VARCHAR(100) NOT NULL DEFAULT '-';

-- [01]에서 만든 테이블을 삭제해 주세요.
DROP TABLE users; 

-- 17. 아래 테이블에서 유저명, 생일, 랭크명을 출력해 주세요.
--  조건1 : rankmanagement의 FK인 userid는 users의 userid를 참조 중
--  조건2 : Table users
--  조건3 : Table rankmanagement

SELECT 
	usr.username
	,usr.birthday
	,rmg.rankname
FROM users usr
	JOIN rankmanagment rmg
		ON usr. userid = rmg.userid
;