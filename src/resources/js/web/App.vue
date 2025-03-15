<script setup>
import { ref } from 'vue';

const count = ref(10);
</script>

<template>
  <div class="p-4">
    <h1 class="text-xl font-bold">Vue + Vite + Laravel 動作確認</h1>
    <p class="mt-2">カウント: {{ count }}</p>
    <button @click="count++">
      カウント増加
    </button>
  </div>
</template>
