<template>
    <div>
        <template v-if="movie">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-sm-offset-1 text-center">
                        <img :src="dataMovie.poster|storage" alt="" class="img-responsive thumbnail animated zoomInUp">
                    </div>
                    <div class="col-xs-12 col-sm-5 text-left">
                        <div class="page-header">
                            <h2 v-text="dataMovie.title"></h2>
                        </div>
                        <div v-html="dataMovie.synopsis"></div>
                        <br>
                        <div class="col-xs-6">
                            <template v-if="previus">
                                <router-link :to="{name:'movie', params: {slug: previus}}" class="btn btn btn-primary btn-block btn-sm"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>&nbsp;Previous</router-link>
                            </template>
                            <template v-else>
                                <button class="btn btn btn-primary btn-block btn-sm" disabled="disabled"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>&nbsp;Previous</button>
                            </template>
                            
                        </div>
                        <div class="col-xs-6">
                            <template v-if="next">
                                <router-link v-if="next" :to="{name:'movie', params: {slug: next}}" class="btn btn btn-primary btn-block btn-sm">Next&nbsp;<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></router-link>
                            </template>
                            <template v-else>
                                <button class="btn btn btn-primary btn-block btn-sm" disabled="disabled">Next&nbsp;<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
                            </template>    
                        </div>
                        <div class="col-xs-12">
                            <br>
                            <router-link :to="{name:'movies'}" class="btn btn-default btn-block btn-sm">Back to index</router-link>
                        </div>
                    </div>              
                </div>
                <br><br>
            </div>
        </template>
        <span v-else>Loading movie ...</span>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component movie mounted.');
            this.getMovie();
        },
        data: function() {
            return {
                slug: this.$route.params.slug,
                previus: null,
                next: null,
                movie: []
            }
        },
        watch: {
           '$route'(to) {
                this.slug = to.params.slug,
                this.movie = this.getMovie()
            }
        },
        methods: {
            getMovie: function() {
                var app = this;
                axios.get('api/movie/' + this.slug)
                    .then(function (response) {
                        app.movie = response.data.movie;
                        app.previus = response.data.previus;
                        app.next = response.data.next;
                    })
                    .catch(function (error) {
                        console.log(error.response.data.message);
                });
            }
        },
        computed: {
            dataMovie() {
                return {
                    title: this.movie.title,
                    synopsis: this.movie.synopsis,
                    poster: this.movie.poster
                }
            }
        }
    }
</script>

