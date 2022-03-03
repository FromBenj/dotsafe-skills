<template>
  <div class="d-flex justify-content-end">
    <div id="add-button-container" @click="getAddForm" class="d-flex justify-content-end align-items-center">
      <div>Rajouter une technologie</div>
      <div id="add-button" class="ml-3 text-right"> + </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <div id="techno-input-container" class="input-group d-none">
      <input id="techno-input" type="text" class="form-control" placeholder="Nom de la technologie" aria-label="Nouvelle technologie" aria-describedby="validation-button">
      <div class="input-group-append">
        <span class="input-group-text" id="validation-button" @click="addTechno">Ajouter</span>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-3">
    <div class="row">
      <Technology v-for="techno in this.dotsafeTechnos"
                  :technology="techno"
                  :key="techno.id"
                  @modify-techno="modifyTechno"
                  @delete-techno="deleteTechno"
      />
    </div>
  </div>
</template>


<script>
import Technology from "@/components/Technology";
import axios from "axios";
import {apiRoot} from "@/API-config";

export default {
  name: 'Technologies',
  components: {
    Technology
  },
  data() {
    return {
      dotsafeTechnos: [],
    }
  },
  methods: {
    getAllTechnologies() {
      axios
          .get(apiRoot + 'technologies')
          .then(response => (this.dotsafeTechnos = response.data))
          .catch(error => console.log(error));
    },
    getAddForm() {
      const addInputContainer = document.getElementById('techno-input-container');
      if (addInputContainer.classList.contains('d-none')) {
        addInputContainer.classList.replace('d-none', 'd-flex');
      } else {
        addInputContainer.classList.replace('d-flex', 'd-none');
      }
    },
    addTechno() {
      const technotInput = document.getElementById('techno-input')
      let newTechno = {name: technotInput.value}
      axios
          .post(apiRoot + 'technologies', newTechno)
          .then(response => (this.dotsafeTechnos.push(response.data)))
          .catch(error => console.log(error));
      const addInputContainer = document.getElementById('techno-input-container');
      addInputContainer.classList.replace('d-flex', 'd-none');
    },
    modifyTechno(payload) {
      const updatedTechno = {name: payload.newName.trim()};
      axios
          .put(apiRoot + 'technologies/' + payload.technoToModify.id, updatedTechno)
          .then(() => (this.getAllTechnologies()))
          .catch(error => console.log(error));
      const closeButton = document.getElementById('modify-close-button-' + payload.technoToModify.id);
      closeButton.click();
    },
    deleteTechno(payload) {
      axios
          .delete(apiRoot + 'technologies/' + payload.technoToDelete.id)
          .then(() => (this.getAllTechnologies()))
          .catch(error => console.log(error));
    },
  },
  mounted() {
    this.getAllTechnologies();
  }
}
</script>


<style scoped>
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
#techno-input-container {
  width: 30rem;
}
</style>
