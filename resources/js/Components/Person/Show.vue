<script>
  import axios from 'axios'

  export default {
    data() {
      return {
        person: null
      }
    },
    mounted() {
      this.getPerson()
    },
    methods: {
      getPerson() {
        const id = this.$route.params.id
        axios.get(`/api/persons/${id}`).then(data => {
          this.person = data.data.data
          console.log(data)
        })
      },
    }
  }
</script>

<template>
  <div v-if="person" class="container mx-auto my-10">
    <h3 class="text-center text-3xl font-semibold mb-4">Person</h3>
    <div class="md:w-1/2 mx-auto">
      <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex flex-wrap justify-center mb-4">
          <div class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500">Name: {{ person.name }}</div>
          <div class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500">Age: {{ person.age }}</div>
          <div class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500">Job: {{ person.job ?? 'Безработный' }}</div>
          <div>
            <router-link :to="{ name: 'home' }" class="cursor-pointer m-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
              Home page
            </router-link>
            <router-link :to="{ name: 'person.edit', params: { id: person.id } }" class="cursor-pointer m-3 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
              Edit
            </router-link>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<style scoped></style>