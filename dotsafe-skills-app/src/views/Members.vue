<template>
  <div class="projects">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex justify-content-start align-items-center">
        <div class="font-weight-bold mr-3">
          Filtrer par :
        </div>
        <div id="technology-select-container" class="d-flex flex-column pl-5">
          <label class="m-0" for="technology-select">Technologie</label>
          <select name="technology" id="technology-select" @change=getTechnologyMembers($event)>
            <option value="all">--- Toutes ---</option>
            <option v-for="technology in technologies" :key="technology.id" :value="technology.id">{{ technology.name}}</option>
          </select>
        </div>
      </div>
      <div id="add-button-container" @click="getAddForm" class="d-flex justify-content-end align-items-center">
        <div>Rajouter un membre</div>
        <div id="add-button" class="ml-3 text-right"> + </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div id="member-input-container" class="input-group flex-column align-items-center d-none">
        <input id="firstname-input" type="text" class="m-2 form-control w-50" placeholder="Prénom" aria-label="Prénom du nouveau membre" aria-describedby="validation-button">
        <input id="lastname-input" type="text" class="m-2 form-control w-50" placeholder="Nom" aria-label="Nom du nouveau membre" aria-describedby="validation-button">
        <input id="email-input" type="email" class="m-2 form-control w-50" placeholder="Adresse e-mail" aria-label="E-mail du nouveau membre" aria-describedby="validation-button">
        <p class="w-50 font-smaller font-italic">N'oubliez pas de rajouter l'e-mail dans le bon format. Exemple : bear.grylls@dotsafe.fr</p>
        <div class="mt-3 input-group-append">
          <span class="input-group-text" id="validation-button" @click="addMember">Ajouter</span>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-3">
      <div class="row">
        <Member v-for="member in this.FullMembersInfos"
                :member="member"
                :key="member.id"
                @modify-member="modifyMember"
                @delete-member="deleteMember"
        />
      </div>
    </div>
  </div>
</template>

<script>

import Member from '@/components/Member.vue'
import axios from 'axios'
import {apiRoot} from '@/API-config'



export default {
  name: 'Members',
  components: {
    Member
  },
  data() {
    return {
      dotsafeMembers: [],
      technologies: [],
    }
  },
  computed: {
    FullMembersInfos() {
      let fullDotsafeMembers = [];
      for (let i = 0; i < this.dotsafeMembers.length; i++) {
        let member = this.dotsafeMembers[i];
        if(!member.picture) {
          member.picture = 'https://i.pravatar.cc/200?img=' + member.id % 50;
        }
        fullDotsafeMembers.push(member);
      }

      return fullDotsafeMembers;
    }
  },
  methods: {
    getAllMembers() {
      axios
          .get(apiRoot +'members')
          .then(response => (this.dotsafeMembers = response.data))
          .catch(error => console.log(error));
    },
    addMember() {
      const firstnameInput = document.getElementById('firstname-input');
      const lastnameInput = document.getElementById('lastname-input');
      const emailInput = document.getElementById('email-input');
      let newMember = {
        firstname: firstnameInput.value.trim(),
        lastname: lastnameInput.value.trim(),
        email: emailInput.value.trim(),
      }
      axios
          .post(apiRoot + 'members', newMember)
          .then(response => (this.dotsafeMembers.push(response.data)))
          .catch(error => console.log(error));
      const addInputsContainer = document.getElementById('member-input-container');
      addInputsContainer.classList.replace('d-flex', 'd-none');
    },
    getAddForm() {
      const addInputContainer = document.getElementById('member-input-container');
      if (addInputContainer.classList.contains('d-none')) {
        addInputContainer.classList.replace('d-none', 'd-flex');
      } else {
        addInputContainer.classList.replace('d-flex', 'd-none');
      }
    },
    getAllTechnologies() {
      axios
          .get(apiRoot + 'technologies')
          .then(response => (this.technologies = response.data))
          .catch(error => console.log(error));
    },
    getTechnologyMembers(event) {
      if (event) {
        let technoValue = event.target.value;
        if (technoValue === "all") {
          this.getAllMembers();
        } else {
          axios
              .get(apiRoot + 'technologies/' + technoValue + '/members')
              .then((response) => (this.dotsafeMembers = response.data))
              .catch(error => console.log(error));
        }
      }
    },
    modifyMember(payload) {
      const updatedMember = {
        firstname: payload.newfirstname,
        lastname: payload.newlastname,
        email: payload.newemail,
      };
      axios
          .put(apiRoot + 'members/' + payload.memberToModify, updatedMember)
          .then(() => (this.getAllMembers()))
          .catch(error => console.log(error));
    },
    deleteMember(payload) {
      axios
          .delete(apiRoot + 'members/' + payload.member.id)
          .then(() => (this.getAllMembers()))
          .catch(error => console.log(error));
    },
  },
  mounted() {
    this.getAllMembers();
    this.getAllTechnologies();
  }
}
</script>

<style scoped>
#technology-select-container {
  border-left: solid 1px;
}
#add-button-container {
  cursor: pointer;
  transition: all 0.1s;
  border-bottom: solid white;
}
#add-button-container:hover{
  border-bottom: solid black;
}
#add-button {
  font-weight: bold;
  width: 50px;
  height: 50px;
  font-size: 34px;
}
#validation-button {
  cursor: pointer;
}
.font-smaller {
  font-size: smaller;
}
</style>
