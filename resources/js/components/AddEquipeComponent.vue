<template>
    <div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
  Ajouter une équipe
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une équipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

          <form>
                <div class="form-group">
                    <label for="name">Nom de l'équipe</label>
                    <textarea name="name" id="name" rows="4" class="form-control" v-model="name"></textarea>
                    <label for="nombrej" class="mt-3">Nombre de joueurs</label>
                    <textarea name="nombrej" id="nombrej" rows="4" class="form-control" v-model="nombre_de_joueurs"></textarea>
                </div>
          </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-success" @click='equipeStore' data-dismiss="modal">Ajouter l'équipe</button>
      </div>
    </div>
  </div>
</div>


    </div>
</template>

<script>
export default {

    data() {
        return {
        name: '',
        nombre_de_joueurs: ''
        }
    },

    methods: {
        equipeStore(){
            axios.post('http://127.0.0.1:8000/api/equipesList', {
                name: this.name,
                nombre_de_joueurs : this.nombre_de_joueurs
            })
            .then(response => this.$emit('equipe-added', response))
            .catch(error => console.log(error));
        }
    }
}
</script>