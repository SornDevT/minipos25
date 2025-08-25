<template lang="">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class=" d-flex">
                        <select class="form-select w-auto me-2" v-model="SelectCategory" @change="getProducts()">
                            <option value="all"> ທັງໝົດ </option>
                            <option :value="item.id" v-for="item in CategoryList" :key="item.id">{{ item.CategoryName }}</option>
                        </select>
                        <div class="input-group  w-100 me-2">
                            <input type="text" class="form-control" v-model="Search" placeholder="ຄົ້ນຫາ..." @keyup.enter="getProducts()">
                            <button class="btn btn-primary px-3 " type="button" @click="getProducts()" id="button-addon2"><i class='bx bx-search' ></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <PerfectScrollbar>
            <div class="row" style=" height: calc(100vh - 300px); ">
                    <div class="col-md-3" v-for=" i in 30" :key="i">
                        <div class="card mb-4">
                            <img class="card-img-top" :src="url + '/assets/img/elements/2.png'" alt="Card image cap">
                            <div class="card-body">
                            <p class="card-text">Some quick example.</p>
                            </div>
                        </div>
                    </div>
            </div>
            </PerfectScrollbar>
        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-body p-0">

                    <div class="p-4">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">ຊື່:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ຊື່">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">ເບີໂທ:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ເບີໂທ">
                        </div>
                    </div>

                    <div class="p-4 bg-info text-white">
                        ລາຍການສິນຄ້າ
                    </div>
                    <PerfectScrollbar>
                    <div style=" height: calc(100vh - 560px); ">   
                        <table class=" table table-bordered mb-0">
                            <tbody>
                                <tr v-for=" i in 30" :key="i">
                                    <td class="p-1">
                                        <div class="d-flex ">
                                            <img :src="url + '/assets/img/elements/2.png'" class="box-img-list" alt="Product image">
                                            <div class="ms-1 w-100 d-flex flex-column">
                                                <span>Product {{ i }}</span>
                                                <div class="text-end ">2 x 100,000</div>
                                                <div class="d-flex justify-content-between">
                                                    <span>22</span>
                                                    <span>200,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    </PerfectScrollbar>
                    <div class="p-4 bg-info text-white d-flex justify-content-between fs-5">
                      <span>ລວມທັງໝົດ:</span>  
                      <span>120,000 ກີບ</span>  
                    </div>
                    <div class="p-4">
                        <button class="btn btn-success w-100">ຊຳລະເງິນ</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
import { useAuthStore } from '@/Store/auth';

export default {
   setup() {
    const authStore = useAuthStore();
    return { authStore };
  },
  data() {
    return {
        url: window.location.origin,
      CategoryList: [],
      SelectCategory: 'all',
      Search: '',
    }
    },
    methods: {
         getCategories() {
            axios.get("/api/category/index", {
                headers: {
                Authorization: "Bearer " + this.authStore.getToken
                }
            }).then((res) => {
                this.CategoryList = res.data;
            });
            },
    }, 
    created() {
        this.getCategories();
    }
}
</script>
<style scoped>
    .box-img-list {
    width: 70px;
    height: 70px;
    object-fit: cover;
    object-position: center;
    border-radius: 5px;
    border: 1px solid #c5c3c3;
    padding: 2px;
    }
</style>