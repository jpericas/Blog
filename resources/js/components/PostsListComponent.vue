<template>
    <div class="row">
        <div class="col mb-2" v-for="post in posts" :key="post.identificador" >
            <div class="card" >
                <img v-if="post.imatge" class="card-img-top" :src="'/images/'+post.imatge.image" >
                <div class="card-body">
                    <h2 class="card-title">{{ post.titol }}</h2>
                    <h5 v-if="post.categoria" class="card-title">{{ post.categoria.title}}</h5>
                    <p class="card-text" v-html="post.contingut" ></p>
                </div>
                <div class="card-footer">
                    <button @click="select(post)" class="btn btn-primary btn-sm">Obrir</button>
                    <router-link class="btn btn-success btn-sm" :to="'/web/detail/'+post.identificador">Detall</router-link>
                </div>
            </div>
        </div>
        <post-modal-component :post="PostSelectet" ></post-modal-component>
    </div>
</template>

<script>
    export default {
        mounted() {
            fetch('http://blog.test/api/posts/')
            .then(response => response.json())
            .then(data => this.posts = data.data);
        },
        data(){
            return{
                PostSelectet:[],
                posts:[]
            }
        },
        methods:{
            select: function(p){
                this.PostSelectet = p;                
            }
        }
    }
</script>
