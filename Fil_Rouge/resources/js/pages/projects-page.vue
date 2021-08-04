<template>
    <div>
        <Header/>
        <div class="container">
            <h3>Explorez <span>182 projets</span></h3>
            <projects :pages=pages :maxCard=9 :cols=3 :key=key />
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
export default {
    components:{
        projects,
        Header,
        Footer
    },
    data:()=>{
        return {
            pages:[],
            key:0
        }
    },
    created(){
        this.getData()
    },
    methods:{
       getData(){
           setTimeout(() => {
               this.pages = [
                {'title':'title 1'},
                {'title':'title 2'},
                {'title':'title 3'},
                {'title':'title 4'},
                {'title':'title 5'},
                {'title':'title 6'},
                {'title':'title 7'},
                {'title':'title 8'},
                {'title':'title 9'},
                {'title':'title 10'},
                {'title':'title 11'},
                {'title':'title 12'},
                {'title':'title 13'},
                {'title':'title 14'},
                {'title':'title 15'},
                {'title':'title 16'},
                {'title':'title 17'},
                {'title':'title 18'}
            ]
            this.key++
           }, 1000);
       } 
    }
}
</script>