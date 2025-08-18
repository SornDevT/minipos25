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

                <span class="app-brand-text demo text-heading fw-bold">ລົງທະບຽນ</span>
              </a>
            </div>
            <!-- /Logo -->
            <p class="mb-6">ລົງທະບຽນ ເພື່ອນຳໃຊ້ ລະບົບ MiniPos</p>
            <!-- {{ username }} -->
            <div id="formAuthentication" class="mb-6" >
              <div class="mb-6">
                <label for="username" class="form-label">ຊື່ຜູ້ໃຊ້:</label>
                <input type="text" v-model="username" class="form-control" id="username" name="username" placeholder="......" autofocus="">
              </div>
              <div class="mb-6">
                <label for="email" class="form-label">ອີເມວລ໌:</label>
                <input type="text" v-model="email" class="form-control" id="email" name="email" placeholder="......">
              </div>
              <div class="form-password-toggle mb-6">
                <label class="form-label" for="password">ລະຫັດຜ່ານ:</label>
                <div class="input-group input-group-merge">
                  <input type="password" v-model="password" id="password" class="form-control" name="password" placeholder="******" aria-describedby="password">
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>
              <div class="form-password-toggle mb-6">
                <label class="form-label" for="password">ຍືນຍັນ ລະຫັດຜ່ານ:</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" v-model="confirmPassword" class="form-control" name="password" placeholder="******" aria-describedby="password">
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>
              

              <div class="alert alert-danger" role="alert" v-if="message_error" > {{message_error}} </div>


              <button @click="register()" class="btn btn-primary d-grid w-100">ລົງທະບຽນ</button>
            </div>

            <p class="text-center">
              <span>ມີບັນຊີແລ້ວ</span>
              <router-link class="link fw-semibold ms-3" to="/login">
                <span>ເຂົ້າສູ່ລະບົບ</span>
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

export default {
    data() {
      return {
        username: '',
        email: '',
        password: '',
        confirmPassword: '',
        message_error:''
      }
    },
    methods: {
      register() {
        // console.log("Register");
        
        if(!this.username || !this.email || !this.password || !this.confirmPassword) {
          this.message_error = 'ກະລຸນາໃສ່ຂໍ້ມູນທັງໝົດ';
          return;
        } else if(this.password !== this.confirmPassword) {
          this.message_error = 'ລະຫັດຜ່ານບໍ່ກົງກັນ';
          return;
        } else {
          this.message_error = '';

          // ສົ່ງຂໍ້ມູນໄປບັນທຶກ
          axios.post('/api/register', {
            username: this.username,
            email: this.email,
            password: this.password
          }).then(response => {

            console.log(response.data.success);


            if(response.data.success){
              // clear from
              this.username = '';
              this.email = '';
              this.password = '';
              this.confirmPassword = '';
              this.message_error = '';
              // go to login page
              this.$router.push('/login');

            } else {
              this.message_error = response.data.message;
            }

          }).catch(error => {
            console.error('Registration failed:', error);
          });


        }



      }
    },
}
</script>
<style lang="">
    
</style>