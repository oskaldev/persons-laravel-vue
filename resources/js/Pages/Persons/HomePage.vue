<script>
  import PersonsList from '../../Components/Person/Index.vue'

  export default {
    data() {
      return {
      }
    },
    components: {
      PersonsList
    },
    methods: {
    },
    mounted() {
      // console.log(this.$refs.index.name)
    },
  }
</script>

<template>
  <div>
    <PersonsList />
  </div>
</template>

<style scoped></style>