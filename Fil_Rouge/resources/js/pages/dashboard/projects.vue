<template>
    <div>
    <div class="container-fluid">
        <h1>Projects</h1>
        <div class="row">
            <div class="col-12">
                <div class="shadow-sm bg-white border rounded p-3">
                    <div class="actions row m-0 mb-3 py-3">
                        <div class="col"></div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-primary">Add product</a>
                        </div>
                    </div>
                    <div class="p-3">
                         <Table :colums=colums :rows=rows editUrl="http://localhost:8000/api/dashboard/admin/projects" deleteUrl="http://localhost:8000/api/dashboard/admin/projects" v-bind:edit=true v-bind:remove=true />
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<style>

</style>
<script>
import Table from '../../components/dashboard/table.vue'

// api
import axios from 'axios'
export default {
    components:{
        Table
    },
    data:()=>{
        return {
            colums:[
                '#',
                'Thumbnail',
                'Name',
                'Target budject',
                'Invested',
                'Description',
                'Dead line',
                'Category',
                'Project leader'
            ],
            rows:[]
        }
    },
    created(){
        setTimeout(() => {
            this.getProjects()
        }, 2000);
    },
    methods:{
        getProjects(){
            axios.get('http://127.0.0.1:8000/api/projects').then(response=>{
                console.log(response);
                if(response.status == 200){
                    response.data.forEach(data => {
                        let row = [
                            data.id,
                            data.thumbnail,
                            data.name,
                            data.target_b+'$',
                            data.invested+'$',
                            data.description.substring(0,70),
                            data.d_line,
                            data.categorys.name,
                            data.project_leader.username,
                        ];
                        this.rows.push(row)
                    });
                }
            })
        }
    }
}
</script>

