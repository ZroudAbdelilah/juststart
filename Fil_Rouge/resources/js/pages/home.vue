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
                    <div class="col-7 py-5 px-5">
                        <div class="main-Item">
                            <div class="thumbnail mb-3">
                                <img class="img-responsive w-100" src="/img/hero-header-main.png" alt="#">
                                <div class="progress rounded-0">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="details">
                                <div class="title">
                                    <h1>Dummy title</h1>
                                </div>
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, tempore odit repellendus debitis ex iusto veritatis est voluptatibus doloremque deserunt praesentium mollitia qui dolorum hic, ipsam sequi temporibus veniam odio.</p>
                                </div>
                                <div class="author">
                                    <span>Par</span><span>Abdelilah Zroud</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 py-5 px-3">
                        <span class="dispaly-6">Rien que pour vous</span>
                        <div style="height:450px;overflow-y:auto;">
                            <card-horizontal v-for="i in 18" :key=i />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about py-5 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="/img/about.png" alt="#" class="img-responsive w-100">
                    </div>
                    <div class="col">
                        <span class="h3 mb-4 d-block">JUSTSTART existe pour permettre à des projets créatifs de voir le jour.</span>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius nulla, qui ullam velit earum perferendis omnis quia aspernatur vitae consequuntur distinctio corporis rerum maxime ipsam eum, repudiandae eos dolores cum.</p>
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
                            <carousel :autoplay="true" :nav="false">
                                    <div v-for="i in 9" :key=i>
                                        <SlideCard class="p-2"  />
                                    </div>
                            </carousel>
                        </div>
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
                            <carousel :autoplay="true" :nav="false">
                                    <div v-for="i in 9" :key=i>
                                        <SlideCard class="p-2"  />
                                    </div>
                            </carousel>
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
</style>

<script>
import Header from '../components/header.vue'
import cardHorizontal from '../components/card-horizontal.vue'
import SlideCard from '../components/slide-card.vue'
import Footer from '../components/footer.vue'
import carousel from 'vue-owl-carousel'
export default {
    components:{
        Header,
        cardHorizontal,
        SlideCard,
        Footer,
        carousel
    }
}
</script>