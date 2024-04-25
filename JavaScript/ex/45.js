// promise 객체
// js의 비동기 프로그래밍에서 근간이 되는 기법  
// 콜백지옥을 개선하기위해서 등장한 기법 


// 콜백 지옥 
// setTimeout(() => (console.log('a')), 3000); 
// setTimeout(() => (console.log('b')), 2000); 
// setTimeout(() => (console.log('c')), 1000); 

// settimeout(() => {
//     console.log('A')
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

// promise 생성
// const PRO = (str, ms) => {
// 	return new Promise((resolve, reject) => {
// 		setTimeout(()=>{
//             if(str === 'A') {
//                 resolve('성공 : A임'); // 작업 성공 resolve() 호출
//             } else {
//                 reject('실패 : A아님'); // 작업 실패 reject() 호출
//             }
// 		}, ms);
// 	});
// }

// // Promise 호출
// PRO('A', 5000)
// .then(result => console.log('then : ' + result)) // resolve가 호출 됐을 때 
// .catch(err => console.log('catch : ' + err)) // reject가 호출 됐을 때


// // 위에 콜백 지옥 개선 
// const PRO2 = (str, ms) => {
//     return new  Promise((resolve) => {
//         setTimeout(() =>  {
//             console.log(str);
//             resolve();
//         }, ms);
//     });
// }

// PRO2('A', 3000)
// .then(() => PRO2('B', 2000))
// .then(() => PRO2('C', 1000))
// .catch(() => console.log('ERROR'))
// .finally(() => console.log('파이널리'));

// 병렬 처리 방법(promise.all())
const myLoop = cnt => {
    for(let i=0; i < cnt; i++) {

    }
    console.log('myLoop 종료 : '+ cnt);
}

// myLoop(1000000);
// myLoop(10000);
// myLoop(100);

Promise.all([myLoop(1000000), myLoop(10000), myLoop(100)]);