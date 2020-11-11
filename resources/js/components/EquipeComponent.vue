<template>
    <div class="container">
        <add-equipe></add-equipe>
            <ul class="list-group">
                <li class="list-group-item" v-for="equipe in equipes.data" :key="equipe.id">
                        <a href="#">{{ equipe.name }}</a>
                    </li>
                </ul>
                <pagination :data="equipes" @pagination-change-page="getResults" class="mt-5"></pagination>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                equipes: {}
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
		}
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
