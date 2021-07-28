<template>
    <div>
        <h1>Header</h1>
        <hr>
        <ul>
            <li @click="link()" :class="(active == 'home')?'active':''" ><router-link to="/" >Home</router-link></li>
            <li @click="link()" :class="(active == 'contact')?'active':''"><router-link to="/contact" >Contact</router-link></li>
        </ul>

        <input type="text" v-model="msg">
        <br>
    </div>
</template>

<style scoped>
li.active{
    color: red;
}
h1{
    color: green;
}
</style>

<script>
export default {
    props:{
        active:String
    },
    data:()=>{
        return {
            msg:''
        }
    },
    watch:{
        msg(){
        
        }
    },
    methods:{
        link(){
            setTimeout(() => {
                this.msg = "dsfsdf";
            }, 3000);
        }
    },
    created(){
        this.link()
    }
}
</script>