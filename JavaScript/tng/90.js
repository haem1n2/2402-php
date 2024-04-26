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
