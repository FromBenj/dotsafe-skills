<template>
  <div class="col-3 col-md-2 project-container">
    <div class="project-small-border project h-100 bg-white d-flex justify-content-center align-items-center" data-toggle="modal" :data-target=fullModalPresentation>
      <h4 class="mb-0 font-weight-bold text-center">
        {{project.name}}
      </h4>
    </div>
    <div class="cursor-pointer text-center font-italic mt-2 d-flex justify-content-between">
      <p class="ml-3 action-button" data-toggle="modal" :data-target=fullModalModification >Modifier</p>
      <p class="mr-3 action-button" data-toggle="modal" :data-target=fullModalDelete>Supprimer</p>
    </div>

    <!-- Presentation modal -->
    <div class="modal fade" :id=modalPresentation tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="font-weight-bold">Présentation des contributeurs par technologie</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div  class="member-list-container" v-for="techno in this.projectInfos.technologies" :key="techno.id">
              <div class="font-weight-bold">{{techno.name}}</div>
              <ul>
                <li class="member-list" v-for="member in this.projectInfos[techno.name]" :key="member.id">
                  {{ member.firstname + " " + member.lastname }}
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modification modal -->
    <div class="modal fade" :id=modalModification tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="font-weight-bold">Nouveau nom du projet</div>
            <button type="button" :id=modifyCloseButtonId class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="input-group">
              <input :id=modificationInputId type="text" class="form-control" :placeholder="project.name" aria-label="Modification du projet" aria-describedby="modification-button">
              <div class="input-group-append">
                <span class="cursor-pointer input-group-text" :id=modifyButtonId @click="projectModification">Modifier</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete modal -->
    <div :id=modalDelete class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <button type="button" class="close d-none" :id="deleteCloseButton" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-content">
          <p class="p-2">Êtes-vous sûr/e de vouloir supprimer le projet
            <span class="font-weight-bold">{{project.name}}</span> ?
          </p>
          <div id="delete-validation-container" class="d-flex justify-content-end">
            <p class="delete-button" :id=deleteButtonId @click="projectDelete">✔</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import {apiRoot} from "@/API-config";

export default {
  name: 'Project',
  props: {
    project: {
      type: Object,
      required: true
    },
  },
  emits: ["modify-project", "delete-project"],
  data() {
    return {
      projectInfos: [],
    }
  },
  computed: {
    modalModification() {
      return "project-modification-" + this.project.id;
    },
    fullModalModification() {
      return "#" + this.modalModification;
    },
    modalPresentation() {
      return "project-presentation-" + this.project.id;
    },
    fullModalPresentation() {
      return "#" + this.modalPresentation;
    },
    modificationInputId() {
      return "modification-input-" + this.project.id
    },
    modifyCloseButtonId() {
      return "modify-close-button-" + this.project.id
    },
    modifyButtonId() {
      return "modification-button-" + this.project.id
    },
    modalDelete() {
      return "project-delete-" + this.project.id;
    },
    fullModalDelete() {
      return "#" + this.modalDelete;
    },
    deleteButtonId() {
      return "delete-button-" + this.project.id
    },
    deleteCloseButton(){
      return 'delete-close-button-' + this.project.id
    }
  },
  methods: {
    projectModification() {
      const modificationInput = document.getElementById(this.modificationInputId);
      let newName = modificationInput.value.trim();
      this.$emit("modify-project", {
        projectToModify: this.project,
        newName: newName,
      });
    },
    projectDelete() {
      this.$emit("delete-project", {project: this.project});
      document.getElementById(this.deleteCloseButton).click();
    },
    getProjectInfos() {
      const project = this.project.id
      axios
          .get(apiRoot + 'projects/' + project + '/contributions')
          .then(response => {
            this.projectInfos = response.data})
          .catch(error => console.log(error));
    },
    setProjectBorderColor() {
      const projects = document.getElementsByClassName('project-container');
      const colors = ["#852700", "#00cdaf", "#009075", "#ffa88c"];
      let colorChosen = "";
      for (let i = 0; i < projects.length; i++) {
        if ((i+1)%4 === 0) {
          colorChosen = colors[3];
        } else if ((i+1)%3 === 0) {
          colorChosen = colors[2];
        } else if ((i+1)%2 === 0) {
          colorChosen = colors[1];
        } else {
          colorChosen = colors[0];
        }
        projects[i].style.backgroundColor = colorChosen;
        projects[i].style.transition = "all 0.2s ease-in-out";
      }
    }
  },
  mounted() {
    this.getProjectInfos();
    this.setProjectBorderColor();
  }
}
</script>


<style scoped>
  .project-container {
    height: 180px;
    margin: 2rem 0;
    background-clip: content-box;
  }
  .project-container:hover {
    background-color: #FD8A0E !important;
  }
  .project {
    background-clip: content-box;
    cursor: pointer;
  }
  .cursor-pointer {
    cursor: pointer;
  }
  .project-small-border {
    padding: 3px;
  }
  .delete-button {
    text-align: right;
    font-size: 37px;
    padding-right: 0.5rem;
    margin: 0;
    cursor:pointer;
  }
  #delete-validation-container {
    background-color: black;
    color: white;
  }
  .action-button {
    transition: font-weight .2s ease-in-out;
  }
  .action-button:hover {
    font-weight: bold;
  }
  .member-list {
    list-style-type: none;
    border-bottom: solid 1px orange;
    margin-top: 0.5rem;
  }
  .member-list-container {
    margin-top: 2rem;
  }
</style>
