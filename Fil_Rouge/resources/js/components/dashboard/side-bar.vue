<template>
    <div class="bg-light w-100 h-100">
        <div class="row m-0">
            <div class="col-12 p-3 text-center mb-5">
                <div class="avatar">
                    <span>A</span>
                </div>
            </div>
            <div class="col-12">
                <nav>
                    <ul>
                        <li><router-link to="/dashboard" class="btn btn-link pl-3 px-2 py-3 w-100 d-block text-left h3"><i class="fa fa-home h3 m-0 mr-3"></i> Home</router-link></li>
                        <li><router-link to="/dashboard/projects" class="btn btn-link pl-3 px-2 py-3 w-100 d-block text-left h3"><i class="fa fa-suitcase h3 m-0 mr-3"></i> Projects</router-link></li>
                        <li><router-link to="/dashboard/users" class="btn btn-link pl-3 px-2 py-3 w-100 d-block text-left h3"><i class="fa fa-users h3 m-0 mr-3"></i> Users</router-link></li>
                        <li><router-link to="/dashboard/categories" class="btn btn-link pl-3 px-2 py-3 w-100 d-block text-left h3"><i class="fa fa-boxes h3 m-0 mr-3"></i> Categories</router-link></li>
                        <li><router-link to="/dashboard/tags" class="btn btn-link pl-3 px-2 py-3 w-100 d-block text-left h3"><i class="fa fa-tags h3 m-0 mr-3"></i> Tags</router-link></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>
<style scoped>
.avatar{
    width: 100px;
    height: 100px;
    border-radius: 100px;
    border:3px solid var(--green);
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    font-size: 3rem;
    font-weight: bolder;
    color: var(--green);
    background-color: #ffffff;
}
ul{
    list-style: none;
}
li{
    border-radius: 5px;
    overflow: hidden;
}
li:hover{
    background-color: var(--green);
    color: #ffffff;
}
li i{color: var(--green);}
li a{color: var(--green); text-decoration: none;}
li:hover i{color: #ffffff;}
li:hover a{color: #ffffff; text-decoration: none}
</style>
<script>
export default {
    
}
</script>