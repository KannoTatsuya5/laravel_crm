<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const newTitle = ref('');
const newContent = ref('');
</script>

<template>
    inertiaテストです。<br>
    <a href="/">aタグ経由です</a><br>
    <Link href="/">Link経由です</Link><br><br>
    <Link v-bind:href="route('inertia.index')">名前付きルートの確認です</Link><br>
    <Link v-bind:href="route('inertia.show', {id:1})">ルートパラメータのテスト</Link>

    <div class="mb-8"></div>
    <input type="text" name="newTitle" v-model="newTitle"><br>
    <input type="text" name="newContent" v-model="newContent"><br>
    <Link as="button" v-bind:href="route('inertia.store')" :data="{
        title:newTitle,
        content:newContent
    }" method="POST">DB保存テスト</Link>
</template>