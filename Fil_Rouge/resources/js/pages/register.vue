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
                  <input v-model="username" placeholder="Username" id="Username" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                </div>
                <div class="col form-outline mb-4">
                  <input v-model="email" type="email" placeholder="Email" id="typeEmailX" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                </div>
            </div>
            <div class="row">
                <div class="col form-outline mb-4">
                  <input v-model="password" type="password"  placeholder="Password" id="typePasswordX" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
                <div class="col form-outline mb-4">
                  <input v-model="password_confirmation" type="password"  placeholder="Confirm Password" id="typePasswordX" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
            </div>
            <div class="row">
                <div class="col form-outline mb-4">
                  <input v-model="country" placeholder="Country" id="county" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
                <div class="col form-outline mb-4">
                  <input v-model="state" placeholder="State " id="state " class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
            </div>
            <div class="row">
                <div class="col form-outline mb-4">
                  <input v-model="city"  placeholder="City" id="city" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
                <div class="col form-outline mb-4">
                  <input v-model="street"  placeholder="Street" id="street" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
            </div>
            <div class="row">
            <div class="col form-outline mb-4">
                  <input v-model="pCode" placeholder="Code postal" id="p_code" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                </div>
            </div>


            <button @click="register()" class="btn btn-success btn-lg btn-block" type="submit">Register</button>


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
// api
import axios from 'axios'
export default {
     components:{
        Header,
        Footer
    },
    data:()=>{
      return {
        username:'',
        email:'',
        password:'',
        password_confirmation:'',
        country:'',
        state:'',
        city:'',
        street:'',
        pCode:''
      }
    },
    methods:{
      register(){
          if(this.validate()){
            axios.post('http://127.0.0.1:8000/api/user/register',{
                'username':this.username,
                'email': this.email,
                'password': this.password,
                'password_confirmation': this.password_confirmation,
                'county': this.country,
                'state': this.state,
                'city': this.city,
                'street': this.street,
                'p_code': this.pCode,
                'X-CSRF-TOKEN' : window.token
              }).then(response=>{
                if(response.status == 201){
                  console.log(response);
                  // localStorage.setItem('token',response.data.token)
                  this.$router.push('/login')
                }
              })
          }
      },
      validate(){
        if(this.username == '') return false
        if(this.email == '') return false
        if(this.password == '') return false
        if(this.password_confirmation == '') return false
        if(this.country == '') return false
        if(this.state == '') return false
        if(this.city == '') return false
        if(this.street == '') return false
        if(this.pCode == '') return false

        return true
      }
    }
}
</script>