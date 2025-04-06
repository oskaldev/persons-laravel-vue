<script>
  import { defineComponent } from 'vue'

  export default defineComponent({
    data() {
      return {
        persons: [
          {
            name: 'Vasay',
            age: 20,
          },
          {
            name: 'Artem',
            age: 21,
          },
          {
            name: 'Den',
            age: 30,
          },
          {
            name: 'Olya',
            age: 23,
          },
          {
            name: 'Saha',
            age: 44,
          },
        ],
      }
    },
    methods: {
      sayHello() {
        console.log('Hello1')
      },
      sayHi() {
        console.log('Hello2')
      }
    },
    computed: {
      artemJob() {
        return this.name + ' работает разрабом'
      },
      personsAgeTwenty() {
        return this.persons.filter((person) => {
          return person.age > 20
        })
      }
    }
  })
</script>

<template>
  <div class="not-prose overflow-auto rounded-lg bg-white outline outline-white/5 dark:bg-gray-950/50">
    <div class="m-7 overflow-hidden">
      <table class="w-full table-fixed border-collapse text-sm ">
        <thead>
          <tr>
            <th class="border-b border-gray-200 p-4 pt-0 pb-3 pl-8 text-left font-medium text-gray-400 dark:border-gray-600 dark:text-gray-200">Index</th>
            <th class="border-b border-gray-200 p-4 pt-0 pb-3 text-left font-medium text-gray-400 dark:border-gray-600 dark:text-gray-200">Name</th>
            <th class="border-b border-gray-200 p-4 pt-0 pr-8 pb-3 text-left font-medium text-gray-400 dark:border-gray-600 dark:text-gray-200">Age</th>
          </tr>
        </thead>
        <tbody v-for="(person, index) in personsAgeTwenty" :key="index" class="bg-white dark:bg-gray-800">
          <tr>
            <td class="border-b border-gray-100 p-4 pl-8 text-gray-500 dark:border-gray-700 dark:text-gray-400">{{ index + 1 }}</td>
            <td class="border-b border-gray-100 p-4 text-gray-500 dark:border-gray-700 dark:text-gray-400">{{ person.name }}</td>
            <td class="border-b border-gray-100 p-4 pr-8 text-gray-500 dark:border-gray-700 dark:text-gray-400">{{ person.age }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- <div>Name : {{ name }}</div>
  <div>Job : {{ artemJob }}</div>
  <button @click="sayHello">Hi1</button>
  <button @click="sayHi">Hi2</button> -->
</template>

<style scoped></style>