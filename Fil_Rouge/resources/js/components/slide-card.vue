<template>
    <div style="width:fit-content;">
        <div class="card" style="width: 18rem;">
            <div class="thumbnail">
                <img
        :src=project.thumbnail
        class="card-img-top"
        :alt=project.name
        />
        <div class="progress">
            <div class="progress-bar bg-success" :style="'width: '+((project.invested/project.target_b)*100).toFixed(0)+'%'" role="progressbar" :aria-valuenow=((project.invested/project.target_b)*100).toFixed(0) aria-valuemin="0" aria-valuemax="100"></div>
        </div>
            </div>
        <div class="card-body">
        <h3>{{project.name}}</h3>
        <p class="card-text">
        {{project.description.substring(0,70)}}
        </p>
        <div class="author">
                    <small class="text-muted">By {{project.project_leader.username}}</small>
        </div>
        </div>
        </div>

    </div>
</template>

<style scoped>
.thumbnail{
    position: relative;
}
.thumbnail .progress{
    border-radius: 0px;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 8px;
}
</style>

<script>
export default {
    props:{
        project:Object
    },
    created(){
        console.log(this.project);
    }
}
</script>