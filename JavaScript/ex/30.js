// Date 객체 


// 요일 한글로 변환 함수
const changeDayToKoreanDay = num => {
    switch(num) {
        case 0:
            return '일요일';
        case 1:
            return '월요일';
        case 2:
            return '화요일';
        case 3:
            return '수요일';
        case 4:
            return '목요일';
        case 5:
            return '금요일';
        case 6:
            return '토요일';
    }
}

// 앞에 0을 추가해주는 함수
const lpadZero = (val, length) => {
    let str = String(val);
    String(val).padStart(length, '0')
}



// 현재날짜/시간 획득 
const NOW = new Date();

// getfullYear() : 연도만 가져오는 메소드 (yyyy)
const YEAR = NOW.getFullYear();

//getMonth() : 월만 가져오는 메소드, 0 ~ 11을 획득 
const MONTH = lpadZero(NOW.getFullYear() + 1, 2);

// getDate() : 일을 가져오는 메소드
const DATE = lpadZero(NOW.getDate(), 2);

// getHours() : 시를 가져오는 메소드
const HOUR = lpadZero(NOW.getHours(), 2);

// getHours() : 분을 가져오는 메소드
const MINUTES= lpadZero(NOW.getMinutes(), 2);

// getSeconds() : 초를 가져오는 메소드
const SECOND = lpadZero(NOW.getSeconds(), 2);

// getMilliseconds() : 미리초를 가져오는 메소드
const MILLISECONDS = lpadZero(NOW.getMilliseconds(), 3);

// getDay() : 요일을 가져오는 메소드, 0(일)~6(토) 반환
const DAY = NOW.getDay();

const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOUR}:${MINUTES}:${SECOND}, ${changeDayToKoreanDay(DAY)}`;


// getTime() : UNIX 타임스탬프를 반환
const TIME = NOW.getTime();

// 일수 차이 
const TARGET_DATE = new Date('2024-04-03');

const DIFF_DATE = Math.floor(Math.abs(TARGET_DATE - NOW) / 86400000)

// 1000*60*60*24 = 86400000

// 2024-01-01 13:00:00과 2025-05-30은 몇 개월 후입니까 ?
const  LEE = new Date('2024-01-01 13:00:00');
const  HYUNSOO = new Date('2025-05-30 00:00:00');

const DDIFF_DATE = Math.floor(Math.abs((HYUNSOO - LEE) / (86400000 * 30)) );

// 강사님이랑 같이
const TARGET_DATE1 = new Date('2024-01-01 13:00:00');
const TARGET_DATE2 = new Date('2025-05-30 00:00:00');

const DIFF_DATE2 = Math.floor(Math.abs(TARGET_DATE1-TARGET_DATE2) / (1000*60*60*24*30));

