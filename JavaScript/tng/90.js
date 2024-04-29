window.onload = function() {
    input_auto();
};

function input_auto() {
    const AUTO = document.querySelector('#input-url');
    const LINK = 'https://picsum.photos/v2/list?page=1&limit=5';
    AUTO.value = LINK;
}

function myAxiosGet() {
    const URL = document.querySelector('#input-url').value;
    
    // Axios 처리
    axios.get(URL)
    .then(response => {
        console.log(response.data);
        myMakeImg(response.data);
    })
    .catch();

}

// 사진 데이터를 화면에 추가 함수
function myMakeImg(data) {
    data.forEach(item => {
        // 부모요소 접근
        const CONTAINER = document.querySelector('.img-container');
        
        // img 태그 생성
        const ADD_IMG =  document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.style = 'width: 100%; height: 90%;';
        ADD_IMG.style.backgroundColor ='gray';


        const ADD_TEXT = document.createElement('div');
        ADD_TEXT.setAttribute('class','text');
        ADD_TEXT.style.backgroundColor = 'gray';

        const ADD_NUMBER = document.createElement('p');
        ADD_NUMBER.innerHTML = item.id; 
        ADD_NUMBER.style = 'text-align: center; font-size: 1.5rem;';

        // 이미지 화면에 추가 
        // CONTAINER.appendChild(ADD_IMG);
        ADD_TEXT.appendChild(ADD_NUMBER);
        ADD_TEXT.appendChild(ADD_IMG);
        CONTAINER.appendChild(ADD_TEXT);
    });
}


const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);


const REMOVE = document.querySelector('#btn-remove');
REMOVE.addEventListener('click', () => {
    const HI = document.querySelector('.img-container');
    HI.textContent = "";
})


// 강사님이랑 같이

// API 호출 버튼 이벤트
const btnAPI = document.querySelector('#btn-api');
btnAPI.addEventListener('click', myGetData);

// API 호출
function myGetData() {
    // url 획득
    const url = document.querySelector('#input-url').value;

    // API 요청
    // axios.get(url)
    // .then(response => {
    //     console.log(response);
    //     myMakeItem(response.data);
    // })
    // .catch(err => console.log(err));

    // try {
    //     const response = await axios.get(url);
    //     myMakeItem(response.data);
    // } catch(error) {
    //     console.log(error);
    // }

}

function myMakeItem() {
    data.forEach(item => {
        // 아이템을 추가할 부모요소 획득
        const main = document.querySelector('.main');
        // article박스 생성
        const newArticle = document.createElement('div');
        const newArticleId = document.createElement('div');
        const newImg = document.createElement('img');
        //아이템 셋팅
        newArticle.classList = 'article';
        newArticleId.classList = 'div-article-img';
        newImg.classList = 'div-article-img';
        newArticleId.textContent = item.id;
        newImg.src = item.download_url;
        // 생성한 요소 결합
        newArticle.appendChild(newArticleId);
        newArticleId.appendChild(newImg); // 아티클에 이미지 추가
        main.appendChild(newArticle); // 메인에 아티클 추가
        });
    }
    const btnMain = document.querySelector('#btn-clear');
    btnMain.addEventListener('click', () => {
    //    const main = document.querySelector('.main')
    //    main.innerHTML ='';

    // 최대 5개까지 씩 지우기
    const articleList = document.querySelectorAll('.article');

    for(let i = 0; i < 5; i++) {
        main.removeChild(articleList[articleList.length- 1 - i]);
    }
    });

    // // 지우기 해도 에러 안나게
    // for(let i = i < 5; i++) {
    //     let idx = articleList.length - 1 - i;
    //     if(idx < 0) {
    //         // index가 0보다 작으면 루프 종료 
    //         break;
    //     }
    //     main.reoveChild(articleList[idx]);
    // }