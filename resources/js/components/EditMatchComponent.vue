<template>
<div>
    <!-- Modal -->
<div class="modal fade" id="editmatchModal" tabindex="-1" aria-labelledby="editmatchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmatchModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

          <div class="form-group">
    <label for="id_equipeA">Equipe A</label>
    <select class="form-control" id="id_equipeA" name="id_equipeA" v-model="matchToEdit.id_equipeA">
        <option value="" disabled selected>Sélectionner une équipe...</option>
      <option v-for="(equipe, index) in equipes" :key="index"
      :id="equipe.id" :value="equipe.id">{{ equipe.name }}</option>
    </select>
  </div>

    <div class="form-group">
    <label for="id_equipeB">Equipe B</label>
    <select class="form-control" id="id_equipeB" name="id_equipeB" v-model="matchToEdit.id_equipeB">
    <option value="" disabled selected>Sélectionner une équipe...</option>
      <option v-for="(equipe, index) in equipes" :key="index"
      :id="equipe.id" :value="equipe.id">{{ equipe.name }}</option>
    </select>
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-success" data-dismiss="modal" @click="update">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
export default {
            props: ['matchToEdit'],
    data() {
        return {
        id_equipeA: '',
        id_equipeB: '',
        equipes: []
        }
    },
    computed: {
        checkEquipeId: function(){
            return this.id_equipeA === this.id_equipeB
        }
    },
    methods: {
        getEquipes(){
            axios.get('http://127.0.0.1:8000/api/equipesList')
                .then(response => this.equipes = response.data.data)
                .catch(error => console.log(error));
        },
        update() {
            axios.patch('http://127.0.0.1:8000/api/matches/edit/' + this.matchToEdit.id, {
                id_equipeA: this.matchToEdit.id_equipeA,
                id_equipeB: this.matchToEdit.id_equipeB
            })
            .then(response => this.$emit('match-updated', response))
            .catch(error => console.log(error));
        }
    },
    mounted() {
        this.getEquipes()
    }
}
</script>