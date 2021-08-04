<template>
    <div>
      <Header/>
        <section class="vh-100" style="background-color: #F2F2F2;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="email" placeholder="Email" id="typeEmailX" class="form-control form-control-lg" />
              <!-- <label class="form-label" for="typeEmailX">Email</label> -->
            </div>

            <div class="form-outline mb-4">
              <input type="password"  placeholder="Password" id="typePasswordX" class="form-control form-control-lg" />
              <!-- <label class="form-label" for="typePasswordX">Password</label> -->
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
              />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-success btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

            <button class="btn btn-lg btn-block btn-primary"  type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>

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