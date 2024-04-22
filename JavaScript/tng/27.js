// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [ 6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];

result = ARR1.sort((a, b) => a - b);
console.log(result)

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

let copyArr = [];
let copyArr2 = [];

for(let val of ARR2) {
   if(val % 2 === 0) {
    copyArr.push(val);
} else {
    copyArr2.push(val);
}
}

console.log(copyArr);
console.log(copyArr2);