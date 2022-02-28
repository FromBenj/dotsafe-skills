<template>
  <div class="col-3 col-md-2 project-container">
    <div class="project-small-border project h-100 bg-white d-flex justify-content-center align-items-center">
      <h4 class="mb-0 font-weight-bold text-center">
        {{project.name}}
      </h4>
    </div>
    <div class="cursor-pointer text-center font-italic mt-2 d-flex justify-content-between">
      <p class="ml-3 action-button" data-toggle="modal" :data-target=fullModalModification >Modifier</p>
      <p class="mr-3 action-button" data-toggle="modal" :data-target=fullModalDelete>Supprimer</p>
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
export default {
  name: 'Project',
  props: {
    project: {
      type: Object,
      required: true
    },
  },
  computed: {
    modalModification() {
      return "project-modification-" + this.project.id;
    },
    fullModalModification() {
      return "#" + this.modalModification;
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
    }
  },
}
</script>


<style scoped>
  .project-container {
    height: 180px;
    margin: 2rem 0;
    background-color: #FD8A0E;
    background-clip: content-box;
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
</style>
