const BTN = document.querySelector('#btn');
BTN.addEventListener('click', () => (alert('"안녕하세요"')));
BTN.addEventListener('click', function(){
    alert('"숨어있는 DIV를 찾아보세요."');
});

const TWO = document.querySelector('.two');
function ww() {
    alert("두근두근");
} 
TWO.addEventListener('mouseenter', (ww));

const THREE = document.querySelector('.two')
function one() {
    alert('"들켰다!"');
    THREE.style.backgroundColor = 'beige';
    THREE.removeEventListener('click', one);
    THREE.addEventListener('click', on);
    TWO.removeEventListener('mouseenter', ww);
}

function on() {
    alert('"다시 숨는다."');
    THREE.style.backgroundColor = 'transparent';
    THREE.removeEventListener('click', on);
    THREE.addEventListener('click', one);
    TWO.addEventListener('mouseenter', ww);
}

THREE.addEventListener('click', one);

// 강사님 방법

// 함수 두근두근
const myDokidoki = () => {
    alert('두근두근');
}

// 함수 들켰다.
const myBusted = () => {
    const DIV_CONTAINER = document.querySelector('.container');
    const DIV_BOX = document.querySelector('.box');
    alert('들켰다.');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', myBusted); // 기존 들켰다 이벤트 제거
    DIV_BOX.addEventListener('click', myHide);// 숨는다 이벤트 추가
    
    DIV_CONTAINER.removerEventListener('mouseenter', myDokidoki); //기존 두근두근 이벤트 제거
}

// 함수 숨는다.
const myHide = () => {
    const DIV_BOX = document.querySelector('.box');
    alert('숨는다.');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여 
    DIV_BOX.removeEventListener('click', myHide); // 기준 숨는다 이벤트 제거
    DIV_BOX.addEventListener('click', myBusted); // 들켰다 이벤트 추가

    DIV_CONTAINER.addEventListener('mouseenter', myDokidoki); //기존 두근두근 이벤트 추가

    // 랜덤 위치 조절
    // 랜덤값 * (브라우저 너비 | 높이 - div.container 너비 | 높이)의 반올림 
    const RANDOM_X = Math.round(Math.random() * (window.innerWidth - e.target.offsetWidth));
    const RANDOM_Y = Math.round(Math.random() * (window.innerHeight - e.target.offsethigth));
    DIV_CONTAINER.style.top = `${RANDOM_Y}px`;
    DIV_CONTAINER.style.left = `${RANDOM_X}px`;
}

(()=>{

// 1. 버튼을 클릭 시 아래 내용의 알러트가 나옵니다.
// "안녕하세요."
// "숨어있는 div를 찾아보세요."
const BTN_INFO = document.querySelector('#btn-info');
BTN_INFO.addEventListener('click', () => (alert('안녕하세요.\n숨어있는 div를 찾아보세요')));

// 2-1. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
//"두근두근"
const DIV_CONTAINER = document.querySelector('.container');
DIV_CONTAINER.addEventListener('mouseenter',myDokidoki);

// 2-2. 들킨 상태에서는 알러트가 안나옵니다. 안 들켰으면 계속 알러트가 나와야합니다.

// 3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
    //"들켰다!"
const DIV_BOX = document.querySelector('box');
DIV_BOX.addEventListener('click',myBusted);

 // 4. 3번의 상태에서 다시 한 번 더 클릭하면 아래의 일러트를 출력하고, 배경색이 흰색으로 바뀌어
 // "다시 숨는다."

 
})();