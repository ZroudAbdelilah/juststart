<template>
    <div>
        <table class="display table-bordered nowrap table-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th v-for="(colum,key) in colums" :key=key >{{ colum }}</th>
                    <th v-if="(edit || remove)">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row,key) in rows" :key=key >
                    <td class="text-wrap" v-for="(col , key) in row" :key=key>{{col}}</td>
                    <td v-if="(edit || remove)">
                        <span class="btn btn-primary" v-if="edit" @click="update(row[0])">Edit</span>
                        <span class="btn btn-danger" v-if="remove" @click="delet(row[0])">Delete</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
td,th{
    padding: 8px;
}
</style>

<script>
import axios from 'axios'
import Swal from 'sweetalert2'
export default {
    data:()=>{
        return {
            dataTable : ''
        }
    },
    props:{
        colums : Array,
        rows : Array,
        deleteUrl: String,
        editUrl: String,
        edit: Boolean,
        remove: Boolean
    },
    mounted(){
        if(this.rows.lenght > 0)
        this.dataTable = $('table').DataTable()
    },
    watch:{
        rows(){
            this.reloadTable()
        }
    },
    methods:{
        update(id){
            router.go(this.editUrl+'/'+id)
        },
        delet(id){
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover it again',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios({
                        method:'DELETE',
                        url:this.deleteUrl+'/'+id,
                        headers:{
                            'token' : localStorage.getItem('token')
                        }
                    }).then(response => {
                        if(response.status == 200 && response.data == 1){
                            this.rows.forEach((row,index) => {
                                if(row[0] == id){
                                    this.rows.splice(index, 1);
                                }
                            })
                            Swal.fire("Deleted successfully!")
                        }
                    })
                }
            })
        },
        reloadTable(){
            this.dataTable = $('table').DataTable()
            this.dataTable.destroy()
            this.$nextTick(() => {
               this.dataTable = $('table').DataTable()
            });
        }
    }
}
</script>