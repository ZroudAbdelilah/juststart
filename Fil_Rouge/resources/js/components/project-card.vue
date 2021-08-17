<template>
    <div>
        <div class="project-card">
            <router-link :to="'/project/'+product.id">
                <div>
                    <div class="thumbnail">
                        <img :src=product.thumbnail :alt=product.name>
                    </div>
                    <div class="details">
                        <div class="title">
                            <h2>{{ product.name }}</h2>
                        </div>
                        <div class="description">
                            <p>{{ product.description.substring(0,250)+".." }}</p>
                        </div>
                        <div class="author">
                            <span>By {{product.project_leader.username}}</span>
                        </div>
                        <div class="progress-br">
                            <div class="full">
                                <div :style="'width:'+((product.invested/product.target_b)*100)+'%;max-width:100%'" class="progress"></div>
                            </div>
                            <div class="percentage">
                                <div class="finance text-success">
                                <span> {{((product.invested/product.target_b)*100).toFixed(2)}}%</span>
                                </div>
                            </div>
                        </div>
                        <div class="request">
                            <span>{{ product.invested }}$ engagés</span>
                        </div>
                        <div class="days">
                            <span>Rest {{restDays}} <span v-if="(restDays > 1)">jours</span><span v-if="(restDays == 1)">jour</span></span>
                        </div>
                        <div class="footer">
                            <div class="categories">
                                <span>{{ product.categorys.name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>
<style scoped>
.project-card {
    /* display: inline-block; */
    /* float: left; */
    padding: 8px 16px;
    margin: auto;
    /* width: 350px; */
    width: 100%;
    text-align: start;
}
.project-card > div{
    width: 100%;
    border:1px solid rgb(204, 204, 204)
}
.thumbnail img{
    width: 100%;
}
.details{
    padding: 8px 16px;
    font-size: .7rem;
}
.title h2{
    margin-bottom: 8px;
}
.description{
    margin-bottom: 8px;
}
.author{
    margin-bottom: 8px;
}
.progress-br{
    margin-bottom: 16px;
}
.progress-br .full{
    width: 100%;
    height: 8px;
    background-color: var(--light-green);
    margin-bottom: 4px;
}
.progress-br .percentage{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: row;
}
.progress-br .full .progress{
    height: 100%;
        border-radius: 0px;
    background-color: var(--green);
}
.request{
    color: var(--green);
}
.days{
    color: var(--green);
}
.footer{
    margin-top: 16px;
    margin-bottom: 8px;
    display: flex;
    flex-direction: row;
    align-items: center;
}
.footer > div{
    width: 50%;
}
.footer .adress i{
    color:var(--green);
    margin-right: 8px;
}
a{
    color: inherit;
    text-decoration: none;
}
</style>

<script>
export default {
    data:()=>{
        return {
            restDays:0,
        }
    },
    props:{
        product:{}
    },
    created(){
        this.getRestDays() 
    },
    methods:{
        getRestDays(){
            var date1 = new Date();
            var date2 = new Date(this.product.d_line);
            // To calculate the time difference of two dates
            var Difference_In_Time = date2.getTime() - date1.getTime();
            // To calculate the no. of days between two dates
            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
            //To display the final no. of days (result)
            this.restDays = Difference_In_Days.toFixed(0)
        },


    }
}
</script>
