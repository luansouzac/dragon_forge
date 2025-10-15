<script setup lang="ts">
// Mockup de dados para a tela de jogo
const players = [
  { id: 1, name: 'Gael, o Bárbaro', hp: 85, maxHp: 100, isCurrentTurn: true },
  { id: 2, name: 'Lyra, a Maga', hp: 50, maxHp: 60, isCurrentTurn: false },
  { id: 3, name: 'Roric, o Ladino', hp: 65, maxHp: 70, isCurrentTurn: false },
];

const gameLog = [
  { type: 'dice', player: 'Mestre', result: 'd20 🎲', value: '18 (Sucesso!)' },
  { type: 'action', player: 'Gael, o Bárbaro', text: 'ataca o goblin com seu machado.' },
  { type: 'description', player: 'Mestre', text: 'O golpe acerta em cheio, abrindo um corte profundo na criatura.' },
  { type: 'dice', player: 'Lyra, a Maga', result: 'd6 🔥', value: '4' },
];
</script>

<template>
  <div class="row g-3">
    
    <aside class="col-lg-3">
      <div class="card bg-dark border-secondary h-100">
        <div class="card-header fs-5">Jogadores na Sessão</div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li v-for="player in players" :key="player.id" 
                class="list-group-item bg-transparent text-white"
                :class="{ 'border-primary': player.isCurrentTurn }">
              
              <div class="fw-bold">{{ player.name }}</div>
              <div class="text-white-50 small">HP: {{ player.hp }} / {{ player.maxHp }}</div>
              <div class="progress mt-2" style="height: 10px;">
                <div class="progress-bar bg-success" role="progressbar" 
                     :style="{ width: (player.hp / player.maxHp) * 100 + '%' }" 
                     :aria-valuenow="player.hp" 
                     :aria-valuemin="0" 
                     :aria-valuemax="player.maxHp">
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </aside>

    <main class="col-lg-6">
       <div class="card bg-dark border-secondary h-100">
        <div class="card-header fs-5">Crônicas da Aventura</div>
        <div class="card-body" style="min-height: 60vh; overflow-y: auto;">
            <div v-for="(log, index) in gameLog" :key="index" class="mb-3">
                <p class="mb-0">
                    <span class="fw-bold" :class="log.player === 'Mestre' ? 'text-primary' : 'text-white'">{{ log.player }}: </span>
                    <span v-if="log.type === 'dice'" class="text-white-50 fst-italic">rolou {{ log.result }}... obteve </span>
                    <span v-if="log.type === 'dice'" class="fw-bold fs-5">{{ log.value }}</span>
                    <span v-else>{{ log.text }}</span>
                </p>
            </div>
        </div>
      </div>
    </main>

    <aside class="col-lg-3">
       <div class="card bg-dark border-secondary h-100">
        <div class="card-header fs-5">Minhas Ações</div>
        <div class="card-body text-center d-grid gap-3">
            <p class="text-white-50">Sua vez de agir, Gael!</p>
            <button class="btn btn-primary btn-lg">Rolar D20 (Ataque)</button>
            <button class="btn btn-outline-secondary">Usar Habilidade</button>
            <button class="btn btn-outline-info">Abrir Inventário</button>
        </div>
      </div>
    </aside>

  </div>
</template>

<style scoped>
  .border-secondary {
    border-color: rgba(0, 44, 255, 0.3) !important;
  }
  .border-primary {
    border-width: 2px;
    border-color: var(--bs-primary) !important;
  }
  .progress {
    background-color: rgba(255, 255, 255, 0.1);
  }
</style>