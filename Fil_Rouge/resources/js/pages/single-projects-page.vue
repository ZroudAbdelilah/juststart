<template>
    <div>
        <Header/>
        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center my-3">{{ project.name }}</h1>
                <p class="text-center">{{ project.description.substring(0,250)+".." }}</p>
            </div>
            <div class="row mb-5">
                <div class="col-12 col-md-6">
                    <img :src=project.thumbnail alt="" class="img-responsive w-100 img-thumbnail">
                </div>
                <div class="col-12 text-center text-md-left col-md-6">
                    <hr class="m-0">
                    <h2 class="text-success display-3 my-3">{{ project.invested }}$</h2>
                    <span>Invested of </span><span class="text-success">{{ project.target_b }}$</span><span> Goal</span>
                    <br>
                    <div class="my-3">
                        <span class=" h2 text-success">{{ deadline }}</span> <span class="text-success">days</span> <span>To Go</span>
                    </div>
                    <div class="my-3">
                        <router-link to="/invest" class="btn btn-success rounded-0 btn-block btn-lg mb-3">Invest in this project</router-link>
                        <p class="small">All or nothing. This project will only be funded if it reaches its goal by {{ project.d_line }}.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="mb-3">Full project description:</h3>
                    <div>{{ project.description }}</div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="row m-0">
                    <div class="col-12">
                        <h3 class="mb-3">More projects you may like:</h3>
                    </div>
                    <div class="col-12 col-md-4" v-for="sProject,key in sProjects" :key=key>
                            <projectCard :product=sProject />
                    </div>
                </div>
            </div>
        </div>
        <Footer/>
    </div>
</template>
<style scoped>
hr {
  border: 0;
  border-top: 5px solid var(--green);
}
</style>
<script>
import Header from '../components/header.vue'
import Footer from '../components/footer.vue'
import projectCard from '../components/project-card.vue'
// api
import axios from 'axios'

export default {
    components:{
        Header,
        Footer,
        projectCard
    },
    data:()=>{
        return {
            key:0,
            project:[],
            deadline:0,
            sProjects:[]
        }
    },
    props:['id'],
    created(){
        this.getData()
        this.getPRojects()
    },
    watch:{
        id(){
            this.getData()
            this.getPRojects()
        }
    },
    methods:{
       getData(){
           axios.get('http://127.0.0.1:8000/api/project/'+this.id).then(response=>{
               console.log(response);
               if(response.status == 200)
                   this.project = response.data
                   this.key++
                   this.getRestDays()
           })
       },
        getRestDays(){
            var date1 = new Date();
            var date2 = new Date(this.project.d_line);
            // To calculate the time difference of two dates
            var Difference_In_Time = date2.getTime() - date1.getTime();
            // To calculate the no. of days between two dates
            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
            //To display the final no. of days (result)
            this.deadline = Difference_In_Days.toFixed(0)
        },
        getPRojects(){
            axios.get('http://127.0.0.1:8000/api/projects').then(response=>{
                if(response.status == 200){
                    for (let i = 0; i < 3; i++) {
                        this.sProjects.push(response.data[i])
                    }
                }
            })
        }
    }
}
</script>
