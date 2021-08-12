<template>
    <div class="header">
        <nav class="navbar navbar-expand-lg ">
            <div class="col-auto d-flex align-items-center m-3">
                <img src="/img/juststart.png" alt="logo" width="100" class="logo img-fluid">
            </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <i class="fa fa-bars"></i>
        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <router-link class="nav-link" to="/">Accueil <span class="sr-only">(current)</span></router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/projects">Découvrir Projets</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/porteurproject/register"  class="nav-link">Démarrer Un Projet</router-link>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit"><i  class="fas fa-search"></i></button>
          <router-link to="/login" class="btn btn-outline-success my-2 my-sm-0 mr-2" >Connexion</router-link>
          <router-link class="btn btn-outline-primary my-2 my-sm-0" to="/register" >S'inscrire</router-link>
        </form>
  </div>
</nav>



    </div>
</template>

<style scoped>
.header{
  top: 0;
  background-color: #ffffff;
  position: sticky;
  z-index: 9;
}
.shadow{
  box-shadow: rgb(139 138 138 / 18%) 0px 3px 6px !important;
}
a{
    color: inherit;
}
span.navbar-toggler-icon {
    height: fit-content;
    width: fit-content;
}
</style>

<script>
export default {
    created(){
      window.addEventListener('scroll',()=>{
        let scrollTop = window.scrollY;
          if(scrollTop > 200){
            document.querySelector('.header').classList.add('shadow');
          }else{
            document.querySelector('.header').classList.remove('shadow');
          }
      })
    }

}
</script>