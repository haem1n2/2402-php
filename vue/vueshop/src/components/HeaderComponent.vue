<template>
    <div class ="nav">
    <a v-for="item in data.nav" :key="item.listName" href="#">{{ item.listName }}</a>
    <!-- 나브의 컨텐츠를 데이터 바인딩하고, 리스트 렌더링 처리를 해주세요. -->
    </div>
</template>

<script setup>
import { defineProps} from 'vue';

const data = defineProps({
    'nav': Array
});

console.log(data);
</script>

<style>
</style>