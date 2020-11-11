<template>
    <div class="container">
        <div class="form-row">
            <input type="text" class="form-control" @keyup="searchEquipe" v-model="q" placeholder="Rechercher une équipe...">
            </div>
        <add-equipe @equipe-added="refresh"></add-equipe>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" v-for="equipe in equipes.data" :key="equipe.id">
                        <a href="#">{{ equipe.name }}</a>
                        <div>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editModal" @click="getEquipe(equipe.id)">
                            Editer
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" @click="deleteEquipe(equipe.id)">
                            Supprimer
                        </button>
                        </div>
                    </li>
                    <edit-equipe v-bind:equipeToEdit="equipeToEdit" @equipe-updated="refresh"></edit-equipe>
                </ul>
                <pagination :data="equipes" @pagination-change-page="getResults" class="mt-5"></pagination>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                equipes: {},
                equipeToEdit: '',
                q: ''
            }
        },

        created(){
            axios.get('http://127.0.0.1:8000/api/equipesList')
                .then(response => this.equipes = response.data)
                .catch(error => console.log(error));
        },

        methods: {
            getResults(page = 1) {
			axios.get('http://127.0.0.1:8000/api/equipesList?page=' + page)
				.then(response => {
					this.equipes = response.data;
				});
        },  

        getEquipe(id) {
            axios.get('http://127.0.0.1:8000/api/equipes/edit/' + id)
            .then(response => this.equipeToEdit = response.data)
            .catch(error => console.log(error));
        },

        deleteEquipe(id){
            axios.delete('http://127.0.0.1:8000/api/equipes/' + id)
            .then(response => this.equipes = response.data)
            .catch(error => console.log(error));
        },

        searchEquipe() {
            if(this.q.length > 3){
            axios.get('http://127.0.0.1:8000/api/equipesList/' + this.q)
                .then(response => this.equipes = response.data)
                .catch(error => console.log(error));
            } else {
            axios.get('http://127.0.0.1:8000/api/equipesList/')
                .then(response => this.equipes = response.data)
                .catch(error => console.log(error));
            }
        },
        
        refresh(equipes) {
            this.equipes = equipes.data
        }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
