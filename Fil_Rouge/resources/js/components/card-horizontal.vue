<template>
    <div class="d-flex my-3">
        <div class="thumbnail w-50">
            <img :src=project.thumbnail alt="#" class="img-responsive w-100 h-100 pr-2">
        </div>
        <div class="details px-2 w-50">
            <div class="title">
                <h2 class="h5 m-0">{{ project.name }}</h2>
                <div class="finance text-success">
                    <span>Finance {{invested}}%</span>
                </div>
                <div class="author small">
                    <span>Par</span><span> {{project.project_leader.username}}</span>
                </div>
                <div class="more">
                    <router-link :to="'/project/'+project.id" class="text-success">More</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>

</style>
<script>
export default {
    data:()=>{
      return {
        invested:0
      }
    },props:{
      project:Object
    },
    created(){
        this.invested = ((this.project.invested/this.project.target_b)*100).toFixed(0)
    }
}
</script>
