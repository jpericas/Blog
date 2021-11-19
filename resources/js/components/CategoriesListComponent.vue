<template>
    <div class="row">
        <div class="col mb-2" v-for="category in Categories" :key="category.title" >
            <div class="card" >
                <div class="card-body">
                    <h2 class="card-title">{{ category.title }}</h2>
                    <p class="card-text">{{ category.url_clean  }}</p>
                </div>                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            fetch('http://blog.test/api/categories')
            .then(response => response.json())
            .then(data => this.Categories = data.data);
        },
        data(){
            return{
                Categories:""
            }
        },
        methods:{
            select: function(p){
                
            }
        }
    }
</script>
