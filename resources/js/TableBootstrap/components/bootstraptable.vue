<template>
  <div class="">
      <table class="w-100 table table-bordered table-striped">
          <thead>
              <tr>
                <th colspan="8" class="pb-3">
                    <div class="table-header row">
                      <div class="col-md-6 row">
                          <div class="col-md-6 position-relative">
                              <input type="text" placeholder="Enter Text" class="form-control">
                              <div class="position-absolute top-0 right-0 h-100 w-25 d-flex justify-content-center align-items-center ">
                                  <i class="fa-solid fa-xmark"></i>
                              </div>
                          </div>
                          <div class="col-md-6 text-start">
                              <button class="btn btn-secondary me-2">
                                Reflesh
                              </button>
                              <button class="btn btn-secondary">
                                Reset Query 
                              </button>
                          </div>
                      </div>
                      <div class="col-md-6 text-end">
                          <button class="btn btn-secondary">DownLoad</button>
                      </div>
                  </div>
                </th>
              </tr>
              <tr>
                 <th>
                    <div class="d-flex justify-content-center align-items-center">
                      <input class="form-check-input" type="checkbox"  >
                    </div>
                 </th>
                 <th class="text-center">
                     id
                     <div class="float-right">
                        !!
                      </div>
                 </th>
                 <th class="text-center">
                    <div>Name</div>
                 </th>
                 <th class="text-center">
                    <div>First Name</div>
                 </th>
                 <th class="text-center">
                    <div>Last Name</div>
                 </th>
                 <th class="text-center">
                    <div>Email</div>
                 </th>
                 <th class="text-center">
                    <div>City</div>
                 </th>
                 <th class="text-center">
                    <div>Cuntry</div>
                 </th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                  <div class="d-flex justify-content-center align-items-center">
                      <input class="form-check-input" type="checkbox"  >
                  </div>
              </td>
              <td>1</td>
              <td>John</td>
              <td>Edem</td>
              <td>john_edem@gmail.com</td>
              <td>Yangon</td>
              <td>Myanmar</td>
              <td>Something</td>
            </tr>
            <tr>
              <td>
                  <div class="d-flex justify-content-center align-items-center">
                      <input class="form-check-input" type="checkbox"  >
                  </div>
              </td>
              <td>1</td>
              <td>John</td>
              <td>Edem</td>
              <td>john_edem@gmail.com</td>
              <td>Yangon</td>
              <td>Myanmar</td>
              <td>Something</td>
            </tr>
          </tbody>
      </table>
  </div>

</template>
<script>
  export default {
    name : "bootstrapTable" ,
    data : function () {
      return {
        name : "bootstrapTable" ,
      }
    },
  }
    
</script>

<style>
  .right-0 {
    right: 0px;
  }
  .table-bordered thead tr th {
    padding: 0.75rem;
  }
</style>