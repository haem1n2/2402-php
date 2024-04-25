// 타이머 함수

// setTimeout(콜백함수, 시간(ms)) : 일정 시간이 흐른 후에 콜백 함수를 실행
setTimeout(() => (console.log('타임아웃')), 5000); 

// 1초 뒤 a, 2초 뒤 b, 3초 뒤 c출력
    setTimeout(() => (console.log('a')), 1000); 
    setTimeout(() => (console.log('b')), 2000); 
    setTimeout(() => (console.log('c')), 3000); 

    console.log('A');
    setTimeout(() => console.log('B'),  1000);
    console.log('c');

    console.log('A');
    setTimeout(() => {
        console.log('B');
        console.log('C');
    }, 1000);

    // clearTimeout(타임아웃ID) : 해당 타임아웃ID의 처리를 제거 
    const TIMEOUT_ID = setTimeout(() => console.log('ttt'), 5000);
    clearTimeout(TIMEOUT_ID);
    console.log(TIMEOUT_ID);


    // setInterval(콜백함수, 시간(ms)[, 아규먼트1, 아규먼트2]) : 일정 시간마다 콜백함수 실행  
    const INTERVAL_ID = setInterval(() => console.log('인터벌'), 1000);
    // let cnt =1;
    // setInterval(() => {
    //     console.log('인터벌' + cnt);
    //     cnt++;
    // }, 1000);

    // clearInterval(intervalID) : 해당 intervalID 처리 제거
    clearInterval(INTERVAL_ID);

    //화면에 5초 뒤에 '두두둥장' 이라는 매우 큰 글씨가 나타나게 해주세요.
    const TITLE = document.querySelector('body');
    setTimeout(() => {
        TITLE.style.fontSize = '400px';
        TITLE.textContent = '두두둥장';
        
        const REMOVE = setTimeout(() => {
            TITLE.textContent = '';
    }, 3000);

    }, 5000);
    



    // 강사님 방법
    // setTimeout(() => {
    //     const H1 = document.createElement('h1'); // h1 태그 생성
    //     H1.innerHTML = '두둥장'; // H1태그 컨텐츠 삽입
    //     H1.style.fontSize = '5rem'; // body에 h1 추가

    //     setTimeout(() => {
    //         const DEL_H1 = document.querySelector('h1');
    //         document.body.removeChild(DEL_H1); // h1요소 삭제 
    //     }, 3000)

    // }, 5000);


    // 콜백 지옥 
    // setTimeout(() => (console.log('a')), 3000); 
    // setTimeout(() => (console.log('b')), 2000); 
    // setTimeout(() => (console.log('c')), 1000); 

    settimeout(() => {
        console.log('A')
        setTimeout(() => {
            console.log('B');
            setTimeout(() => {
                console.log('C');
            }, 1000);
        }, 2000);
    }, 3000);