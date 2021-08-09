<template>
    <div>
        <header class="bg-success">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-auto p-3">
                        <div class="menu-button text-white" @click="toggleSideBar()">
                            <span><i class="fa fa-bars h3"></i></span>
                        </div>
                    </div>
                    <div class="col text-center p-3">
                        <div class="logo">
                            <img src="/img/juststart-light.png" height="40" alt="">
                        </div>
                    </div>
                    <div class="col-auto p-3">
                        <div class="logout">
                            <a @click="logout()" class="bnt bnt-link"><i class="fa fa-sign-out-alt text-white h3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props:
        ['toggleSideBar']
    ,
    methods:{
        // toggleSlider(){
        //     this.$emit('toggle')
        // }
        logout(){
            axios.get('http://127.0.0.1:8000/api/logout/'+JSON.parse(localStorage.getItem('user')).id).then(response=>{
                if(response.status == 200){
                    console.log(response);
                    localStorage.removeItem('token')
                    this.$router.push('/login')
                }
            })
        }
    }
}
</script>