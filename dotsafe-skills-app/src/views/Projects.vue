<template>
  <div class="projects">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex justify-content-start align-items-center">
        <div class="font-weight-bold mr-3">
          Filtrer par :
        </div>
        <div id="member-select-container" class="d-flex flex-column pl-5">
          <label class="m-0" for="member-select">Membre</label>
          <select name="member" id="member-select" @change=getMemberProjects($event)>
            <option value="all">---Tous---</option>
            <option v-for="member in members" :key="member.id" :value="member.id">{{ member.firstname + ' ' + member.lastname}}</option>
          </select>
        </div>
        <div id="technology-select-container" class="d-flex flex-column pl-5">
          <label class="m-0" for="technology-select">Technologie</label>
          <select name="technology" id="technology-select" @change=getTechnologyProjects($event)>
            <option value="all">---Toutes---</option>
            <option v-for="technology in technologies" :key="technology.id" :value="technology.id">{{ technology.name}}</option>
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
      technologies: [],
    }
  },
  methods: {
    getAddForm() {
      const addInputContainer = document.getElementById('project-input-container');
      if (addInputContainer.classList.contains('d-none')) {
        addInputContainer.classList.replace('d-none', 'd-flex');
      } else {
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
          .post(apiRoot + 'projects', newProject)
          .then(response => (this.dotsafeProjects.push(response.data)))
          .catch(error => console.log(error));
      const addInputContainer = document.getElementById('project-input-container');
      addInputContainer.classList.replace('d-flex', 'd-none');

    },
    modifyProject(payload) {
      const updatedProject = {name: payload.newName};
      axios
          .put(apiRoot + 'projects/' + payload.projectToModify.id, updatedProject)
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
    getMemberProjects(event) {
      if (event) {
        let memberValue = event.target.value;
        let technologyValue = document.getElementById("technology-select").value;
        let projects = [];
        if (memberValue === "all") {
          this.getTechnologyAllProjects(technologyValue);
        } else {
        axios
            .get(apiRoot + 'members/' + memberValue + '/contributions')
            .then((response) => {
              for (let i = 0; i < response.data.length; i++) {
                if (technologyValue === "all") {
                  projects.push(response.data[i]["project"]);
                } else {
                  if (response.data[i]["technology"].id === technologyValue) {
                    projects.push(response.data[i]["project"]);
                  }
                }
              }
              this.dotsafeProjects = projects;
            })
            .catch(error => console.log(error));
        }
      }
    },
    getAllTechnologies() {
      axios
          .get(apiRoot + 'technologies')
          .then(response => (this.technologies = response.data))
          .catch(error => console.log(error));
    },
    getTechnologyProjects(event) {
      if (event) {
        let memberValue = document.getElementById('member-select').value;
        let technologyValue = event.target.value;
        console.log(technologyValue)
        if (memberValue === "all") {
          this.getTechnologyAllProjects(technologyValue);
        } else {
          let projects = [];
          if (technologyValue === "all")  {
            this.getMemberAllProjects(memberValue);
          } else {
            axios
                .get(apiRoot + 'members/' + memberValue + '/contributions')
                .then(response => {
                  for (let i = 0; i < response.data.length; i++) {
                    if (response.data[i].technology.id === parseInt(technologyValue)) {
                      projects.push(response.data[i].project)
                    }
                  }
                  this.dotsafeProjects = projects;
                })
                .catch(error => console.log(error));
          }
        }
      }
    },
    getMemberAllProjects(member) {
      let projects = [];
      axios
          .get(apiRoot + 'members/' + member + '/contributions')
          .then(response => {
            let projectsIds = [];
            for (let i = 0; i < response.data.length; i++) {
              let project = response.data[i].project;
              if (!projectsIds.includes(project.id)) {
                projectsIds.push(project.id)
                projects.push(project)
              }
            }
            this.dotsafeProjects = projects
          })
          .catch(error => console.log(error));
    },
    getTechnologyAllProjects(techno) {
      let projects = [];
      axios
          .get(apiRoot + 'technologies/' + techno + '/contributions')
          .then(response => {
            let projectsIds = [];
            for (let i = 0; i < response.data.length; i++) {
              let project = response.data[i].project;
              if (!projectsIds.includes(project.id)) {
                projectsIds.push(project.id)
                projects.push(project)
              }
            }
            this.dotsafeProjects = projects
          })
          .catch(error => console.log(error));
    }
  },
  mounted() {
    this.getAllProjects();
    this.getAllMembers();
    this.getAllTechnologies();
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
#member-select-container {
  border-left: solid 1px;
}
</style>
