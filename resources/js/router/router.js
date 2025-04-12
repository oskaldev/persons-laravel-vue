
import { createRouter, createWebHistory } from "vue-router"
import Edit from "../components/Person/Edit.vue"
import HomePage from "../pages/Persons/HomePage.vue"
import Create from "../components/Person/Create.vue"
import Show from "../components/Person/Show.vue"



const routes = [
  {
    path: '/',
    name: 'home',
    component: HomePage
  },
  {
    path: '/person/:id/edit',
    name: 'person.edit',
    component: Edit
  },
  {
    path: '/person/create',
    name: 'person.create',
    component: Create
  },
  {
    path: '/person/:id',
    name: 'person.show',
    component: Show
  },
]

const router = createRouter({
  routes,
  history: createWebHistory(import.meta.env.BASE_URL)
})

export default router