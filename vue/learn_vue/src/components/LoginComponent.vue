<template>
    <h1>로그인</h1>
    <input type="text" v-model="inputData.account" placeholder="아이디">
    <br>
    <input type="text" v-model="inputData.password" placeholder="비밀번호">
    <br>
    <button @click="store.commit('setAccount', inputData.account)">로그인</button>
    <P>{{store.state.account}}</P>
  </template>
  
<script setup>
import { reactive } from 'vue';
import { useStore } from 'vuex';


const store = useStore();

const inputData = reactive({
  account: '',
  password: '',
});

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>