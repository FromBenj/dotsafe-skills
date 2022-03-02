import { createRouter, createWebHistory } from 'vue-router'
import Projects from "@/views/Projects.vue";
import Members from "@/views/Members.vue";
import Technologies from "@/views/Technologies";

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Projects
  },
  {
    path: '/projects',
    name: 'projects',
    component: Projects
  },
  {
    path: '/technologies',
    name: 'technologies',
    component: Technologies
  },
  {
    path: '/members',
    name: 'members',
    component: Members
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
