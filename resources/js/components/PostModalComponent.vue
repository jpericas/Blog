<template>
    <div id="PostModal"  class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ post.titol }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p v-html="post.contingut" ></p>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["post"],
        mounted() {
            
        },
        watch:{
            post: function(newVal, oldVal){
                console.log(newVal);
                console.log(oldVal);
                $('#PostModal').modal('show');
            }
        }
    }
</script>

