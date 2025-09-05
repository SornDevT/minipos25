<template lang="">
    <div class="row">
        <div class="col-md-8">
             <div class="card">
                    <h5 class="card-header">ລາຍງານ</h5>
                    <div class="card-body">
                        <div class="row">
                                    <div class="col-md-6 d-flex mb-2">

                                    </div>
                                    <div class="col-md-6 mb-2 d-flex justify-content-end"> 
                                    <div class="btn-group me-2" role="group" >
                                        <button type="button" class="btn btn-secondary" @click="month_type = 'm'"> <i class='bx bx-chevron-right' v-if="month_type == 'm'"></i> ເດືອນ</button>
                                        <button type="button" class="btn btn-secondary" @click="month_type = 'y'"> <i class='bx bx-chevron-right' v-if="month_type == 'y'"></i> ປີ</button>
                                    </div>

                                    <input type="date" v-model="dmy" class="form-control w-auto" >
                                    </div>
                                </div>
                                <LineChart :chartData="chData" :options="choption"  />
                                <!-- <DoughnutChart :chartData="testData" /> -->
                               
                    </div>
                </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                    <div class="card-body">
                        <div class=" d-flex justify-content-between">
                            <span> <i class='bx bx-download fs-4'></i> <br> ລາຍຮັບ </span>
                            <span> {{ FormatPrice(sum_income) }} ກີບ </span>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class=" d-flex justify-content-between">
                            <span> <i class='bx bx-trending-down fs-4'></i> <br> ລາຍຈ່າຍ </span>
                            <span> {{  FormatPrice(sum_expense)  }} ກີບ </span>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class=" d-flex justify-content-between">
                            <span> <i class='bx bxs-objects-vertical-bottom fs-4'></i> <br> ກຳໄລ </span>
                            <span> {{ FormatPrice(sum_income-sum_expense) }} ກີບ </span>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { useAuthStore } from '@/Store/auth';
import dayjs from 'dayjs';

import { DoughnutChart, LineChart } from 'vue-chart-3';

import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

export default {
    setup() {
        const authStore = useAuthStore();
        return { authStore };
      },
    data() {
        return {
            sum_income: 0,
            sum_expense: 0,
            month_type: 'm',
            dmy: new Date().toISOString().split('T')[0],
            // testData: {
            //     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            //     datasets: [
            //       {
            //         backgroundColor: [ '#41B883', '#E46651', '#00D8FF', '#DD1B16', '#FF6384', '#36A2EB', '#FFCE56' ],
            //         data: [40, 39, 10, 40, 39, 80, 40]
            //       }
            //     ]
            // },
            choption:{
                plugins:{
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                            return (
                                Number(tooltipItem.raw) .toFixed(0) .replace(/./g, function (c, i, a) { return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c; }) + " ກີບ" );
                            },
                        },
                        mode: "index",
                        intersect: false,
                        },
              },
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y:{
                            ticks: {
                                display: true,
                                beginAtZero: false,
                                callback: function (value, index, values) {
                                return ( Number(value) .toFixed(0) .replace(/./g, function (c, i, a) { return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c; }) + " ກີບ" );
                                },
                            },
                            gridLines: {
                                show: true,
                            },
                            },
                    },
                    
            },
            chData:{},
        }
    },
    components: {
        DoughnutChart,
        LineChart
    },
    methods: {
        FormatPrice(value) {
             let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        getReport(){
            axios.get(`/api/report?dmy=${this.dmy}&month_type=${this.month_type}`,{
                headers: {
                    'Authorization': 'Bearer ' + this.authStore.token
                },
            }).then((response) => {

                 this.chData = {
                        labels: response.data.labels,
                        datasets:[
                            {
                                label: "ລາຍຮັບ",
                                fill: false,
                                borderColor: "#3fc3ee",
                                data: response.data.income,
                                backgroundColor: "#9BD0F5"
                            },
                            {
                                label: "ລາຍຈ່າຍ",
                                fill: false,
                                borderColor: "#f1556c",
                                data: response.data.expense,
                                backgroundColor: "#FFB1C1"
                            }
                        ]

                    };

                    this.sum_income = response.data.sum_income;
                    this.sum_expense = response.data.sum_expense;

            }).catch((err) => {
                console.log(err);
                if( err.response && err.response.status === 401) {
                this.authStore.Logout();
                this.$router.push({ name: 'Login' });
                }
            });
        }
    },
    created(){
        this.getReport();
    },
    watch:{
        dmy(){
            this.getReport();
        },
        month_type(){
            this.getReport();
        }
    }
}
</script>
<style lang="">
    
</style>