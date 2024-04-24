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

