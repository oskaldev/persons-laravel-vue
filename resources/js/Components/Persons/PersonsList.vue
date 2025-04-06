<script>
  import axios from 'axios'
  import { defineComponent } from 'vue'
  import PersonsCreate from './PersonsCreate.vue'

  export default defineComponent({
    components: {
      PersonsCreate
    },
    data() {
      return {
        persons: null
      }
    },
    mounted() {
      this.getPersons()
    },
    methods: {
      getPersons() {
        axios.get('api/persons')
          .then(data => {
            // console.log(data);
            this.persons = data.data.data
          })
      },
      deletePerson(id) {
        axios.delete(`api/persons/${id}`)
          .then(data => {
            console.log(data)
            this.persons = this.persons.filter(p => p.id !== id)
          })
          .catch(err => {
            console.error('Ошибка при удалении:', err)
          })
      }
    },
    computed: {
    }
  })
</script>

<template>
  <!-- <PersonsCreate /> -->
  <h3 class="mt-8 text-center text-3xl font-semibold mb-4">
    Persons List
  </h3>
  <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
    <table class="w-full text-left table-auto min-w-max">
      <thead>
        <tr>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
              Id
            </p>
          </th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
              Name
            </p>
          </th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
              Age
            </p>
          </th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
              Job
            </p>
          </th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
          </th>
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(person, index) in persons" :key="index">
          <td class="p-4 border-b border-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
              {{ person.id }}
            </p>
          </td>
          <td class="p-4 border-b border-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
              {{ person.name }}
            </p>
          </td>
          <td class="p-4 border-b border-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
              {{ person.age }}
            </p>
          </td>
          <td class="p-4 border-b border-blue-gray-50">
            <p v-if="!person.job" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
              Безработный
            </p>
            <p v-else class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
              {{ person.job }}
            </p>
          </td>
          <td class="p-4 border-b border-blue-gray-50">
            <router-link :to="{ name: 'person.edit', params: { id: person.id } }"
              class="cursor-pointer text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
              Edit
            </router-link>
          </td>
          <td class="p-4 border-b border-blue-gray-50">
            <button @click.prevent="deletePerson(person.id)"
              class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped></style>