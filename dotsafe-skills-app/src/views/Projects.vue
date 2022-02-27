<template>
  <div class="projects">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex justify-content-start align-items-center">
        <div class="mr-3">
          Filtrer par:
        </div>
        <div>
          <select name="member" id="member-select">
            <option value="">MEMBRE</option>
            <option value="all">---Tous---</option>
            <option v-for="member in members" :key="member.id" :value="member.id">{{ member.firstname + ' ' + member.lastname}}</option>
          </select>
        </div>
      </div>
      <div id="add-button-container" @click="getAddForm" class="d-flex justify-content-end align-items-center">
        <div>Rajouter un projet</div>
        <div id="add-button" class="ml-3 text-right"> + </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
    <div id="project-input-container" class="input-group d-none">
      <input id="project-input" type="text" class="form-control" placeholder="Nom du projet" aria-label="Nouveau projet" aria-describedby="validation-button">
      <div class="input-group-append">
        <span class="input-group-text" id="validation-button" @click="addProject">Ajouter</span>
      </div>
    </div>
    </div>
    <div class="container-fluid mt-3">
      <div class="row">
        <Project v-for="project in dotsafeProjects"
                 :project="project"
                 @modify-project="modifyProject"
                 :key="project.id"
                 @delete-project="deleteProject"
        />
      </div>
    </div>
  </div>
</template>

<script>

import Project from '@/components/Project.vue'
import axios from 'axios'
import {apiRoot} from '@/API-config'


export default {
  name: 'Projects',
  components: {
    Project
  },
  data() {
    return {
      dotsafeProjects: [],
      members: [],
      member: {}
    }
  },
  methods: {
    getAddForm() {
      const addInputContainer = document.getElementById('project-input-container');
      if (addInputContainer.classList.contains('d-none')) {
        addInputContainer.classList.replace('d-none', 'd-flex');
      } else{
        addInputContainer.classList.replace('d-flex', 'd-none');
      }
    },
    getAllProjects() {
      axios
          .get(apiRoot + 'projects')
          .then(response => (this.dotsafeProjects = response.data))
          .catch(error => console.log(error));
    },
    addProject() {
      const projectInput = document.getElementById('project-input')
      let newProject = {name: projectInput.value}
      axios
          .post(apiRoot + 'projects', newProject )
          .then(response => (this.dotsafeProjects.push(response.data)))
          .catch(error => console.log(error));
      const addInputContainer = document.getElementById('project-input-container');
      addInputContainer.classList.replace('d-flex', 'd-none');

    },
    modifyProject(payload) {
      const updatedProject = {name: payload.newName};
      axios
          .put(apiRoot + 'projects/' + payload.projectToModify.id, updatedProject )
          .then(() => (this.getAllProjects()))
          .catch(error => console.log(error));
      const closeButton = document.getElementById('modify-close-button-' + payload.projectToModify.id);
      closeButton.click();
    },
    deleteProject(payload) {
      let modalBack = document.getElementsByClassName("modal-backdrop fade show");
      for (let i = 0; i < modalBack.length; i++) {
        modalBack[i].style.display = "none";
      }
      axios
          .delete(apiRoot + 'projects/' + payload.project.id)
          .then(() => (this.getAllProjects()))
          .catch(error => console.log(error));
    },
    getAllMembers() {
      axios
          .get(apiRoot + 'members')
          .then(response => (this.members = response.data))
          .catch(error => console.log(error));
    },
    getMemberProjects() {
      const memberSelect = document.getElementById('member-select')
      memberSelect.addEventListener('change', function() {
        //let memberId = this.value;
/*        axios
            .get(apiRoot + 'members/' + memberId)
            .then(response => (console.log(response.data.contributions[0])))
            .catch(error => console.log(error));
 */
        axios
            .get(apiRoot + 'contributions')
            .then(response => (console.log(response.data)))
            .catch(error => console.log(error));
      })
    }
  },
  mounted() {
    this.getAllProjects();
    this.getAllMembers();
    this.getMemberProjects();
  }
}
</script>

<style scoped>
#add-button-container {
  cursor: pointer;
  transition: all 0.1s;
}
#add-button-container:hover{
  border-bottom: solid;
}
#add-button {
  font-weight: bold;
  width: 50px;
  height: 50px;
  font-size: 34px;
}
#project-input-container {
  width: 30rem;
}
#validation-button {
  cursor: pointer;
}
</style>
