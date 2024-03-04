-- 테이블의 모든 데이터 조회 : * (AsterisR)
SELECT * 
FROM employees
;

-- 특정 컬럼만 조회
SELECT 
	emp_no
	,birth_date
FROM employees
;

-- 1. title 테이블의 모든 데이터를 조회해 주세요.
SELECT *
FROM titles
;
-- title 테이블에서 emp_no, title을 출력해 주세요.
SELECT 
	emp_no
	,title
FROM titles
;

-- 특정 조건의 데이터만 조회 : where 절
-- 비교연산자 : =, >=, <= >, <
-- 사번이 10009인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE emp_no = 10009;
-- 사원 이름이 'Mary'인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE first_name = 'Mary';
-- 생일이 1960/01/01 이상인 사원의 모든정보를 조회
SELECT *
FROM employees
WHERE birth_date >= 19600101;
-- 입사일이 1990/12/25 이상인 사원의 사번, 이름, 성을 조회해주세요
SELECT
	emp_no
	,first_name
	,last_name
FROM employees
WHERE hire_date >= 19901225;

-- 복수의 조건을 적용 시켜서 조회 : amd, or 연산자
-- and : 두 조건을 모두 만족
-- or : 두 조건중 하나라도 만족하면 모든 정보
-- 사원번호가 10005 ~ 10009 인 사원의 모든정보 조회
SELECT *
FROM employees
WHERE 
	emp_no >= 10005
	or emp_no <= 10009;
-- 사원 이름이  Mary이고, 성이 piazza인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE
	FIRST_name = 'mary'
	and LAST_name = 'piazza';
-- 이름이  Mary 또는 moto이고, 성이 piazza인 사원의 정보 조회
SELECT *
FROM employees
WHERE
	(
	first_name= 'mary'
 	OR first_name = 'moto'
 	)
 	AND last_name = 'piazza';
 	
-- Btween 연산자 : 지정한 범위의 데이터를 조회
SELECT *
FROM employees
WHERE emp_no >= 10005 AND emp_no <= 10009;

SELECT * FROM employees
WHERE emp_no BETWEEN 10005 AND 10009;

-- in 연산자 : 지정한 값과 일치한 데이터를 조회
-- 10005, 10007 사원의 모든 정보를 조회

SELECT *
FROM employees
WHERE emp_no = 10005 or emp_no = 10007;

SELECT *
FROM employees
WHERE emp_no IN(10005, 10009);

-- LIKE 절 : 문자열의 내용을 조회 (대소문자 구분 X)
-- 이름이 ge로 끝나는 데이터 조회
SELECT * FROM employees WHERE first_name LIKE('%ge');
-- 이름이 ge로 시작하는 데이터 조회
SELECT * FROM employees WHERE first_name LIKE('ge%');
-- 이름에 ge가 포함되는 데이터 조회
SELECT * FROM employees WHERE first_name LIKE('%ge%');
-- _ : 언더바의 개수 만큼의 글자의 개수가 제한되서 조회
SELECT * FROM employees WHERE first_name LIKE('ge_');

-- order by 절 : 데이터를 정렬해서 조회
SELECT * FROM employees 
ORDER BY birth_date DESC, hire_date ASC;

-- 입사일이1990/01/01 ~ 1995/12/31 이고, 성별이 여자인 사원의 정보를 
-- 성과 이름 오름차순으로 정렬해서 조회해

SELECT *
FROM employees
WHERE (hire_date BETWEEN 19900101 and 19951231) and gender = 'f'
ORDER BY last_name ASC, first_name ASC;

-- DISTINCT 키워드 : 검색 결과에서 중복되는 레코드 없이 조회
SELECT DISTINCT *
FROM salaries 
WHERE emp_no = 10001;