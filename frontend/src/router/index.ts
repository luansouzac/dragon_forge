import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CampaignsView from '../views/CampaignsView.vue'
import LiveGameView from '@/views/LiveGameView.vue'
import CharacterCreationView from '@/views/CharacterCreationView.vue'
import CampaignManagementView from '@/views/CampaignManagementView.vue'
import CharacterSheetView from '@/views/CharacterSheetView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/campaigns',
      name: 'campaigns',
      component: CampaignsView,
    },
    {
      path: '/campaign/:id',
      name: 'live-game',
      component: LiveGameView,
    },
    {
      path: '/campaign/:id/create-character',
      name: 'character-creation',
      component: () => CharacterCreationView,
    },
    {
      path: '/campaign/:id/manage',
      name: 'campaign-management',
      component: () => CampaignManagementView,
    },
    {
      path: '/character/:id', // Rota dinâmica para uma ficha específica
      name: 'character-sheet',
      component: () => CharacterSheetView,
    },
  ],
})

export default router
