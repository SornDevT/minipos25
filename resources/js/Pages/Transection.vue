<template lang="">
    <div class="card">
    <h5 class="card-header">ການເຄື່ອນໄຫວ ທຸລະກຳ</h5>
    <div class="card-body">
        <div class="row">
                    <div class="col-md-6 d-flex mb-2">
                        <div class="me-2 cursor-pointer">
                            <i class='bx bx-sort-up fs-4' v-if="Sort === 'asc'" @click="Sort = 'desc'; getTransection()" ></i>
                            <i class='bx bx-sort-down fs-4' v-else @click="Sort = 'asc'; getTransection()" ></i>
                        </div>
                        <select class="form-select w-auto me-2" v-model="PerPage" @change="getTransection()">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>

                

                    </div>
                    <div class="col-md-6 mb-2 d-flex justify-content-end"> 
                      <div class="btn-group me-2" role="group" >
                        <button type="button" class="btn btn-secondary" @click="month_type = 'm'"> <i class='bx bx-chevron-right' v-if="month_type == 'm'"></i> ເດືອນ</button>
                        <button type="button" class="btn btn-secondary" @click="month_type = 'y'"> <i class='bx bx-chevron-right' v-if="month_type == 'y'"></i> ປີ</button>
                    </div>

                    <input type="date" v-model="dmy" class="form-control w-auto" >
                    </div>
                </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ວັນທີ</th>
              <th>ເລກທີ</th>
              <th>ປະເພດທຸລະກຳ</th>
              <th>ລາຍລະອຽດ</th>
              <th>ມູນຄ່າ</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in TransectionData.data" :key="item.id">
              <td>{{ date(item.created_at) }}</td>
              <td>{{ item.TranID }}</td>
              <td>{{ item.TranType }}</td>
              <td>{{ item.Detail }}</td>
              <td class="text-end">{{ FormatPrice(item.Price) }} ກີບ</td>
            </tr>
            <tr v-if="TransectionData.data.length <= 0">
              <td colspan="5" class="text-center">ບໍ່ມີຂໍ້ມູນ</td>
            </tr>
          </tbody>
        </table>
        <Pagination :pagination="TransectionData" :offset="4" @paginate="getTransection($event)" />
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import { useAuthStore } from '@/Store/auth';
import dayjs from 'dayjs';

export default {
    setup() {
        const authStore = useAuthStore();
        return { authStore };
    },
    data() {
        return {
            Sort: 'desc',
            PerPage: 10,
            dmy:new Date().toISOString().split('T')[0],
            month_type: 'm',
            TransectionData:{
                date:[]
            }
        }
    },
    components: {
      dayjs
    },
    methods: {
        date(item) {
            return dayjs(item).format('DD/MM/YYYY');
        },
        FormatPrice(value) {
             let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        getTransection(page=1){

            axios.get('/api/transection/index?page='+page+'&sort='+this.Sort+'&per_page='+this.PerPage+'&dmy='+this.dmy+'&month_type='+this.month_type,{
                headers: {
                    'Authorization': 'Bearer ' + this.authStore.token
                }
            }).then((res) => {
                this.TransectionData = res.data;
                // console.log(this.TransectionData);
            }).catch((err) => {
                console.log(err);
            });
        }
    },
    created(){
        this.getTransection();
    },
    watch:{
        dmy(){
            this.getTransection();
        },
        month_type(){
            this.getTransection();
        }
    }
}
</script>
<style lang="">
    
</style>