<template>
    <div class="d-flex flex-wrap">
        <div class="header">
            <Header :toggleSideBar="toggleSideBar" />
        </div>
        <div class="sidebar">
            <SideBard />
        </div>
        <div class="content">
            <div class="wrapper">
                <router-view></router-view>
            </div>
        <div class="footer">
            <Footer />
        </div>
        </div>
    </div>
</template>

<style scoped>
*{
    box-sizing: border-box;
}
.header{
    height: 70px;
    width: 100%;
    overflow: hidden;
}
.sidebar{
    width: 300px;
    min-height: calc(100vh - 70px);
    position: sticky;
    top: 0px;
    bottom: 0;
}
.content{
    width: calc(100% - 300px);
    min-height: calc(100vh - 140px);
    padding-bottom: 100px;
    position: relative;
}
.wrapper{
    padding: 16px;
}
.footer{
    width: 100%;
    height: 70px;
    position: absolute;
    bottom: 0px;
}
</style>

<script>
import Header from '../components/dashboard/header.vue'
import SideBard from '../components/dashboard/side-bar.vue'
import Footer from '../components/dashboard/footer.vue'
export default {
    components : {
        Header,
        SideBard,
        Footer
    },
    methods:{
        toggleSideBar(){
            var x = document.querySelector(".sidebar");
            if (x.style.display === "none") {
                x.style.display = "block";
                document.querySelector('.content').style.width = 'calc(100% - 300px)'
            } else {
                x.style.display = "none";
                document.querySelector('.content').style.width = '100%'
            }
        }
    }
}
</script>