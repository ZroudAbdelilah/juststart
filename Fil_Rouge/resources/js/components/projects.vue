<template>
    <div>
        <div style="margin-block: 32px;">
            <div class="projects" :style="'grid-template-columns: repeat('+cols+',1fr);'">
                <projectCard v-for="(project,index) in page" :product=project :key="index" />
            </div>
            <div class="dots">
                <button class="prev" @click="prev()"><i class="fa fa-angle-left"></i></button>
                <div class="dot" :class="(currentPage == step)?'active':''" @click="goToPage(step)" v-for="step in counter" :key="step"></div>
                <button class="next" @click="next()"><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
    </div>
</template>
<style scoped>
.projects{
    margin: auto;
    /* max-width: 1050px; */
    width: 100%;
    display: grid;
    justify-content: center;
    text-align: center;
}
.dots{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
.dot{
    margin-inline: 8px;
    width: 15px;
    height: 15px;
    background-color: var(--green);
    border-radius: 15px;
    opacity: .5;
}
.dot.active{
    opacity: 1;
}
.dots .prev,.dots .next{
    margin-inline: 8px;
    width: 25px;
    height: 25px;
    color: var(--green);
    border-radius: 15px;
    background-color: #fff;
    border: 1px solid var(--green) ;
    opacity: 1;
}
.dots .prev,.dots .next{
    
}
</style>
<script>
import projectCard from '../components/project-card.vue'
export default {
    components:{
        projectCard
    },
    data:()=>{
        return{
            currentPage:1,
            page:[],
            counter:0
        }
    },
    created(){
        this.page = this.pages.slice(0,this.maxCard)
        this.counter = Math.ceil(parseInt(this.pages.length)/parseInt(this.maxCard))
    },
    watch:{
        currentPage(){
            this.page = this.pages.slice((this.currentPage*this.maxCard)-this.maxCard,(this.currentPage*this.maxCard))
        }
    },
    props:{
        maxCard:Number,
        cols:Number,
        pages:Array
    },
    methods:{
        goToPage(page){
            this.currentPage = page
        },
        prev(){
            if(this.currentPage > 1){
                this.currentPage--
            }else{
                this.currentPage = this.counter
            }
        },
        next(){
            if(this.currentPage < this.counter){
                this.currentPage++
            }else{
                this.currentPage = 1
            }
        }
    }
}
</script>