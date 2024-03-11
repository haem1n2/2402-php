-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT
	emp.emp_no
	,CONCAT_WS(' ',first_name,last_name) full_name
	,tle.title
FROM employees emp
	JOIN titles tle
	ON emp.emp_no = tle.emp_no
;
-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT
	emp.emp_no
	,emp.gender
	,sal.salary
FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE sal.to_date >= NOW();
-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급이력을 출력해주세요.
SELECT
	emp.emp_no 
	,CONCAT_WS(' ',first_name,last_name) full_name
	,sal.salary
FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	WHERE emp.emp_no = 10010 ;

-- 4. 사원의 사원번호, 풀네임, 소속부서명을 출력해주세요.
SELECT
	emp.emp_no
	,CONCAT_WS(' ',first_name,last_name) full_name
	,dpm.dept_name
FROM employees emp
	JOIN dept_emp dpe
	ON emp.emp_no = dpe.emp_no
	JOIN departments dpm
	ON dpe.dept_no = dpm.dept_no
;

-- 5. 현재 월급의 상위 10위까지 사원의 사번,  풀네임, 월급을 출력해주세요.
SELECT
	emp.emp_no
	,CONCAT_WS(' ',first_name,last_name) full_name
	,sal.salary
FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	WHERE sal.to_date >= NOW()
	ORDER BY sal.salary desc
	LIMIT 10;
	
-- 6. 현재 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해주세요
SELECT
	dptm.dept_name
	,CONCAT_WS(' ',first_name,last_name) full_name
	,emp.hire_date
FROM employees emp
	JOIN dept_manager dpm
	ON emp.emp_no = dpm.emp_no
	JOIN departments dptm
	ON dpm.dept_no = dptm.dept_no
	WHERE dpm.to_date >= NOW()
;
	
-- 7 현재 직책이 staff인 사원의 전체 평균 월급을 출력해주세요.
SELECT
	avg(salary)
FROM titles tt
	JOIN employees emp
	ON tt.emp_no = emp.emp_no
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	WHERE title = 'staff'
	AND sal.to_date >= NOW()
;
	
-- 8 부서장직을 역임했던 모든 사원의 풀네임과 입사일,사번,부서번호를 출력해주세요.
SELECT
	CONCAT_WS(' ',first_name,last_name) full_name
	,emp.hire_date
	,emp.emp_no
	,dpm.dept_no
FROM employees emp
	JOIN dept_manager dpm
	ON emp.emp_no = dpm.emp_no
;
-- 9 현재 각 직급별 평균월급 중 60000이상인 직급의 직급명, 평균월급(정수)를 내림차순으로 출력해주세요
SELECT
	tt.title
	,AVG(salary) avg_sal
FROM salaries sal
	JOIN employees emp
		ON sal.emp_no = emp.emp_no
	JOIN titles tt
		ON emp.emp_no = tt.emp_no
		where sal.salary >= 60000
  		AND tt.to_date >= NOW() 
	GROUP BY tt.title 
	ORDER BY avg_sal desc
;
-- 10 성별이 여자인 사원들의 직급별 사원수를 출력해주세요
SELECt
	tt.title
	,COUNT(emp.emp_no) 
FROM employees emp
JOIN titles tt
ON	emp.emp_no = tt.emp_no
AND tt.to_date >= NOW()
and emp.gender ='f'
GROUP BY tt.title
;