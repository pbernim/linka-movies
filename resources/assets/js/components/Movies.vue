<template>
    <div>
        <template v-if="movies">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 text-center">
                        <input v-model="searchTitle" type="search" class="form-control" placeholder="Search by title ...">              
                    </div>            
                    <div class="col-xs-12"><hr></div>
                </div>
                <div class="row equalize-row" v-cloak>
                    <div class="col-xs-6 col-sm-4" v-for="movie in searchMovies">
                        <div class="poster-box text-center">
                            <div class="captation" v-text="movie.title"></div>
                            <router-link :to="{name:'movie', params: {slug: movie.slug}}"><img :src="movie.poster | storage" alt="" class="img-responsive thumbnail animated bounceIn"></router-link>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <span v-else>Loading movies ...</span>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component movies mounted.');
            this.getMovies();
        },
        data: function() {
            return {
                searchTitle: '',
                movies: []
            }
        },
        methods: {
            getMovies: function() {
                var app = this;
                axios.get('api/movies')
                    .then(function (response) {
                    app.movies = response.data.movies;
                    })
                    .catch(function (error) {
                    console.log(error.response.data.message);
                }); 
            }
        },
        computed:{ 
            searchMovies() {
                return this.movies.filter((movie)=>{
                    return movie.title.toLowerCase().includes(this.searchTitle.toLowerCase());
                });
            }
        }
    }
</script>
