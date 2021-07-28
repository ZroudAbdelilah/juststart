<template>
    <div>
        <div class="project-card">
            <div>
                <div class="thumbnail">
                <img src="/img/product-thumbnail.jpg" alt="">
            </div>
            <div class="details">
                <div class="title">
                    <h2>{{ product.title }}</h2>
                </div>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus architecto, quibusdam perspiciatis hic eligendi illo ipsum error natus, laborum magnam, placeat illum rem. Minus rem velit ea, cumque sunt alias.</p>
                </div>
                <div class="author">
                    <span>By Zroud</span>
                </div>
                <div class="progress-bar">
                    <div class="full">
                        <div style="width:50%;" class="progress"></div>
                    </div>
                    <div class="percentage">
                        <div class="min"><span>0%</span></div>
                        <div class="max"><span>100%</span></div>
                    </div>
                </div>
                <div class="request">
                    <span>3456$ engagés</span>
                </div>
                <div class="days">
                    <span>Rest 19 jours</span>
                </div>
                <div class="footer">
                    <div class="categories">
                        <span>Category</span>
                    </div>
                    <div class="adress">
                        <span><i class="fa fa-map-marker-alt"></i>Adress</span>
                    </div>
                </div>
            </div>
            </div>
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
.progress-bar{
    margin-bottom: 16px;
}
.progress-bar .full{
    width: 100%;
    height: 8px;
    background-color: var(--light-green);
    margin-bottom: 4px;
}
.progress-bar .percentage{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: row;
}
.progress-bar .full .progress{
    height: 100%;
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
</style>

<script>
export default {
    props:{
        product:{}
    }
}
</script>