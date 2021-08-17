<template>
    <div class="container-fluid">
        <h1>Categories</h1>
        <div class="row">
            <div class="col-12">
                <div class="shadow-sm bg-white border rounded p-3">
                    <div class="actions row m-0 mb-3 py-3">
                        <div class="col"></div>
                        <div class="col-auto">
                            <router-link to="/dashboard/categories/add" class="btn btn-primary">Add Category</router-link>
                        </div>
                    </div>
                    <div class="p-3">
                         <Table :colums=colums :rows=rows editUrl="http://127.0.0.1:8000/api/categories" deleteUrl="http://127.0.0.1:8000/api/dashboard/admin/categorys" v-bind:edit=false v-bind:remove=true />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
</style>

<script>
import axios from 'axios'
import Table from '../../components/dashboard/table.vue'
export default {
    components:{
        Table
    },
    data:()=>{
        return{
            colums:[
                "#",
                "name"
            ],
            rows:[]
        }
    },
    created(){
        this.getCategpries()
    },
    methods:{
        getCategpries(){
            axios.get('http://127.0.0.1:8000/api/categories').then(response=>{
                if(response.status == 200)
                response.data.forEach(row => {
                    this.rows.push([
                        row.id,
                        row.name
                    ])
                });
            })
        }
    }
}
</script>
