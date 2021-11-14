<template>

<div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editer l'équipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


          <form>
                <div class="form-group">
                    <label for="name">Nom de l'équipe</label>
                    <textarea name="name" id="name" rows="4" class="form-control" v-model="equipeToEdit.name"></textarea>
                    <label for="nombrej" class="mt-3">Nombre de joueurs</label>
                    <textarea name="nombrej" id="nombrej" rows="4" class="form-control" v-model="equipeToEdit.nombre_de_joueurs"></textarea>
                </div>
          </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-success" data-dismiss="modal" @click="update">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

</div>


</template>

<script>
export default {
    props: ['equipeToEdit'],

    methods: {
        update(){
            axios.patch(process.env.MIX_APP_URL + '/api/equipes/edit/' + this.equipeToEdit.id, {
                name: this.equipeToEdit.name,
                nombre_de_joueurs: this.equipeToEdit.nombre_de_joueurs
            })
            .then(response => this.$emit('equipe-updated', response))
            .catch(error => console.log(error));
        }
    }
}
</script>
