<template>
    <div class="d-flex my-3">
        <div class="thumbnail w-50">
            <img src="/img/hero-header-main-right.png" alt="#" class="img-responsive w-100 h-100 pr-2">
        </div>
        <div class="details px-2 w-50">
            <div class="title">
                <h2 class="h5 m-0">Dummy title</h2>
                <div class="finance text-success">
                    <span>Finance 98%</span>
                </div>
                <div class="author small">
                    <span>Par</span><span>Abdelilah Zroud</span>
                </div>
                <div class="more">
                    <router-link to="/" class="text-success">More</router-link>
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
        
      }
    },props:{
      // img:String
    }
}
</script>