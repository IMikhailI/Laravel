import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/components/Home.vue'
import Buildings from '@/components/Buildings.vue'
import Rooms from '@/components/Rooms.vue'
import Guests from '@/components/Guests.vue'

const routes = [
  {path: '/', component: Home},
  {path: '/buildings', component: Buildings},
  {path: '/rooms', component: Rooms},
  {path: '/guests', component: Guests},
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
