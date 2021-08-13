<template>
    <div>
        <Header/>
        <div class="filter border">
            <div class="container">
                <div class="row text-center text-dark d-flex justify-content-center py-3">
                    <div class="auto mx-2"><router-link to="/">Art</router-link></div>
                    <div class="auto mx-2"><router-link to="/">BD Et Illustrations</router-link></div>
                    <div class="auto mx-2"><router-link to="/">Design Et Technologie</router-link></div>
                    <div class="auto mx-2"><router-link to="/">Jeux</router-link></div>
                    <div class="auto mx-2"><router-link to="/">Gastronomie Et Créations</router-link></div>
                    <div class="auto mx-2"><router-link to="/">Musique</router-link></div>
                    <div class="auto mx-2"><router-link to="/">Édition</router-link></div>
                </div>
            </div>
        </div>
        <div class="hero-header">
            <div class="container">
                <div class="row my-3">
                    <div class="col-12 col-md-7 py-5 px-5">
                    <router-link :to="'/project/'+bestInvested.id">
                        <div class="main-Item">
                            <div class="thumbnail mb-3">
                                <img class="img-responsive w-100" :src=bestInvested.thumbnail alt="#">
                                <div class="progress rounded-0">
                                <div class="progress-bar bg-success" role="progressbar" :style="'width: '+((bestInvested.invested/bestInvested.target_b)*100).toFixed(0)+'%'" :aria-valuenow="((bestInvested.invested/bestInvested.terget_b)*100)" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="details">
                                <div class="title">
                                    <h1>{{ bestInvested.name }}</h1>
                                </div>
                                <div class="description">
                                    <p>{{ bestInvested.description }}</p>
                                </div>
                                <div class="author">
                                    <span>Par </span><span>{{bestInvested.project_leader.username}}</span>
                                </div>
                            </div>
                        </div>
                    </router-link>
                    </div>
                    <div class="col-12 d-none d-md-block col-md-5 py-5 px-3">
                        <span class="dispaly-6">Rien que pour vous</span>
                        <div style="height:450px;overflow-y:auto;">
                            <card-horizontal v-for="project,key in latested" :key=key :project=project />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about py-5 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 mb-md-3">
                        <img src="/img/about.png" alt="#" class="img-responsive w-100">
                    </div>
                    <div class="col-12 col-md-6">
                        <span class="h3 mb-4 d-block">JUSTSTART existe pour permettre à des projets créatifs de voir le jour.</span>
                        <p>Nous sommes convaincus que l'art et l'expression créative sont indispensables à une société vivante et épanouie, et que les espaces créatifs ont besoin de protection.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="news my-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-block h6 mt-3 px-2">
                            <span>LES NOUVEAUTES QUI NOUS PLAISENT</span>
                            <span class="text-success more small ml-3">Discover more <i class="fa fa-arrow-right"></i></span>
                        </div>
                        <div class="mb-5 mt-2">
                            <carousel v-if="(!isMobile)" :autoplay="true" :nav="false" :loop=true :center=true :key=step :responsive="{0:{items:1,autoWidth:true,nav:false},400:{items:1,nav:false},600:{items:2,nav:false},700:{items:auto}}">
                                    <div style="width:fit-content;"  v-for="project,key in projects" :key=key>
                                        <SlideCard :project=project class="p-2" />
                                    </div>
                            </carousel>
                            <div v-if="(isMobile)" class="slider-grid">
                                <div style="width:fit-content;"  v-for="project,key in projects" :key=key>
                                    <SlideCard :project=project class="p-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer/>
    </div>
</template>

<style scoped>
    a{
        color: inherit;
    }
    .hero-header div.col-7:nth-child(1){
        border-right: 1px solid var(--green);
    }
    .about div.col:nth-child(1){
        border-right: 3px solid var(--green);
    }
    .news .more i{
        transition: .3s;
    }
    .news .more{
        transition: .3s;
    }
    .news .more:hover{
        opacity: .7;
    }
    .news .more:hover i{
        transform: translateX(10px);
    }
    .slider-grid{
        display: grid;
    }
@media  (max-width:640px) {
    .slider-grid{
        grid-template-columns: repeat(1,1fr);
        justify-items: center;
    }
}
</style>


<script>
import Header from '../components/header.vue'
import cardHorizontal from '../components/card-horizontal.vue'
import SlideCard from '../components/slide-card.vue'
import Footer from '../components/footer.vue'
import carousel from 'vue-owl-carousel'

// api
import axios from 'axios'
export default {
    components:{
        Header,
        cardHorizontal,
        SlideCard,
        Footer,
        carousel
    },
    data:()=>{
        return {
            projects:[],
            bestInvested:{},
            latested:[],
            step:0,
            isMobile:false
        }
    },
    created(){
        this.getBestInvested()
        this.getLatested()
        this.getAllProjects()
        this.ifMobile()
        window.addEventListener("resize", function() {
            this.ifMobile()
        })
    },
    methods:{
        getBestInvested(){
            axios.get('http://127.0.0.1:8000/api/projects/best-invest').then(response => {
                if(response.status == 200)
                    this.bestInvested = response.data
            })
        },
        getLatested(){
            axios.get('http://127.0.0.1:8000/api/projects/latest').then(response=>{
                if(response.status == 200)
                this.latested = response.data
            })
        },
        getAllProjects(){
            axios.get('http://127.0.0.1:8000/api/projects').then(response=>{
                if(response.status == 200)
                this.projects = response.data

                console.log(response);
                this.step++
            })
        },
        ifMobile(){
            let width = document.documentElement.clientWidth;
            if(width <= 768){
                this.isMobile = true
            }
        }
    }
}
</script>
