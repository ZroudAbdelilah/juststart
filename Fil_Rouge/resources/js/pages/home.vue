<template>
    <div>
        <h3>Explorez <span>182 projets</span></h3>
        <projects :pages=pages :maxCard=9 :cols=3 :key=key />
    </div>
</template>
<style scoped>
h3 span{
    color:var(--green);
}
</style>
<script>
import projects from '../components/projects.vue'
export default {
    components:{
        projects
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