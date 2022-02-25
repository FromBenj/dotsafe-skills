<template>
  <div>
    {{name}}
  </div>
</template>

<script>
export default {
  name: 'Member',
  props: {
    name: {
      type: String,
      required: true
    },
  }
}
</script>


<style scoped>

</style>
