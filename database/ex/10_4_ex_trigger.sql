-- DELETE FROM employees WHERE emp_no = 10001;

-- DELETE FROM titles WHERE emp_no = 10001;

-- trigger
-- 트리거 생성
delimiter $$
CREATE TRIGGER trigger_employees_emp_info
BEFORE DELETE 
ON employees
FOR EACH ROW
BEGIN 
	DELETE FROM titles WHERE emp_no = OLD.emp_no;
END $$
delimiter ; 

DELETE FROM employees WHERE emp_no = 10002;

-- 트리거 조회
SHOW TRIGGERS;

-- 트리거 삭제
DROP TRIGGER trigger_employees_emp_info;