<script>
  import axios from 'axios'

  export default {
    components: {
    },
    data() {
      return {
        name: null,
        age: null,
        job: null,
      }
    },
    methods: {
      addPerson() {
        axios.post('api/persons', { name: this.name, age: this.age, job: this.job })
          .then(data => {
            console.log(data)
            this.name = null
            this.age = null
            this.job = null
          })
      }
    }
  }
</script>

<template>
  <div class="container mx-auto my-10">
    <h3 class="text-center text-3xl font-semibold mb-4">
      Add Person
    </h3>
    <div class="md:w-1/2 mx-auto">
      <div class="bg-white shadow-md rounded-lg p-6">
          <div class="flex mb-4">
            <input v-model="name" type="text" class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500" id="todo-input" placeholder="Add name" required>
            <input v-model="age" type="number" class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500" id="todo-input" placeholder="Add age" required>
            <input v-model="job" type="text" class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500" id="todo-input" placeholder="Add job">
            <button @click.prevent="addPerson" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
              Add
            </button>
          </div>
      </div>
    </div>
  </div>

</template>

<style scoped></style>