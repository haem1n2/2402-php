
const TEXT = document.querySelector('.text');

let HI;


const lpadZero = (val, length) => {
    return String(val).padStart(length, '0');
}

// 실시간으로 시간을 화면에 표시 
function two () {
    const NOW = new  Date();
    const HOUR = lpadZero(NOW.getHours(), 2);
    const MINUTES= lpadZero(NOW.getMinutes(), 2);
    const SECOND = lpadZero(NOW.getSeconds(), 2);

    let te;

    if (HOUR >= 12) {
        te = '오후';
    } else {
        te = '오전';
    }

    const DATE1 = `현재 시간 ${te} ${HOUR % 12}:${MINUTES}:${SECOND}`;
    
    TEXT.textContent = DATE1;
}


two();
HI = setInterval(two, 1000);

// 멈춰 버튼을 누르면, 시간이 정지할 것 
function btn_stop() {
    clearInterval(HI);
}

const STOP_BTN = document.querySelector('.stop');
STOP_BTN.addEventListener('click', btn_stop);

// 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시
 function re_start() {
    HI = setInterval(two, 1000);
 }

 const START_RE = document.querySelector('.restart');
 START_RE.addEventListener('click', re_start);