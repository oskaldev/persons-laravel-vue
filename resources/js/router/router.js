
import { createRouter, createWebHistory } from "vue-router"
import PersonEdit from "../Components/Persons/PersonEdit.vue"
import HomePage from "../Pages/Persons/HomePage.vue"



const routes = [
  {
    path: '/',
    name: 'home',
    component: HomePage
  },
  {
    path: '/person/:id/edit',
    name: 'person.edit',
    component: PersonEdit
  },
]

const router = createRouter({
  routes,
  history: createWebHistory(import.meta.env.BASE_URL)
})

export default router