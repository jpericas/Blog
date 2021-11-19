<template>
    <div class="row">
        <div class="col mb-2">
            <div class="card" >
                <div class="card-body">
                    <h2 class="card-title">{{ user.name }}</h2>
                    <h5 class="card-title">{{ user.role}}</h5>
                    <p class="card-text">{{ user.email  }}</p>
                </div>                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            fetch('http://blog.test/api/users/'+this.$route.params.id)
            .then(response => response.json())
            .then(data => this.user = data.data);
        },
        data(){
            return{
                user:""
            }
        }        
    }
</script>
