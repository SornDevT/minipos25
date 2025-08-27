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
                    <div class="col-md-3 cursor-pointer" v-for=" item in ProductList" :key="item.id" @click="AddOrder(item.id)">
                        <div class="card mb-4" style=" position: relative;">
                            <span v-for="or in ListOrder" :key="or.id">
                                 <span v-if="item.id == or.id" class="num-box">{{ or.qty }}</span>
                            </span>
                           
                            <img class="card-img-top box-img-pos" v-if="item.ImagePath" :src="url + '/assets/img/' + item.ImagePath" alt="Card image cap">
                            <img class="card-img-top box-img-pos" v-else :src="url + '/assets/img/no_img.jpg'" alt="Card image cap">
                            <div class="card-body p-2 text-center">
                            <p class="card-text">{{ item.ProductName }}</p>
                            <p class="card-text">{{ FormatPrice(item.PriceSell) }} ກີບ</p>
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
                            <input type="text" class="form-control" v-model="customer_name" id="exampleFormControlInput1" placeholder="ຊື່">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">ເບີໂທ:</label>
                            <input type="text" class="form-control" v-model="customer_tel" id="exampleFormControlInput1" placeholder="ເບີໂທ">
                        </div>
                    </div>

                    <div class="p-4 bg-info text-white">
                        ລາຍການສິນຄ້າ
                    </div>
                    <PerfectScrollbar>
                    <div style=" height: calc(100vh - 560px); position: relative;">   
                        <div v-if="ListOrder.length==0" style="position: absolute; top: 50%;" class=" w-100 text-center ">ບໍ່ມີລາຍການທີ່ເລືອກ</div>
                        <table class=" table table-bordered mb-0">
                            <tbody>
                                <tr v-for=" i in ListOrder" :key="i">
                                    <td class="p-1">
                                        <div class="d-flex ">
                                            <img v-if="i.image" :src="url + '/assets/img/'+i.image" class="box-img-list" alt="Product image">
                                            <img v-else :src="url + '/assets/img/no_img.jpg'" class="box-img-list" alt="Product image">
                                            <div class="ms-2 me-2 w-100 d-flex flex-column">
                                                <span>{{ i.name }}</span>
                                                <div class="text-end ">{{FormatPrice(i.qty)}} x {{FormatPrice(i.price)}}</div>
                                                <div class="d-flex justify-content-between">
                                                    <span><i class='bx bxs-plus-circle text-success cursor-pointer' @click="AddOrder(i.id)"></i> | <i class='bx bxs-minus-circle text-warning cursor-pointer' @click="RemoveOrder(i.id)"></i> | <i class='bx bxs-trash text-danger cursor-pointer' @click="DelOrder(i.id)"></i></span>
                                                    <span>{{ FormatPrice(i.qty*i.price) }}</span>
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
                      <span>{{ FormatPrice(SumTotal) }} ກີບ</span>  
                    </div>
                    <div class="p-4">
                        <button :disabled="SumTotal === 0" @click="Pay()" class="btn btn-success w-100">ຊຳລະເງິນ</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- modal -->
    <div class="modal modal-top fade" id="modal_pay" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
      <div class="modal-dialog modal-lg">
        <form class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              ຊຳລະເງິນ
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            
            <div class="row">
                            <div class="col-md-6">
                                <div class=" d-flex justify-content-between">
                                    <span>ລວມຍອດເງິນ:</span>
                                    <span>{{ FormatPrice(SumTotal) }} ກີບ</span>
                                </div>
                                <div class=" d-flex justify-content-between text-danger" v-if="(CashAmount-SumTotal)>0">
                                    <span>ເງິນທອນ:</span>
                                    <span>{{ FormatPrice(CashAmount-SumTotal) }} ກີບ</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <label>ຮັບເງິນນຳລູກຄ້າ</label>
                                <cleave :options="options" v-model="CashAmount" class=" form-control text-end" />
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <!-- <button type="button" class=" btn btn-primary w-100" @click="AddNum(500)" >500</button> -->
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-danger w-100"  @click="CashAmount = SumTotal">{{FormatPrice(SumTotal)}}</button>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-primary w-100" @click="AddNum(500)" >500</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-primary w-100"  @click="AddNum(1000)">1,000</button>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-primary w-100"  @click="AddNum(2000)" >2,000</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-primary w-100"  @click="AddNum(5000)">5,000</button>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-primary w-100"  @click="AddNum(10000)">10,000</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-primary w-100"  @click="AddNum(20000)" >20,000</button>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-primary w-100"  @click="AddNum(50000)">50,000</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class=" btn btn-primary w-100"  @click="AddNum(100000)" >100,000</button>
                                    </div>
                                </div>
                            </div>
                  </div>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">ປິດ</button>
            <button type="button" class="btn btn-primary" :disabled="(CashAmount < SumTotal)" @click="ConfirmPay()" >ບັນທຶກ</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /modal -->

</template>
<script>
import { useAuthStore } from '@/Store/auth';
import axios from 'axios';
import Cleave from 'vue-cleave-component';

export default {
   setup() {
    const authStore = useAuthStore();
    return { authStore };
  },
  data() {
    return {
     customer_name:'',
     customer_tel:'',
      url: window.location.origin,
      CategoryList: [],
      SelectCategory: 'all',
      Search: '',
      ProductList: [],
      ListOrder:[],
      options: {
                  numeral: true,
                  numeralPositiveOnly: true,
                  noImmediatePrefix: true,
                  rawValueTrimPrefix: true,
                  numeralIntegerScale: 10,
                  numeralDecimalScale: 2,
                  numeralDecimalMark: '.',
                  delimiter: ','
                },
    CashAmount:0,
    }
    },
    components: {
        Cleave
    },
    computed:{
        SumTotal(){
            return this.ListOrder.reduce((acc, item) => acc + (item.price * item.qty), 0);
        }
    },
    methods: {
        AddNum(num){

            // let price = 0;
            // if(this.CashAmount){
            //     price = this.CashAmount
            // }

            this.CashAmount = parseInt(this.CashAmount?this.CashAmount:0) + parseInt(num) // 0012 = 12
        },
        Pay(){
            this.CashAmount = 0;
            $("#modal_pay").modal("show");
        },
        ConfirmPay(){
            axios.post('/api/transection/add', {
                customer_name: this.customer_name,
                customer_tel: this.customer_tel,
                order_items: this.ListOrder
            }, {
                headers: {
                    Authorization: "Bearer " + this.authStore.getToken
                }
            }).then(res => {

                // console.log(res.data);
                if (res.data.success) {

                    $('#modal_pay').modal('hide');
                    this.ListOrder = [];
                    this.CashAmount = 0;
                    this.customer_name = '';
                    this.customer_tel = '';
                    // ອັບເດດລສຍການ ຂໍ້ມູນ.
                    this.getProducts();
                }

            }).catch(error => {
                console.log(error);
            });
        },
        AddOrder(id){

            let item = this.ProductList.find(i => i.id === id);
            let Old_item = this.ListOrder.find(i => i.id === id);

            // check old item
            if(Old_item){
                Old_item.qty++;
                return;
            }

            // add to listorder
            this.ListOrder.push({
                id: item.id,
                image: item.ImagePath,
                name: item.ProductName,
                price: item.PriceSell,
                qty: 1
            });
        },
        RemoveOrder(id){

            let item = this.ListOrder.find(i => i.id === id);
            if(item){
                if(item.qty>1){
                    item.qty--;
                }else{
                    this.ListOrder = this.ListOrder.filter(i => i.id !== id);
                }
            }

        },
        DelOrder(id){
            this.ListOrder = this.ListOrder.filter(i => i.id !== id);
        },
        FormatPrice(value) {
             let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
    getProducts(page=1) {
      axios.get("/api/product/index?page=" + page + "&category_id=" + this.SelectCategory + "&per_page=all&sort=desc&search=" + this.Search,{
        headers: {
          Authorization: "Bearer " + this.authStore.getToken
        }
      }).then((res) => {
        this.ProductList = res.data;
      });
    },
    }, 
    created() {
        this.getProducts();
        this.getCategories();
    }
}
</script>
<style scoped>
    .num-box{
            position: absolute;
    background-color: red;
    color: white;
    right: 2px;
    top: 2px;
    padding: 5px;
    border-radius: 0px 4px 0px 4px;
    }
    .box-img-pos{
        height: 120px;
    width: auto;
    object-fit: cover;
    object-position: center;
    border-bottom: 1px solid #dbd2d2;
    padding: 2px;
    }
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