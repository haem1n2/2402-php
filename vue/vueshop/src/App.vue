<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- 헤더 -->
  <!-- props : 자식 컴포넌트에게 props 속성을 이용해서 데이터는 전달 -->
  <HeaderComponent :nav="nav" />
  <ModalDetail 
  :product="product"
  :flgModal="flgModal"
   />

  <!-- <div class ="nav">
    <a v-for="item in nav" :key="item.listName" href="#">{{ item.listName }}</a>
     나브의 컨텐츠를 데이터 바인딩하고, 리스트 렌더링 처리를 해주세요. -->
    <!-- </div> -->
  <!-- 상품 리스트 -->
  <div>
    <div v-for="(item) in products" :key="item.productName">
      <h4 @click="myOpenModal(item)">{{ item.productName }}</h4> 
      <p>{{ item.price }} 원</p>
    </div>
    <!-- <div>
      <h4 @click="myOpenModal(products[0])">{{ products[0].productName }}</h4>
      <p>{{ products[0].price }} 원</p>
    </div>
    <div>
      <h4 @click="myOpenModal(products[1])">{{ products[1].productName }}</h4>
      <p>{{ products[1].price }} 원</p>
    </div>
    <div>
      <h4 @click="myOpenModal(products[2])">{{ products[2].productName }}</h4>
      <p>{{ products[2].price }} 원</p>
    </div> -->
  </div>



</template>

<script setup>
import { ref, reactive } from 'vue';
import HeaderComponent from './components/HeaderComponent.vue'; //자식 컴포넌트 import
import ModalDetail from './components/ModalDetail.vue'; // 자식 컴포넌트 import
// import { reactive } from 'vue';

//-------------------
// 데이터 바인딩
//-------------------
// import { ref } from 'vue';

// const pants = ref('바지');
// const price = ref(10000);


const products = reactive([
{productName: '바지', price: 10000, productContent: '매우 아름다운 바지입니다.', img: require('@/assets/img/2.jpg')} 
,{productName: '티셔츠', price: 5000, productContent: '매우 아름다운 티셔츠입니다.', img: require('@/assets/img/1.jpg')}
,{productName: '양말', price: 1000, productContent: '매우 아름다운 양말입니다.', img: require('@/assets/img/3.jpg')}
]);
//----------------
// 헤더 처리
//----------------

const nav = reactive([
  {listName: '홈' }
  ,{listName: '상품' }
  ,{listName: '기타' }
]);

//----------------
// 모달용
const flgModal = ref(false); // 모달 표시용 플래그
let product = reactive({});
function myOpenModal(item) {
  flgModal.value = !flgModal.value;
  product = item;
}


</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* CSS 파일 따로 분리
.nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>
