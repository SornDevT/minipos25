<template lang="">
    <div class="container-xxl d-flex justify-content-center">
    <div class="authentication-wrapper authentication-basic container-p-y col-lg-4">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card px-sm-6 px-0">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-6">
              <a href="index.html" class="app-brand-link gap-2">

                <span class="app-brand-text demo text-heading fw-bold">ສະບາຍດີ</span>
              </a>
            </div>
            <!-- /Logo -->
            <p class="mb-6">ຍິນດີຕ້ອນຮັບ ເຂົ້າສູ່ລະບົບ MiniPos</p>

            <div id="formAuthentication" class="mb-6" >
   
              <div class="mb-6">
                <label for="email" class="form-label">ອີເມວລ໌:</label>
                <input type="text" v-model="email" class="form-control" id="email" name="email" placeholder="......" autofocus="">
              </div>
              <div class="form-password-toggle mb-6">
                <label class="form-label" for="password">ລະຫັດຜ່ານ:</label>
                <div class="input-group input-group-merge">
                  <input :type="show_pass" v-model="password" id="password" class="form-control" name="password" placeholder="******" aria-describedby="password">

                  <!-- <span class="input-group-text cursor-pointer" @click="show_pass = show_pass === 'password' ? 'text' : 'password'"> -->

                  <span class="input-group-text cursor-pointer" @click="show_password()">
                    <i class="icon-base bx bx-hide" v-if="show_pass == 'password'"></i>
                    <i class="icon-base bx bx-show" v-else ></i>
                  </span>
                </div>
              </div>
           <div class="my-7"> 
                <div class="form-check mb-0">
                  <input class="form-check-input" v-model="remember_me" type="checkbox" id="terms-conditions" name="terms">
                  <label class="form-check-label" for="terms-conditions">
                    ຈື່ຂ້ອຍໄວ້ໃນລະບົບ
                  </label>
                </div>
              </div>
              <div class="alert alert-danger" role="alert" v-if="message_error || message_email || message_password" > {{message_error}}  {{ message_email }} {{ message_password }}</div>
              
              <button class="btn btn-primary d-grid w-100" @click="Login()" :disabled="isFormValid" >ເຂົ້າສູ່ລະບົບ</button>
            </div>

            <p class="text-center">
              <span>ບໍ່ມີບັນຊີເທື່ອ!</span>
              <router-link class="link fw-semibold ms-3" to="/register">
                <span>ລົງທະບຽນ</span>
              </router-link>
            </p>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import { useAuthStore } from '@/Store/auth';

export default {
  setup() {
    const authStore = useAuthStore();
    return { authStore };
  },
    data() {
      return {
        email:'',
        password:'',
        remember_me: false,
        message_email:'',
        message_password:'',
        message_error:'',
        show_pass: 'password'
      }
    },
    computed: {
        isFormValid(){

          // check email
          const emailPatten = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/; // email regex patten
          if(this.email){

            if(!emailPatten.test(this.email)){
              this.message_email = 'ອີເມວລ໌ບໍ່ຖືກຕ້ອງ';
            } else {
              this.message_email = '';
            }

          } else {
            this.message_email = '';
          }
          //-------------

          // check password
          if(this.password){

            if(this.password.length < 6){
              this.message_password = 'ລະຫັດຜ່ານຕ້ອງມີ 6 ຕົວອັກສອນ';
            } else {
              this.message_password = '';
            }

          } else {
            this.message_password = '';
          }
          // ------------

          // disable button

          if(!emailPatten.test(this.email) || this.password.length < 6){
            return true;
          } else {
            return false;
          }


        }
    },
    methods:{
        show_password(){
            if(this.show_pass === 'password'){
                this.show_pass = 'text';
            } else {
                this.show_pass = 'password';
            }
        },
        Login(){
          axios.post('/api/login', {
            email: this.email,
            password: this.password,
            remember_me: this.remember_me
          }).then(response => {

            if(response.data.success){
              // clear from
              this.email = '';
              this.password = '';
              this.remember_me = false;
              this.message_error = '';

              // set token
              localStorage.setItem('user', JSON.stringify(response.data.user));
              localStorage.setItem('token', response.data.token);
              // set auth pinia

              this.authStore.setUser(JSON.stringify(response.data.user));
              this.authStore.setToken(response.data.token);


              console.log('Token:', response.data.token);

              // redirect to dashboard
              this.$router.push('/');
              console.log('User logged in successfully');

            } else {
              this.message_error = response.data.message;
            }

          }).catch(error => {
            console.error(error);
           
          });
        }
    }
}
</script>
<style lang="">
    
</style>