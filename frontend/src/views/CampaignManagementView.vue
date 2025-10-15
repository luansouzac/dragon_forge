<script setup lang="ts">
// Mockup de dados para a visão do mestre
const campaign = {
  name: 'As Cavernas do Eco Perdido',
  description: 'Uma aventura clássica de exploração e perigo em masmorras.',
}

const players = [
  { id: 1, playerName: 'Carlos', charName: 'Gael, o Bárbaro', charClass: 'Guerreiro' },
  { id: 2, playerName: 'Fernanda', charName: 'Lyra, a Maga', charClass: 'Maga' },
]
</script>

<template>
  <h1 class="display-5 mb-1">Gerenciar Campanha</h1>
  <h2 class="text-primary mb-4">{{ campaign.name }}</h2>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card bg-dark border-secondary">
        <div class="card-body">
          <h5 class="card-title">Link de Convite</h5>
          <p class="card-text text-white-50">
            Compartilhe este link para que seus amigos possam entrar na campanha.
          </p>
          <input
            type="text"
            readonly
            class="form-control mb-2"
            value="https://dragonforge.com/invite/a3b8x9c2"
          />
          <RouterLink
            :to="`/campaign/${$route.params.id}/create-character`"
            class="btn btn-outline-primary w-100"
          >
            Simular Aceite do Convite
          </RouterLink>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card bg-dark border-secondary">
        <div class="card-header fs-5">Jogadores na Campanha ({{ players.length }})</div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li
              v-for="player in players"
              :key="player.id"
              class="list-group-item bg-transparent text-white d-flex justify-content-between align-items-center"
            >
              <div>
                <div class="fw-bold">{{ player.charName }}</div>
                <small class="text-white-50"
                  >{{ player.playerName }} - {{ player.charClass }}</small
                >
              </div>
              <RouterLink :to="`/character/${player.id}`" class="btn btn-sm btn-outline-primary">
                Ver Ficha
              </RouterLink>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Reutilizando os estilos do formulário para o input do link */
.form-control {
  background-color: #0a0a0a;
  border-color: rgba(0, 44, 255, 0.4);
  color: #ffffff;
}
.border-secondary {
  border-color: rgba(0, 44, 255, 0.3) !important;
}
</style>
