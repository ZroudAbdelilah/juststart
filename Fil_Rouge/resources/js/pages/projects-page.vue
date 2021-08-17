<template>
    <div>
        <Header/>
        <div class="container">
            <h3>Explorez <span>{{ products.length }} projets</span></h3>
            <projects :pages=products :maxCard=9 :cols=3 :key=key />
        </div>
        <Footer/>
    </div>
</template>
<style scoped>
h3 span{
    color:var(--green);
}
.container{
    max-width: 1340px;
    margin: auto;

}
h3{
    margin: 16px;
}
</style>
<script>
import projects from '../components/projects.vue'
import Header from '../components/header.vue'
import Footer from '../components/footer.vue'
// api
import axios from 'axios'

export default {
    components:{
        projects,
        Header,
        Footer
    },
    data:()=>{
        return {
            key:0,
            products:[]
        }
    },
    created(){
        this.getData()
    },
    methods:{
       getData(){
           axios.get('http://127.0.0.1:8000/api/projects').then(response=>{
               if(response.status == 200)
                   this.products = response.data
                   this.key++
           })
       } 
    }
}
</script>