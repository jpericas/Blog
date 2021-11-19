<template>
    <div class="row">
        <div v-if="post"  class="col mb-10" >
            <div class="card" >
                <div v-if="post.imatge" class="card-header">
                    <img class="card-img-top" :src="'/images/'+post.imatge.image" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h2 class="card-title">{{ post.titol }}</h2>
                    <h5 v-if="post.categoria" class="card-title">{{ post.categoria.title}}</h5>
                    <p class="card-text">{{ post.contingut  }}</p>
                </div>
            </div>
        </div>
        <div v-else>
            <h1>Post no trobat</h1>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            fetch('http://blog.test/api/posts/'+this.$route.params.id)
            .then(response => response.json())
            .then(data => this.post = data.data);
        },
        data() {
            return{
                post:[],
            }
        }

    }
</script>
