<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import TheNavbar from './components/TheNavbar.vue'; 
</script>

<template>
  <div>
    <TheNavbar />

    <main class="container py-4">
      <RouterView />
    </main>
  </div>
</template>

<style scoped>
</style>