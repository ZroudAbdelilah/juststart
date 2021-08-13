<template>
    <div class="container-fluid">
        <h1>Users</h1>
        <div class="row">
            <div class="col-12">
                <div class="shadow-sm bg-white border rounded p-3">
                    <div class="actions row m-0 mb-3 py-3">
                        <div class="col"></div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-primary">Add user</a>
                        </div>
                    </div>
                    <div class="p-3">
                         <Table :colums=colums :rows=rows editUrl="http://127.0.0.1:8000/api/test/edit" deleteUrl="http://127.0.0.1:8000/api/test/delete" v-bind:edit=false v-bind:remove=false />
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
        return {
            colums:[
                "#",
                "Name",
                "Email",
                "adress",
            ],
            rows:[]
        }
    },
    created(){
        this.getUsers()
    },
    methods:{
        getUsers(){
            axios.get('http://127.0.0.1:8000/api/dashboard/admin/users',{
                headers:{
                    token: localStorage.getItem('admin_token')
                }
            }).then(response=>{
                console.log(response);
                if(response.status == 200){
                    response.data.forEach(row => {
                        this.rows.push([
                            row.id,
                            row.username,
                            row.email,
                            row.adresss.county+' '+row.adresss.state+' '+row.adresss.city+' '+row.adresss.street+' '+row.adresss.p_code
                        ])
                    });
                }
            });

        }
    }
}
</script>
