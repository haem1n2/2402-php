-- INDEX

-- INDEX 확인
SHOW INDEX FROM employees;
-- emp_no = FK

-- Index 생성


SELECT * FROM employees WHERE first_name = 'saniya';

-- Index 생성
ALTER TABLE employees ADD INDEX idx_employees_first_name (first_name);]

-- Index 삭제
DROP index idx_employees_first_name ON employees;
