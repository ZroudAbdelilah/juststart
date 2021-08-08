<template>
    <div>
      <Header/>
        <section class="vh-100" style="background-color: #F2F2F2;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Inscription</h3>
            <div class="row">
                <div class="col form-outline mb-4">
                  <input  placeholder="Username" id="Username" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                </div>
                <div class="col form-outline mb-4">
                  <input type="email" placeholder="Email" id="typeEmailX" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                </div>
            </div>
            <div class="row">
                <div class="col form-outline mb-4">
                  <input type="password"  placeholder="Password" id="typePasswordX" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
                <div class="col form-outline mb-4">
                  <input type="password"  placeholder="Confirm Password" id="typePasswordX" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
            </div>
            <div class="row">
                <div class="col form-outline mb-4">
                  <input  placeholder="Country" id="county" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
                <div class="col form-outline mb-4">
                  <input  placeholder="State " id="state " class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
            </div>
            <div class="row">
                <div class="col form-outline mb-4">
                  <input  placeholder="City" id="city" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
                <div class="col form-outline mb-4">
                  <input  placeholder="Street" id="street" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
            </div>
            <div class="row">
            <div class="col form-outline mb-4">
                  <input  placeholder="Code postal" id="p_code" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
            </div>


            <button class="btn btn-success btn-lg btn-block" type="submit">Register</button>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<Footer/>
    </div>
</template>

<style scoped>
::placeholder{
  font-size: 0.8rem;
}
</style>

<script>
import Header from '../components/header.vue'
import Footer from '../components/footer.vue'
export default {
     components:{
        Header,
        Footer
    },
}
</script>