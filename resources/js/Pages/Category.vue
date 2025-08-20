<template lang="">
    <div class="row">
        <div class="col-md-6">

     
    <div class="card">
   
    <div class="card-header d-flex justify-content-between align-items-center"> 
         <h5 class="mb-0" >ໝວດໝູ່ສິນຄ້າ</h5>
            <button type="button" @click="AddCategory()" class="btn rounded-pill btn-icon btn-primary">
                  <span class="icon-base bx bx-plus icon-md"></span>
                </button>
    </div>
 
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ຊື່ໝວດໝູ່ສິນຄ້າ</th>
              <th class=" text-center">ຈັດການ</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in CategoryList" :key="index">
                <td>{{ item.CategoryName }}</td>
                <td class="text-center">
                    <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);" @click="EditCategory(item.id)"><i class="icon-base bx bx-edit-alt me-1"></i> ແກ້ໄຂ</a>
                  <a class="dropdown-item" href="javascript:void(0);" @click="DelCategory(item.id)"><i class="icon-base bx bx-trash me-1"></i> ລຶບ</a>
                </div>
              </div>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

     </div>
    </div>


    <div class="modal modal-top fade" id="modal_category" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog">
                    <form class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTopTitle">
                            
                           <span v-if="FromType"> ເພີ່ມໝວດໝູ່ສິນຄ້າ </span> 
                           <span v-else > ແກ້ໄຂໝວດໝູ່ສິນຄ້າ </span>
                            </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col mb-0">
                            <label for="nameSlideTop" class="form-label">ຊື່ໝວດໝູ່ສິນຄ້າ:</label>
                            <input type="text" v-model="CategoryName" id="nameSlideTop" class="form-control" placeholder=".....">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">ປິດ</button>
                        <button type="button" class="btn btn-primary" @click="SaveCategory()" :disabled="!CategoryName" >ບັນທຶກ</button>
                      </div>
                    </form>
                  </div>
                </div>

</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            CategoryList: [],
            CategoryName:'',
            FromType:true,
            EditID:'',
        }
    },
    methods:{
        AddCategory(){

            $('#modal_category').modal('show');
            this.CategoryName = '';
            this.FromType = true;
        },
        EditCategory(id){
            this.EditID = id;
            this.FromType = false;

            axios.get('/api/category/edit/' + id).then(response=>{

                    this.CategoryName = response.data.CategoryName;
                    $('#modal_category').modal('show');
           
            }).catch(error=>{
                console.log(error);
            })
        },
        SaveCategory(){

            if(this.FromType){

                // add new data
                axios.post('/api/category/add', {
                    CategoryName: this.CategoryName,
                }).then(response=>{

                    console.log(response.data);
                    if(response.data.success){

                        $('#modal_category').modal('hide');
                        this.CategoryName = '';
                        // ອັບເດດລສຍການ ຂໍ້ມູນ.
                        this.getCategory();

                    } else {

                    }

                }).catch(error=>{
                    console.log(error);
                })

            } else {
                // update data
                axios.post('/api/category/update/' + this.EditID, {
                    CategoryName: this.CategoryName,
                }).then(response=>{

                    console.log(response.data);
                    if(response.data.success){

                        $('#modal_category').modal('hide');
                        this.CategoryName = '';
                        // ອັບເດດລສຍການ ຂໍ້ມູນ.
                        this.getCategory();

                    } else {

                    }

                }).catch(error=>{
                    console.log(error);
                })

            }
        },
        DelCategory(id){

            axios.delete('/api/category/delete/' + id).then(response=>{

                console.log(response.data);
                if(response.data.success){

                    // ອັບເດດລສຍການ ຂໍ້ມູນ.
                    this.getCategory();

                } else {

                }

            }).catch(error=>{
                console.log(error);
            })

        },
        getCategory(){
            axios.get('/api/category/index').then(response=>{
                console.log(response.data);
                this.CategoryList = response.data;
            }).catch(error=>{
                console.log(error);
            })
        }
    },
    created(){
        this.getCategory();
    }
}
</script>
<style lang="">
    
</style>