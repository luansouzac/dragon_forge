<script setup lang="ts">
import { RouterLink } from 'vue-router'
</script>

<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary">
    <div class="container">
      <RouterLink to="/" class="navbar-brand fw-bold fs-4">
        🐉 Dragon Forge
      </RouterLink>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <RouterLink to="/campaigns" class="nav-link">Minhas Campanhas</RouterLink>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">Perfil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
  .border-secondary {
    border-color: rgba(0, 44, 255, 0.3) !important;
  }
</style>