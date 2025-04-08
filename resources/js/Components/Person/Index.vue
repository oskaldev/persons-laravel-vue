<script>
  import axios from 'axios'
  import PersonsCreate from './Create.vue'
  import PersonsShow from './Show.vue'

  export default {
    components: {
      PersonsCreate,
      PersonsShow
    },
    data() {
      return {
        persons: null,
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
        this.persons = this.persons.filter(p => p.id !== id)
      }
    },
    computed: {
    },
    props: [
      'obj',
    ]
  }
</script>

<template>
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
          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(person, index) in persons" :key="index">
          <PersonsShow @deletePerson="deletePerson" :person="person" />
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped></style>