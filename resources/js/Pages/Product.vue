<template>
  <div>
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <!-- card -->
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center"> 
            <h5 class="mb-0">ສິນຄ້າ</h5>
        
          </div>
          <div class="card-body">
            <div class="row">
                    <div class="col-md-6 d-flex mb-2">
                        <div class="me-2 cursor-pointer">
                            <i class='bx bx-sort-up fs-4' v-if="Sort === 'asc'" @click="Sort = 'desc'; getProducts()" ></i>
                            <i class='bx bx-sort-down fs-4' v-else @click="Sort = 'asc'; getProducts()" ></i>
                        </div>
                        <select class="form-select w-auto me-2" v-model="PerPage" @change="getProducts()">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>

                        <select class="form-select w-auto" v-model="SelectCategory" @change="getProducts()">
                            <option value="all"> ທັງໝົດ </option>
                            <option :value="item.id" v-for="item in CategoryList" :key="item.id">{{ item.CategoryName }}</option>
                        </select>

                    </div>
                    <div class="col-md-6 mb-2 d-flex justify-content-end">
                        <div class="input-group  w-auto me-2">
                            <input type="text" class="form-control" v-model="Search" placeholder="ຄົ້ນຫາ..." @keyup.enter="getProducts()">
                            <button class="btn btn-primary px-3 " type="button" @click="getProducts()" id="button-addon2"><i class='bx bx-search' ></i></button>
                        </div>
                        <button type="button" class="btn btn-primary"  @click="AddProduct()">ເພີ່ມຂໍ້ມູນ</button>
                    </div>
                </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ຮູບພາບ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ໝວດໝູ່</th>
                    <th>ຈຳນວນ</th>
                    <th>ລາຄາຊື້</th>
                    <th>ລາຄາຂາຍ</th>
                    <th class="text-center">ຈັດການ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in ProductList.data" :key="index">
                    <td>{{ item.id }}</td>
                    <td>
                      <img :src="url + '/assets/img/' + item.ImagePath" class="list-img shadow" v-if="item.ImagePath" alt="Product Image" width="80">
                      <img :src="url + '/assets/img/no_img.jpg'" v-else class="list-img shadow" alt="Product Image" width="80">
                    </td>
                    <td>{{ item.ProductName }}</td>
                    <td>{{ item.CategoryName }}</td>
                    <td class="text-center">{{ FormatPrice(item.Qty) }}</td>
                    <td class="text-end">{{ FormatPrice(item.PriceBuy) }} ກີບ</td>
                    <td class="text-end">{{ FormatPrice(item.PriceSell) }} ກີບ</td>
                    <td class="text-center">
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="icon-base bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);" @click="EditProduct(item.id)">
                            <i class="icon-base bx bx-edit-alt me-1"></i> ແກ້ໄຂ
                          </a>
                          <a class="dropdown-item" href="javascript:void(0);" @click="DelProduct(item.id)">
                            <i class="icon-base bx bx-trash me-1"></i> ລຶບ
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <Pagination :pagination="ProductList" :offset="4" @paginate="getProducts($event)" />

               <button @click="showAlert">Hello world</button>
            </div>
          </div>
        </div>
        <!-- /card -->
      </div>
    </div>
    <!-- /row -->

    <!-- modal -->
    <div class="modal modal-top fade" id="modal_product" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
      <div class="modal-dialog modal-lg">
        <form class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              <span v-if="FormType">ເພີ່ມສິນຄ້າ</span>
              <span v-else>ແກ້ໄຂສິນຄ້າ</span>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <!-- ຟອມຂອງສິນຄ້າ -->

            <div class="row">
                <div class="col-md-4 text-center"  >
                  <div style="position: relative;">
                  <button type="button" class="btn rounded-pill btn-icon btn-danger btn-img-rm" v-if="FormProduct.ImagePath" @click="FormProduct.ImagePath=''; ImagePreview= url + '/assets/img/upload_img.jpg'">
                  <i class='bx bx-x'></i>
                </button>
                  <label class="form-label">ຮູບພາບ</label>
                  <div class=" d-flex justify-content-center cursor-pointer" >
                     <img :src="ImagePreview" @click="$refs.img_upload.click()" alt="Product Image" width="80%" class="img-fluid mb-2" >
                  </div>

                  <input type="file" ref="img_upload" style="display: none;" @change="onSelect($event)" class="form-control">
                </div>
                </div>
                <div class="col-md-8">
                         <div class="mb-3">
                        <label class="form-label">ຊື່ສິນຄ້າ: <span class="text-danger">*</span></label>
                        <input type="text" v-model="FormProduct.ProductName" class="form-control">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                            <label class="form-label">ໝວດໝູ່: <span class="text-danger">*</span></label>
                            <select v-model="FormProduct.CategoryID" class="form-control">
                                <option v-for="cat in CategoryList" :key="cat.id" :value="cat.id">{{ cat.CategoryName }}</option>
                            </select>
                            </div>
                            <div class="mb-3 col-md-6">
                            <label class="form-label">ຈຳນວນ: <span class="text-danger">*</span></label>
                            <cleave :options="options" v-model="FormProduct.Qty" class="form-control" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                            <label class="form-label">ລາຄາຊື້: <span class="text-danger">*</span></label>
                            <cleave :options="options" v-model="FormProduct.PriceBuy" class="form-control" />
                            </div>
                            <div class="mb-3 col-md-6  ">
                            <label class="form-label">ລາຄາຂາຍ: <span class="text-danger">*</span></label>
                            <cleave :options="options" v-model="FormProduct.PriceSell" class="form-control" />
                            </div>
                        </div>
                </div>
            </div>

           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">ປິດ</button>
            <button type="button" class="btn btn-primary" @click="SaveProduct()" :disabled="!isFormValid">ບັນທຶກ</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /modal -->
  </div>
</template>

<script>
import axios from "axios";
import Cleave from 'vue-cleave-component';
import { useAuthStore } from '@/Store/auth';

export default {
  setup() {
    const authStore = useAuthStore();
    return { authStore };
  },
  data() {
    return {
      url: window.location.origin,
     ImagePreview: window.location.origin + '/assets/img/upload_img.jpg',
      ProductList: {
        data:{}
      },
      CategoryList: [],
      FormProduct:{
        ProductName: "",
        CategoryID: "",
        ImagePath: "",
        Qty: "",
        PriceBuy: "",
        PriceSell: "",
      },
      PerPage:10,
      SelectCategory: "all",
      Sort:"asc",
      Search:"",
      FormType: true,
      EditID: "",
      options: {
                  numeral: true,
                  numeralPositiveOnly: true,
                  noImmediatePrefix: true,
                  rawValueTrimPrefix: true,
                  numeralIntegerScale: 10,
                  numeralDecimalScale: 2,
                  numeralDecimalMark: '.',
                  delimiter: ','
                }
    };
  },
  computed: {
    isFormValid() {
      return this.FormProduct.ProductName && this.FormProduct.CategoryID && this.FormProduct.Qty && this.FormProduct.PriceBuy && this.FormProduct.PriceSell;
    }
  },
  components: {
    Cleave
  },
  methods: {
    showAlert() {
      // Use sweetalert2
      this.$swal({
        title: "ທ່ານແນ່ໃຈບໍ່?",
        text: "ທີ່ຈະທຳການລຶບຂໍ້ມູນນີ້!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ຕົກລົງ!",
        cancelButtonText: "ຍົກເລີກ"
      }).then((result) => {
        if (result.isConfirmed) {
          this.$swal({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
        }
      });
    },
    onSelect(e){

      console.log(e);
      if(e.target.files.length > 0) {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = (event) => {
          this.ImagePreview = event.target.result;
        };
        reader.readAsDataURL(file);
        this.FormProduct.ImagePath = file;
      } else {
        this.FormProduct.ImagePath = "";
        this.ImagePreview = window.location.origin + '/assets/img/upload_img.jpg';
      }

    },
    FormatPrice(value) {
             let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
    getProducts(page=1) {
      axios.get("/api/product/index?page=" + page + "&category_id=" + this.SelectCategory + "&per_page=" + this.PerPage + "&sort=" + this.Sort + "&search=" + this.Search,{
        headers: {
          Authorization: "Bearer " + this.authStore.getToken
        }
      }).then((res) => {
        this.ProductList = res.data;
      });
    },
    getCategories() {
      axios.get("/api/category/index", {
        headers: {
          Authorization: "Bearer " + this.authStore.getToken
        }
      }).then((res) => {
        this.CategoryList = res.data;
      });
    },
    getCategoryName(id) {
      let cat = this.CategoryList.find((c) => c.id === id);
      return cat ? cat.CategoryName : "-";
    },
    AddProduct() {
      this.FormType = true;
      this.FormProduct = {
          ProductName: "",
          CategoryID: "",
          ImagePath: "",
          Qty: "",
          PriceBuy: "",
          PriceSell: "",
      }
      this.ImagePreview = window.location.origin + '/assets/img/upload_img.jpg';

      $("#modal_product").modal("show");
    },
    EditProduct(id) {
      this.FormType = false;
      this.EditID = id;
      axios.get("/api/product/edit/" + id, {
        headers: {
          Authorization: "Bearer " + this.authStore.getToken
        }
      }).then((res) => {
        this.FormProduct = res.data;
        if(this.FormProduct.ImagePath) {
          this.ImagePreview = this.url + '/assets/img/' + this.FormProduct.ImagePath;
        } else {
          this.ImagePreview = this.url + '/assets/img/no_img.jpg';
        }
        $("#modal_product").modal("show");
      });
    },
    SaveProduct() {
      if (this.FormType) {
        axios.post("/api/product/add", this.FormProduct,{ headers: { "Content-Type": "multipart/form-data", Authorization: "Bearer " + this.authStore.getToken } })
          .then((res) => {
            $("#modal_product").modal("hide");
            if (res.data.success) {
              
              this.getProducts();

              this.$swal({
                toast: true,
                position: "top-end",
                icon: "success",
                title: res.data.message,
                showConfirmButton: false,
                timer: 2500
              });
            } else {
              this.$swal({
                position: "center",
                icon: "error",
                title: "ເກີດຂໍ້ຜິດຜາດ!",
                text: res.data.message,
                showConfirmButton: false,
                timer: 5500
              });
            }
          });
      } else {
        axios.post("/api/product/update/" + this.EditID, this.FormProduct, { headers: { "Content-Type": "multipart/form-data", Authorization: "Bearer " + this.authStore.getToken } })
          .then((res) => {

            $("#modal_product").modal("hide");

            if (res.data.success) {
              this.getProducts();

               this.$swal({
                toast: true,
                position: "top-end",
                icon: "success",
                title: res.data.message,
                showConfirmButton: false,
                timer: 2500
              });

            } else {
              this.$swal({
                position: "center",
                icon: "error",
                title: "ເກີດຂໍ້ຜິດຜາດ!",
                text: res.data.message,
                showConfirmButton: false,
                timer: 5500
              });
            }
          });
      }
    },
    DelProduct(id) {

      this.$swal({
        title: "ທ່ານແນ່ໃຈບໍ່?",
        text: "ທີ່ຈະທຳການລຶບຂໍ້ມູນນີ້!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ຕົກລົງ!",
        cancelButtonText: "ຍົກເລີກ"
      }).then((result) => {
        if (result.isConfirmed) {

          axios.delete("/api/product/delete/" + id, {
            headers: {
              Authorization: "Bearer " + this.authStore.getToken
            }
          }).then((res) => {
            if (res.data.success) {
              this.getProducts();
              this.$swal({
                toast: true,
                position: "top-end",
                icon: "success",
                title: res.data.message,
                showConfirmButton: false,
                timer: 2500
              });
            } else {
              this.$swal({
                position: "center",
                icon: "error",
                title: "ເກີດຂໍ້ຜິດຜາດ!",
                text: res.data.message,
                showConfirmButton: false,
                timer: 5500
              });
            }
          });


        }
      });


    },
  },
  created() {
    this.getProducts();
    this.getCategories();
  },
  watch: {
    Search(val){
      if(val.length == 0) {
        this.getProducts();
      }
    }
  }
};
</script>
<style scoped>

  .list-img {
      border: 1px solid #a3a3a3;
      border-radius: 5px;
      padding: 2px;
  }
  .btn-img-rm {
      position: absolute;
    right: 10px;
    top: 10px;
  }
</style>
