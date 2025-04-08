<script>
  import axios from 'axios'

  export default {
    components: {
    },
    data() {
      return {
        person: null
      }
    },
    mounted() {
      this.fetchPerson()
    },
    methods: {
      updatePerson() {
        axios.patch(`/api/persons/${this.person.id}`, this.person)
          .then(() => {
            this.$router.push('/')
          })
      },
      fetchPerson() {
        const id = this.$route.params.id
        axios.get(`/api/persons/${id}`).then(response => {
          this.person = response.data
        })
      }
    }
  }
</script>

<template>
  <div v-if="person" class="container mx-auto my-10">
    <h3 class="text-center text-3xl font-semibold mb-4">
      Edit Person
    </h3>

    <div class="md:w-1/2 mx-auto">
      <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center mb-4">
          <input v-model="person.name" type="text" class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Name">
          <input v-model="person.age" type="number" class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Add age">
          <input v-model="person.job" type="text" class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Add job">
          <button @click.prevent="updatePerson" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
            Update
          </button>
          <div>
            <router-link :to="{ name: 'home' }" class="cursor-pointer m-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
              Back
            </router-link>
          </div>
        </div>

      </div>
    </div>
  </div>

</template>

<style scoped></style>