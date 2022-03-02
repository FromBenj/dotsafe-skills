<template>
  <div class="col-4 col-md-3 member-container">
    <div class="h-100 bg-white d-flex justify-content-end align-items-center flex-column" data-toggle="modal" :data-target=fullModalPresentation>
      <img :src="member.picture" :alt="'Photo de ' + fullName" class="mb-4">
      <div class="member-titles">
        <h4 class="mb-0 font-weight-bold text-center">
          {{fullName}}
        </h4>
        <p class="text-center text-italic m-0">{{member.email}}</p>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="cursor-pointer w-75 text-center font-italic mt-2 d-flex justify-content-between">
        <p class="ml-3 action-button" data-toggle="modal" :data-target=fullModalModification>Modifier</p>
        <p class="mr-3 action-button" data-toggle="modal" :data-target=fullModalDelete>Supprimer</p>
      </div>
    </div>
  </div>

  <!-- Presentation modal -->
  <div class="modal fade" :id=modalPresentation tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="font-weight-bold">Technologies utilisées et contributions aux projets</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <div class="project-list-container" v-for="technology in this.technologyProjects" :key="technology.infos.id">
              <div class="font-weight-bold">{{technology.infos.name}} <span class="font-weight-normal font-italic">({{this.fullContributionsNumber(technology.projects.length)}})</span></div>
              <ul>
                <li class="project-list" v-for="project in technology.projects" :key="project.id">
                  {{ project.name }}
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
          <div class="font-weight-bold">Nouvelles données du membre</div>
          <button type="button" :id=modifyCloseButtonId class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group">
            <input :id="updateFirstnameInputId" type="text" class="m-2 form-control w-50" :placeholder="member.firstname" aria-label="Nouveau prénom du membre" aria-describedby="validation-button">
            <input :id="updateLastnameInputId" type="text" class="m-2 form-control w-50" :placeholder="member.lastname" aria-label="Nouveau nom du membre" aria-describedby="validation-button">
            <input :id="updateEmailInputId" type="email" class="m-2 form-control w-50" :placeholder="member.email" aria-label="Nouvel e-mail du membre" aria-describedby="validation-button">
            <div class="input-group-append">
              <span class="cursor-pointer input-group-text" :id=modifyButtonId @click="memberModification">Modifier</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete modal -->
  <div :id=modalDelete class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <button type="button" class="close d-none" :id="deleteCloseButton" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-content">
        <p class="p-2">Êtes-vous sûr/e de vouloir supprimer
          <span class="font-weight-bold">{{fullName}}</span> ?
        </p>
        <div id="delete-validation-container" class="d-flex justify-content-end">
          <p class="delete-button" :id=deleteButtonId @click="memberDelete">✔</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import {apiRoot} from "@/API-config";

export default {
  name: 'Member',
  props: {
    member: {
      type: Object,
      required: true
    },
  },
  data() {
    return {
      technologyProjects: [],
    }
  },
  emits: ["modify-member", "delete-member"],
  computed: {
    fullName() {
      return this.member.firstname + ' ' + this.member.lastname
    },
    modalPresentation() {
      return "member-presentation-" + this.member.id;
    },
    fullModalPresentation() {
      return "#" + this.modalPresentation;
    },
    modalModification() {
      return "member-modification-" + this.member.id;
    },
    fullModalModification() {
      return "#" + this.modalModification;
    },
    modifyCloseButtonId() {
      return "modify-close-button-" + this.member.id;
    },
    modifyButtonId() {
      return "modification-button-" + this.member.id;
    },
    modalDelete() {
      return "member-delete-" + this.member.id;
    },
    fullModalDelete() {
      return "#" + this.modalDelete;
    },
    updateFirstnameInputId(){
      return "modification-firstname-input-" + this.member.id;
    },
    updateLastnameInputId(){
      return "modification-lastname-input-" + this.member.id;
    },
    updateEmailInputId(){
      return "modification-email-input-" + this.member.id;
    },
    deleteButtonId() {
      return "delete-button-" + this.member.id
    },
    deleteCloseButton() {
      return "delete-close-button-" + this.member.id
    },
  },
  methods: {
    setMemberColor() {
      const members = document.getElementsByClassName('member-titles');
      const colors = ["#852700", "#00cdaf", "#009075", "#ffa88c"];
      let colorChosen = "";
      for (let i = 0; i < members.length; i++) {
        if ((i+1)%4 === 0) {
          colorChosen = colors[3];
        } else if ((i+1)%3 === 0) {
          colorChosen = colors[2];
        } else if ((i+1)%2 === 0) {
          colorChosen = colors[1];
        } else {
          colorChosen = colors[0];
        }
        members[i].style.backgroundColor = colorChosen;
      }
    },
    getTechnologyProjects() {
      const member = this.member.id
      axios
          .get(apiRoot + 'members/' + member + '/technologies/projects')
          .then(response => {
            this.technologyProjects = response.data;
          })
          .catch(error => console.log(error));
    },
    memberModification() {
      const updateFirstnameInput = document.getElementById(this.updateFirstnameInputId);
      const updateLastNameInput = document.getElementById(this.updateLastnameInputId);
      const updateEmailInput = document.getElementById(this.updateEmailInputId);
      let newFirstname = updateFirstnameInput.value.trim();
      let newLastname = updateLastNameInput.value.trim();
      let newEmail = updateEmailInput.value.trim();
      this.$emit("modify-member", {
        memberToModify: this.member.id,
        newfirstname: newFirstname,
        newlastname: newLastname,
        newemail: newEmail,
      });
      const closeButton = document.getElementById(this.modifyCloseButtonId);
      closeButton.click();
    },
    memberDelete() {
      this.$emit("delete-member", {member: this.member});
      document.getElementById(this.deleteCloseButton).click();
    },
    fullContributionsNumber(number) {
      let result = number + " contribution";
      if (number > 1) {
        result += 's';
      }
      return result;
    },
  },
  mounted() {
    this.setMemberColor();
    this.getTechnologyProjects();
  }
}
</script>


<style scoped>
.member-container {
  margin: 2rem 0;
}
.member-titles {
  color: white;
  padding: 0.5rem 1rem;
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
  cursor: pointer;
}
.action-button:hover {
  font-weight: bold;
}
.cursor-pointer {
  cursor: pointer;
}
.project-list {
  list-style-type: none;
  margin-top: 0.5rem;
  border-bottom: solid 1px orange;
}
.project-list-container {
  margin-top: 2rem;
}
</style>
