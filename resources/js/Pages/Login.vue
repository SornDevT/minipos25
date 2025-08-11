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

            <form id="formAuthentication" class="mb-6" action="index.html">
   
              <div class="mb-6">
                <label for="email" class="form-label">ອີເມວລ໌:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="......" autofocus="">
              </div>
              <div class="form-password-toggle mb-6">
                <label class="form-label" for="password">ລະຫັດຜ່ານ:</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="******" aria-describedby="password">
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>
           <div class="my-7">
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                  <label class="form-check-label" for="terms-conditions">
                    ຈື່ຂ້ອຍໄວ້ໃນລະບົບ
                  </label>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100">ເຂົ້າສູ່ລະບົບ</button>
            </form>

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
export default {
    
}
</script>
<style lang="">
    
</style>