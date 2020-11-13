<template>
    <div class="container">
        <add-match></add-match>
        <!-- Button trigger modal -->
        <div class="form-row">
            <input type="text" class="form-control mb-5 mt-3" placeholder="Rechercher un match...">
            </div>
        
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" v-for="match in matches.data" :key="match.id">
                    <a> {{ matches.id_equipeA }} </a>
                    <a> {{ matches.id_equipeB }} </a>
                        <a href="#"></a>
                        <div>
                        <button type="button" class="btn btn-secondary" data-toggle="modal">
                            Editer
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal">
                            Supprimer
                        </button>
                        </div>
                    </li>
                    
                </ul>
                <pagination :data="matches" @pagination-change-page="getResults" class="mt-5"></pagination>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                matches: {}
            }
        },

        created() {
            axios.get('http://127.0.0.1:8000/api/matchesList')
                .then(response => this.matches = response.data)
                .catch(error => console.log(error));
        },

        methods: {
            getResults(page = 1) {
			axios.get('http://127.0.0.1:8000/api/matchesList?page=' + page)
				.then(response => {
					this.matches = response.data;
				});
		}
        },


        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
