<template>
    <div>
        <div class="card" style="width: 18rem;">
            <div class="thumbnail">
                <img
        src="/img/img2.png"
        class="card-img-top"
        alt=""
        />
        <div class="progress">
            <div class="progress-bar bg-success" style="width: 25%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
            </div>
        <div class="card-body">
        <h3>tiltle</h3>
        <p class="card-text">
        Some quick example text to build on the card title and make up the bulk of the
        card's content.
        </p>
        <div class="author">
                    <small class="text-muted">By Zroud</small>
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
    
}
</script>