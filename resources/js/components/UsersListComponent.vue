<template>
    <div class="row">
        <div class="col mb-2" v-for="user in Users" :key="user.title" >
            <div class="card" >
                <div class="card-body">
                    <h2 class="card-title">{{ user.name }}</h2>
                    <h5 class="card-title">{{ user.role}}</h5>
                    <p class="card-text">{{ user.email  }}</p>
                </div>
                <div class="card-footer">
                    <router-link class="btn btn-success btn-sm" :to="'/web/users/detail/'+user.id">Detall</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            fetch('http://blog.test/api/users')
            .then(response => response.json())
            .then(data => this.Users = data.data);
        },
        data(){
            return{
                Users:[]
            }
        },
        methods:{
            select: function(p){
                
            }
        }
    }
</script>
