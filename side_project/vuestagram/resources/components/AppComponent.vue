<template>
    <!-- header -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <router-link to="/"><h1>Vuestagram</h1></router-link>
                </div>
                <img class="img-logo" src="/1.png" alt="">
                <div class="btn-group">
                    <div v-if="!$store.state.authFlg">
                    <router-link to="/login"><button class="btn btn-header btn-bg-black">로그인</button></router-link>
                    <router-link to="/login"><button class="btn btn-header btn-bg-white">가입하기</button></router-link>
                    </div>
                    <div v-else>
                    <button class="btn btn-header btn-bg-white">로그아웃</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
<!-- main -->
    <main>
        <UserInfoComponent v-if="$store.state.authFlg" />
       
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
<!-- footer -->
    <footer>
        <p>카피라이트인데 귀찮아죽겟음 응 안해 수고</p>
    </footer>
</template>

<script setup>
import UserInfoComponent from './UserInfoComponent.vue';
</script>

<style>
@import url('../css/common.css');
</style>