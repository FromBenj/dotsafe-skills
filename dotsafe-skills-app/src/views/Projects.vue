<template>
  <div class="projects">
    <p>it is working</p>
    <Project name="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>

import Project from '@/components/Project.vue'
import axios from 'axios'


export default {
  name: 'Projects',
  components: {
    Project
  },
  data() {
    return {
      dotsafeProjects: []
    }
  },
  methods: {
    getProjects() {
      axios
          .get('http://localhost:8000/api/projects')
          .then(response => (
              //this.products = response.data
              console.log(response.data)
          .catch(error => console.log(error))
          ));
    },
  },
  created() {
    this.getProjects();
  }
}
</script>
