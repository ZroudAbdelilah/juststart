<template>
    <div>
        <div class="container-fluid">
            <h1 class="mb-5">Add Projects</h1>
            <div class="row">
                <div class="col-12 p-3 bg-white shadow-sm">
                    <div v-if="errMessage !== ''" class="alert alert-danger mb-3">
                        {{ errMessage }}
                    </div>
                        <form action="" method="post" enctype="multipart/form-data" @submit.prevent="addProject">
                        <div class="row">
                            <div class="form-group col-8">
                                <label for="name">Name:</label>
                                <input type="text" v-model="name" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label for="target_b">Target budget:</label>
                                <input type="text" v-model="target_b" id="target_b" name="target_b" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="d_line">Deadline:</label>
                                <input type="date" v-model="d_line" id="d_line" name="d_line" class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label for="thumbnail">Thumbnail:</label>
                                <input accept="image/png, image/jpg, image/jpeg" type="file" @change="setThumbnail" id="thumbnail" name="thumbnail" class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label for="categorys_id">Category:</label>
                                <select :key=key @change="setCategory"  id="categorys_id" name="categorys_id" class="form-control">
                                    <option value="" disabled selected>Category...</option>
                                    <option v-for="category,key in categories" :key=key :value="category.id">{{ category.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="description">Description:</label>
                                <textarea v-model="description" id="description" name="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="invested">Invested:</label>
                                <input type="text" v-model="invested" id="invested" name="invested" class="form-control">
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
            'target_b':'',
            'invested':'',
            'description':'',
            'd_line':'',
            'thumbnail':'',
            'categorys_id':'',
            'project_leader_id':JSON.parse(localStorage.getItem('user')).id,
            'categories' : [],
            'key' : 0,
            'errMessage' :''
        }
    },
    created(){
        this.getCategories()
    },
    methods:{
        setThumbnail(event) {
            this.thumbnail = event.target.files[0];
            console.log(this.thumbnail);
        },
        setCategory(event){
            this.categorys_id = event.target.value
        },
        getCategories(){
            axios.get('http://127.0.0.1:8000/api/categories').then(response=>{
                if(response.status == 200)
                    this.categories = response.data
                    this.key++
            })
        },
        addProject(){
            if(this.validate()){
                axios.post('http://127.0.0.1:8000/api/dashboard/admin/projects',{
                    Headers:{
                        id:this.project_leader_id,
                        token:localStorage.getItem('admin_token')
                    },
                    data:{
                        // name':'',
                        // target_b':'',
                        // invested':'',
                        // description':'',
                        // d_line':'',
                        // thumbnail':'',
                        // categorys_id':'',
                        // project_leader_id':JSON.parse(localStorage.getItem('user')).id,
                        // categories' : [],
                        // key' : 0,
                        // errMessage' :''
                    }
                })
            }else{
                this.errMessage = "Please make sure to fill all required fields!";
            }
        },
        validate(){
            if(this.name == '') return false;
            if(this.target_b == '') return false;
            if(this.invested == '') return false;
            if(this.description == '') return false;
            if(this.d_line == '') return false;
            if(this.thumbnail == '') return false;
            if(this.categorys_id == '') return false;
            if(this.project_leader_id == '') return false;
            this.errMessage = "";
            return true;
        }
    }
}
</script>
