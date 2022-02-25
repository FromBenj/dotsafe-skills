<template>
  <div class="projects">
    <p>it is working</p>
    <div>
      <Project v-for="project in dotsafeProjects"
               :name="project.name"
               :key="project.id"
      />
    </div>
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
      dotsafeProjects: {}
    }
  },
  methods: {
    getProjects() {
      axios
          .get('http://127.0.0.1:8000/api/projects')
          .then(response => (this.dotsafeProjects = response.data))
          .catch(error => console.log(error));
      console.log(this.dotsafeProjects)
    },
  },
  mounted() {
    this.getProjects();
  }
}
</script>
