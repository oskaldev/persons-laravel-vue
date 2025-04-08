<script>
  import axios from 'axios'

  export default {
    props: [
      'person'
    ],
    emits: [ 'delete-person' ],
    methods: {
      deletePerson(id) {
        axios.delete(`api/persons/${id}`)
          .then(data => {
            console.log(data)
            this.$emit('delete-person', id)
          })
          .catch(err => {
            console.error('Ошибка при удалении:', err)
          })
      }
    }
  }
</script>

<template>
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
    <router-link :to="{ name: 'person.create' }"
      class="cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
      Add
    </router-link>
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
</template>

<style scoped></style>