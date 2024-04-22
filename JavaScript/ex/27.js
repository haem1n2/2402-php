// 배열
const ARR = [1, 2, 3, 4, 5];

console.log(ARR[2]);
ARR[5] = 6;

// 배열의 길이 획득
console.log(ARR.length);
ARR[ARR.length] = 7;

// 7~9번 이해못함.

// 배열 여부 체크
console.log(Array.isArray(ARR));
console.log(Array.isArray(1));

// 18번 주석은 이해한대로 적긴했는데 맞는지는 모름. 한 번 더 물어봐야함.
// 14~ 15번은 배열이 맞을 시 true 틀릴 시 false로 출력

// 배열에서 특정 요소를 검색해 해당 인덱스를 획득
let arr = ['홍길동', '갑순이', '갑돌이'];
arr.indexOf('갑돌이');
if(arr.indexOf('갑돌이') < 0) {
    // 요소가 없을 때 처리
} 

// arr.indexof('갑돌이'); 라고 입력 시 '갑돌이 번호인 2번을 출력'

// 배열에서 특정 요소의 존재 여부를 체크, 리턴 boolean
arr.includes('홍길동');
if(!(arr.includes('홍길동'))) {
    // 요소가 있을 때 처리
}

// 31번 주석은 내가 이해한대로 적긴했는데 맞는지는 모름. 한 번 더 물어봐야함.
// arr.includes('홍길동')이라고입력시 요소가 있을 시 true, 요소가 없을 시 false로 출력?

// push() : 원본 배열의 마지막 요소를 추가, 리턴은 변경된 length
arr = ['홍길동', '갑순이', '갑돌이'];
let len = arr.push('반장님');

arr[arr.length] = '반장님';

arr.push('나미리', '둘리'); // 파라미터를 복수 설정해서 여러 값을 한 번에 추가하기 쉬움

// push의 경우 40번 줄 처럼 저렇게 입력하면 마지막에 붙음 
// 39번부터 44번 arr 입력 시 (7) ['홍길동', '갑순이', '갑돌이', '반장님', '반장님', '나미리', '둘리']
// 배열에 요소만 추가한다고 생각해야한다. 

// push 방법보단 length를 사용하는걸 권장 
// 여러개 넣을때는 푸쉬가 더 편함. 

// 배열 복사
arr = [ '홍길동', '갑순이', '갑돌이'];
arr2 = [...arr]; // Spread Opertor
arr2.push('반장님');

// 원본보존 하면서 배열를 복사해서 가져온다고 생각하면 된다. 

// pop() : 원본 배열의 마지막 요소를 제거, 제거된 요소의 값 반환
arr = ['홍길동', '갑순이', '갑돌이'];
let result = arr.pop();
console.log(arr);

// unshift() : 원본 배열의 첫번째 요소를 추가, 변경된 length 반환
arr = ['홍길동', '갑순이', '갑돌이'];
result = arr.unshift('둘리');
console.log(result, arr);

// shift () : 원본 배열의 첫번째 요소를 제거, 제거된 요소의 값 반환
result = arr.shift();
console.log(result, arr);

// splice(start, count, ...args) : 요소를 잘라서 자른 배열을 반환
arr = [1, 2, 3, 4, 5];
result = arr.splice(2);
console.log(arr); // [1, 2]
console.log(result); // [3, 4, 5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(-2);
console.log(arr); // [1, 2, 3]
console.log(result); // [4, 5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(1, 2, 100, 200, 300);
console.log(arr); // [1, 100, 200, 300, 4, 5]
console.log(result); // [2, 3]

arr = [1, 2, 3, 4, 5];
result = arr.splice(2, 0, 100, 200);
console.log(arr); // [1, 2, 100, 200, 3, 4, 5]
console.log(result); // []

// join() : 배열의 요소를 구분자로 연결한 문자열을 만들어서 반환
// 구분문자는 디폴트가 ','
arr = [1, 2, 3, 4];
result = arr.join('a');

console.log(result);

// sort() : 배열의 요소를 문자열로써 변환 후 오름차순 정렬 하고, 정렬된 배열을 반환
// 원본 변경
// (a - b)가 양수일 경우, a가 큰 수, b가 작은 수로 인식하여 정렬
// (a - b)가 음수일 경우, a가 작은 수 , b가 큰 수로 인식하여 정렬
// (a - b)가 0일 경우, 같은 값으로 인식하여 정렬하지 않음
arr = [4, 3, 6, 1, 2, 5, 10];
result = arr.sort((a, b) => a - b); // 숫자 오름차순 정렬
// result = arr.sort((a, b) => b - a); // 숫자 내림차순 정렬
console.log(arr);
console.log(result);

// map() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후, 그 결과를 새로운 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 모든 요소의 값 *2를 한 결과를 얻고 싶다.
// [2, 4, 6, 8 ... 20]

let copyArr = [];
for(let val of arr ) {
    copyArr[copyArr.length] = val * 2;
}

let mapArr = arr.map(val => val * 2);
// "=>" function 생략
// 맞는지는 모르겠지만 function(val){ (val * 2)} 내가 생각하기엔 이게 이거라는거 같음


// some() : 배열의 모든요소에 대해서 콜백함수를 반복 실행하고,
// 조건에 만족하는 결과가 하나라도 있으면 true, 만족하는 결과가 하나도 없으면 false
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

result = arr.some(val => val === 5);

// every() : 배열의 모든 요소에 대해서 콜백함수를 반복하고 실행 
// 모든 결과가 만족하면 true, 하나라도 만족하지않으면 false

arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];  

result = arr.every(val => val >= 1);

// filter() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
// 조건에 맞는 요소만 모아서 배열로 반환

arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.filter(val => val % 3 === 0); // [3, 6, 9]

// foreach() : 배열에 모든요소에 대해서 콜백 함수를 반복 실행
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

arr.forEach((val, key) => console.log(`key : ${key}, val : ${val}`));