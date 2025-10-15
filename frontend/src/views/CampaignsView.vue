<script setup lang="ts">
import { ref } from 'vue'
// Importamos o RouterLink para usar nos botões de navegação
import { RouterLink } from 'vue-router'

// Definimos a "forma" dos dados de uma campanha para o TypeScript
interface Campaign {
  id: number
  name: string
  description: string
  role: 'Mestre' | 'Jogador'
}

// Criamos dados de mockup (simulados) para popular a tela
const campaigns = ref<Campaign[]>([
  {
    id: 1,
    name: 'As Cavernas do Eco Perdido',
    description: 'Uma aventura clássica de exploração e perigo em masmorras.',
    role: 'Mestre',
  },
  {
    id: 2,
    name: 'Sombras sobre a Metrópole',
    description: 'Investigação e intriga em uma cidade cyberpunk cheia de segredos.',
    role: 'Jogador',
  },
  {
    id: 3,
    name: 'A Última Centelha',
    description: 'Uma jornada épica para salvar a magia que resta no mundo.',
    role: 'Jogador',
  },
])
</script>

<template>
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="display-5">Minhas Campanhas</h1>
    <button class="btn btn-primary btn-lg">+ Criar Nova Campanha</button>
  </div>

  <div class="row g-4">
    <div v-for="campaign in campaigns" :key="campaign.id" class="col-md-6 col-lg-4">
      <div class="card h-100 bg-dark text-white border-secondary">
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between">
            <h5 class="card-title fs-4">{{ campaign.name }}</h5>
            <span
              :class="[
                'badge',
                'align-self-start',
                campaign.role === 'Mestre' ? 'bg-primary' : 'bg-secondary',
              ]"
            >
              {{ campaign.role }}
            </span>
          </div>
          <p class="card-text text-white-50">{{ campaign.description }}</p>

          <div class="mt-auto d-grid gap-2 d-sm-block">
            <RouterLink :to="`/campaign/${campaign.id}`" class="btn btn-outline-primary">
              Entrar na Campanha
            </RouterLink>

            <RouterLink
              v-if="campaign.role === 'Mestre'"
              :to="`/campaign/${campaign.id}/manage`"
              class="btn btn-outline-secondary ms-sm-2"
            >
              Gerenciar
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Adicionamos uma transição suave e um efeito de 'levantar' no hover do card */
.card {
  transition:
    transform 0.2s ease-in-out,
    border-color 0.2s ease-in-out;
}
.card:hover {
  transform: translateY(-5px);
  border-color: var(--bs-primary) !important; /* Usa a cor primária que definimos */
}

/* Estilo customizado para a borda do card */
.border-secondary {
  border-color: rgba(0, 44, 255, 0.3) !important;
}
</style>
