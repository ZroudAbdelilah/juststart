<template>
    <div>
        <div class="container-fluid">
            <h1 class="mb-5">Add Category</h1>
            <div class="row">
                <div class="col-12 p-3 bg-white shadow-sm">
                    <div v-if="errMessage !== ''" class="alert alert-danger mb-3">
                        {{ errMessage }}
                    </div>
                        <form @submit.prevent="addCategory">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="name">Name:</label>
                                <input type="text" v-model="name" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-lg" type="submit">Save</button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>

<script>
import axios from 'axios'
export default {
// api/dashboard/admin/projects/create
    data() {
        return {
            'name':'',
            'errMessage' : ''
        }
    },
    created(){
    },
    methods:{
        addCategory(){
            if(this.validate()){
                axios({
                    url:'http://127.0.0.1:8000/api/dashboard/admin/categorys',
                    method:'POST',
                    headers:{
                        id:this.project_leader_id,
                        token:localStorage.getItem('admin_token')
                    },
                    data:{
                        'name': this.name,
                    }
                }).then(response=>{
                    if(response.status == 201)
                        this.$router.push('/dashboard/categories')
                }).catch(error=>{
                    console.error(error);
                })

            }else{
                this.errMessage = "Please make sure to fill all required fields!";
            }
        },
        validate(){
            if(this.name == '') return false;
            this.errMessage = "";
            return true;
        }
    }
}
</script>
