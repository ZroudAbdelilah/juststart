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
                         <Table :colums=colums :rows=rows editUrl="http://127.0.0.1:8000/api/test/edit" deleteUrl="http://127.0.0.1:8000/api/test/delete" v-bind:edit=true v-bind:remove=true />
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
export default {
    components:{
        Table
    },
    data:()=>{
        return {
            colums:[
                "#",
                "Name",
                "description",
                "holder"
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
            this.rows = [
                [1,"dummy name","Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium alias accusamus inventore voluptate fuga itaque temporibus tenetur quis vero? Culpa, eos quis cumque eligendi dolor amet voluptas illum atque aspernatur?","zroud"]
            ]
        }
    }
}
</script>

