<template>
  <div class="col-6 col-md-4 col-lg-3">
    <div class="font-weight-bold technology-container cursor-pointer" data-toggle="modal" :data-target=fullModalPresentation>
      <div>
        <h3 class="text-center font-weight-bold techno-title">{{this.technology.name}}</h3>
        <div class="cursor-pointer text-center font-italic mt-2 d-flex justify-content-between">
          <p class="m-3 action-button" @click="noPresentationModal" data-toggle="modal" :data-target=fullModalModification >Modifier</p>
          <p class="m-3 action-button" @click="noPresentationModal" data-toggle="modal" :data-target=fullModalDelete>Supprimer</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Presentation modal -->
  <div class="modal fade" :id=modalPresentation tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="font-weight-bold">Présentation des contributeurs par projet</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <div class="member-list-container" v-for="project in this.projectMembers" :key="project.infos.id">
              <div class="font-weight-bold">{{project.infos.name}}</div>
              <ul>
                <li class="member-list" v-for="member in project.members" :key="member.id">
                  {{ member.firstname + " " + member.lastname }}
                </li>
              </ul>
            </div>
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
          <div class="font-weight-bold">Nouveau nom de la technologie</div>
          <button type="button" :id=modifyCloseButtonId class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group">
            <input :id=modificationInputId type="text" class="form-control" :placeholder="technology.name" aria-label="Modification du projet" aria-describedby="modification-button">
            <div class="input-group-append">
              <span class="cursor-pointer input-group-text" :id=modifyButtonId @click="technoModification">Modifier</span>
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
        <p class="p-2">Êtes-vous sûr/e de vouloir supprimer cette technologies
          <span class="font-weight-bold">{{technology.name}}</span> ?
        </p>
        <div id="delete-validation-container" class="d-flex justify-content-end">
          <p class="delete-button" :id=deleteButtonId @click="technoDelete">✔</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import {apiRoot} from "@/API-config";

export default {
  name: 'Technology',
  props: {
    technology: {
      type: Object,
      required: true
    },
  },
  emits: ["modify-techno", "delete-techno"],
  data() {
    return {
      projectMembers: [],
    }
  },
  computed: {
    modalPresentation() {
      return "techno-presentation-" + this.technology.id;
    },
    fullModalPresentation() {
      return "#" + this.modalPresentation;
    },
    modalModification() {
      return "techno-modification-" + this.technology.id;
    },
    fullModalModification() {
      return "#" + this.modalModification;
    },
    modifyCloseButtonId() {
      return "modify-close-button-" + this.technology.id;
    },
    modifyButtonId() {
      return "modification-button-" + this.technology.id;
    },
    modificationInputId() {
      return "modification-input-" + this.technology.id;
    },
    modalDelete() {
      return "techno-delete-" + this.technology.id;
    },
    fullModalDelete() {
      return "#" + this.modalDelete;
    },
    deleteButtonId() {
      return "delete-button-" + this.technology.id;
    },
    deleteCloseButton() {
      return "delete-close-button-" + this.technology.id;

    }
  },
  methods: {
    technoModification() {
      const modificationInput = document.getElementById(this.modificationInputId);
      let newName = modificationInput.value.trim();
      this.$emit("modify-techno", {
        technoToModify: this.technology,
        newName: newName,
      });
    },
    technoDelete() {
      this.$emit("delete-techno", {technoToDelete: this.technology});
      document.getElementById(this.deleteCloseButton).click();
    },
    getProjectMembers() {
      const technology = this.technology.id
      axios
          .get(apiRoot + 'technologies/' + technology + '/projects/members')
          .then(response => {
            this.projectMembers = response.data;
          })
          .catch(error => console.log(error));
    },
    noPresentationModal() {
      const presentationButtons = document.getElementsByClassName('technology-container');
      for (let i = 0; i < presentationButtons.length; i++) {
        presentationButtons[i].disabled = true;
      }
    },
    setTechnoColor() {
      const technos = document.getElementsByClassName('techno-title');
      const colors = ["#852700", "#00cdaf", "#009075", "#ffa88c"];
      let colorChosen = "";
      for (let i = 0; i < technos.length; i++) {
        if ((i+1)%4 === 0) {
          colorChosen = colors[3];
        } else if ((i+1)%3 === 0) {
          colorChosen = colors[2];
        } else if ((i+1)%2 === 0) {
          colorChosen = colors[1];
        } else {
          colorChosen = colors[0];
        }
        technos[i].style.color = colorChosen;
      }
    }
  },
  mounted() {
    this.getProjectMembers();
    this.setTechnoColor();
  }
}
</script>

<style scoped>
.technology-container {
  height: 30vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #2f485814;
  margin: 2rem 0;
  border: solid 3px white;
  transition: all 0.3s ease-in-out;
}
.technology-container:hover {
  border: solid 3px #FD8A0E;
}
.cursor-pointer {
  cursor: pointer;
}
.techno-title {
  color: #FD8A0EE6;
  transition: all 0.2s ease-in-out;
}
#delete-validation-container {
  background-color: black;
  color: white;
}
.delete-button {
  text-align: right;
  font-size: 37px;
  padding-right: 0.5rem;
  margin: 0;
  cursor:pointer;
}
.member-list {
  list-style-type: none;
  margin-top: 0.5rem;
  border-bottom: solid 1px orange;
}
.member-list-container {
  margin-top: 2rem;
}
</style>
