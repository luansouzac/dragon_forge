<script setup lang="ts">
import { ref } from 'vue';

// Mockup dos dados do formulário
const character = ref({
  name: '',
  race: '',
  class: '',
  backstory: '',
});

// Mockup dos atributos para serem gerados dinamicamente
const attributes = ref([
  { name: 'Força', value: 10 },
  { name: 'Destreza', value: 10 },
  { name: 'Constituição', value: 10 },
  { name: 'Inteligência', value: 10 },
  { name: 'Sabedoria', value: 10 },
  { name: 'Carisma', value: 10 },
]);
</script>

<template>
  <div class="card bg-dark text-white border-secondary">
    <div class="card-header">
      <h1 class="display-5">Criação de Personagem</h1>
      <p class="lead text-white-50">Dê vida ao seu novo herói para a campanha "[Nome da Campanha]".</p>
    </div>
    <div class="card-body">
      <form @submit.prevent>
        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <label for="charName" class="form-label">Nome do Personagem</label>
            <input type="text" class="form-control" id="charName" v-model="character.name" placeholder="Gael, o Bárbaro">
          </div>
          <div class="col-md-3">
            <label for="charRace" class="form-label">Raça</label>
            <select id="charRace" class="form-select" v-model="character.race">
              <option selected disabled value="">Escolha...</option>
              <option>Humano</option>
              <option>Elfo</option>
              <option>Anão</option>
              <option>Halfling</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="charClass" class="form-label">Classe</label>
            <select id="charClass" class="form-select" v-model="character.class">
              <option selected disabled value="">Escolha...</option>
              <option>Guerreiro</option>
              <option>Mago</option>
              <option>Ladino</option>
              <option>Clérigo</option>
            </select>
          </div>
        </div>

        <h3 class="mt-4">Atributos</h3>
        <div class="row g-3 mb-3">
          <div v-for="attr in attributes" :key="attr.name" class="col-md-2 col-6">
            <label :for="`attr-${attr.name}`" class="form-label text-center d-block">{{ attr.name }}</label>
            <input type="number" class="form-control form-control-lg text-center" :id="`attr-${attr.name}`" v-model="attr.value">
          </div>
        </div>
        
        <div class="mb-3">
            <label for="charBackstory" class="form-label">História do Personagem</label>
            <textarea class="form-control" id="charBackstory" rows="5" v-model="character.backstory" placeholder="Descreva a origem, motivações e aparência do seu personagem..."></textarea>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary btn-lg">Salvar Ficha</button>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>
  /* Estilos para os formulários com nosso tema escuro */
  .form-control, .form-select {
    background-color: #0A0A0A;
    border-color: rgba(0, 44, 255, 0.4);
    color: #FFFFFF;
  }
  .form-control:focus, .form-select:focus {
    background-color: #0A0A0A;
    border-color: var(--bs-primary);
    color: #FFFFFF;
    box-shadow: 0 0 0 0.25rem rgba(0, 160, 255, 0.25);
  }
  .form-control::placeholder {
    color: #6c757d;
  }
</style>