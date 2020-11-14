<template>
    <div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
  Ajouter un match
</button>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

          <div class="form-group">
    <label for="id_equipeA">Equipe A</label>
    <select class="form-control" id="exampleFormControlSelect1" v-model="id_equipeA">
      <option name="id_equipeA" id="id_equipeA">{{ id_equipeA }}</option>
    </select>
  </div>

    <div class="form-group">
    <label for="id_equipeB">Equipe B</label>
    <select class="form-control" id="exampleFormControlSelect1" v-model="id_equipeB">
      <option name="id_equipeB" id="id_equipeB">{{ id_equipeB }}</option>
    </select>
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" @click="matchStore">Ajouter un match</button>
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
        id_equipeA: '',
        id_equipeB: '',
        }
    },
    methods: {
        matchStore() {
            methods: {
            axios.post('http://127.0.0.1:8000/api/matchesList', {
                id_equipeA: this.id_equipeA,
                id_equipeB : this.id_equipeB
            })
            .then(response => this.$emit('match-added', response))
            .catch(error => console.log('Saisi Incorrect'));
        }
    }
        }
    }

</script>