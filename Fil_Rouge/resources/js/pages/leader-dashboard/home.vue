<template>
    <div class="container-fluid">
        <h1>Dashboard</h1>
        <div class="row my-3">
            <div class="col">
                <div class="shadow border rounded bg-success text-white p-3">
                    <h2>Total projects:</h2>
                    <span class="h4">{{ projects }}</span>
                </div>
            </div>
            <div class="col">
                <div class="shadow border rounded bg-danger  text-white p-3">
                    <h2>Total Inested:</h2>
                    <span class="h4">{{ invested }}$</span>
                </div>
            </div>
            <div class="col">
                <div class="shadow border rounded bg-info text-white p-3">
                    <h2>Total Leaders:</h2>
                    <span class="h4">{{ leaders }}</span>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12">
                <div class="shadow border rounded bg-light text-white p-3">
                    <Table :colums=colums :rows=rows editUrl="/dashboard/projects/update" deleteUrl="http://127.0.0.1:8000/api/dashboard/admin/projects" v-bind:edit=true v-bind:remove=true />
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
    components: {
        Table
    },
    data () {
      return {
        projects:0,
        invested:0,
        leaders:0,
        colums:[
                '#',
                'Name',
                'Target budject',
                'Invested',
                'Dead line'
            ],
            rows:[]
      }
    },
    created(){
        this.totalProjects()
        this.totalInvested()
        this.totalLeaders()
        this.getProjects()
    },
    methods: {
        totalProjects(){
            axios.get("http://127.0.0.1:8000/api/projects/total").then(response=>{
                if(response.status == 200)
                    this.projects = response.data
            })
        },
        totalInvested(){
            axios.get("http://127.0.0.1:8000/api/projects/invested/total").then(response=>{
                if(response.status == 200)
                    this.invested = response.data
            })
        },
        totalLeaders(){
            axios.get("http://127.0.0.1:8000/api/leaders/total").then(response=>{
                if(response.status == 200)
                    this.leaders = response.data
            })
        },
        getProjects(){
            axios.get('http://127.0.0.1:8000/api/projects').then(response=>{
                console.log(response);
                if(response.status == 200){
                    response.data.forEach(data => {
                        let row = [
                            data.id,
                            data.name,
                            data.target_b+'$',
                            data.invested+'$',
                            data.d_line,
                        ];
                        this.rows.push(row)
                    });
                }
            })
        }
    }
  }
</script>
