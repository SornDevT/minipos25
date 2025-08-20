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
                        <div class="me-2">
                            <i class='bx bx-sort-up fs-4' ></i>
                        </div>
                        <select class="form-select w-auto me-2">
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
                            <input type="text" class="form-control" placeholder="ຄົ້ນຫາ...">
                            <button class="btn btn-primary px-3 " type="button" id="button-addon2"><i class='bx bx-search' ></i></button>
                        </div>
                        <button type="button" class="btn btn-primary"  @click="AddProduct()">ເພີ່ມຂໍ້ມູນ</button>
                    </div>
                </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ໝວດໝູ່</th>
                    <th>ຈຳນວນ</th>
                    <th>ລາຄາຊື້</th>
                    <th>ລາຄາຂາຍ</th>
                    <th class="text-center">ຈັດການ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in ProductList" :key="index">
                    <td>{{ item.ProductName }}</td>
                    <td>{{ item.CategoryName }}</td>
                    <td>{{ item.Qty }}</td>
                    <td>{{ item.PriceBuy }}</td>
                    <td>{{ item.PriceSell }}</td>
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
                <div class="col-md-4">ຮູບພາບ</div>
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
                            <input type="number" v-model="FormProduct.Qty" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                            <label class="form-label">ລາຄາຊື້: <span class="text-danger">*</span></label>
                            <input type="number" v-model="FormProduct.PriceBuy" class="form-control">
                            </div>
                            <div class="mb-3 col-md-6  ">
                            <label class="form-label">ລາຄາຂາຍ: <span class="text-danger">*</span></label>
                            <input type="number" v-model="FormProduct.PriceSell" class="form-control">
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

export default {
  data() {
    return {
      ProductList: [],
      CategoryList: [],
      FormProduct:{
        ProductName: "",
        CategoryID: "",
        ImagePath: "",
        Qty: "",
        PriceBuy: "",
        PriceSell: "",
      },
      SelectCategory: "all",
      FormType: true,
      EditID: "",
    };
  },
  computed: {
    isFormValid() {
      return this.FormProduct.ProductName && this.FormProduct.CategoryID && this.FormProduct.Qty && this.FormProduct.PriceBuy && this.FormProduct.PriceSell;
    }
  },
  methods: {
    getProducts() {
      axios.get("/api/product/index?category_id=" + this.SelectCategory).then((res) => {
        this.ProductList = res.data;
      });
    },
    getCategories() {
      axios.get("/api/category/index").then((res) => {
        this.CategoryList = res.data;
      });
    },
    getCategoryName(id) {
      let cat = this.CategoryList.find((c) => c.id === id);
      return cat ? cat.CategoryName : "-";
    },
    AddProduct() {
      this.FormType = true;
      this.ProductName = "";
      this.CategoryID = "";
      this.ImagePath = "";
      this.Qty = "";
      this.PriceBuy = "";
      this.PriceSell = "";
      $("#modal_product").modal("show");
    },
    EditProduct(id) {
      this.FormType = false;
      this.EditID = id;
      axios.get("/api/product/edit/" + id).then((res) => {
        this.FormProduct = res.data;
        $("#modal_product").modal("show");
      });
    },
    SaveProduct() {
      if (this.FormType) {
        axios.post("/api/product/add", this.FormProduct)
          .then((res) => {
            if (res.data.success) {
              $("#modal_product").modal("hide");
              this.getProducts();
            }
          });
      } else {
        axios.post("/api/product/update/" + this.EditID, this.FormProduct)
          .then((res) => {
            if (res.data.success) {
              $("#modal_product").modal("hide");
              this.getProducts();
            }
          });
      }
    },
    DelProduct(id) {
      axios.delete("/api/product/delete/" + id).then((res) => {
        if (res.data.success) {
          this.getProducts();
        }
      });
    },
  },
  created() {
    this.getProducts();
    this.getCategories();
  },
};
</script>
