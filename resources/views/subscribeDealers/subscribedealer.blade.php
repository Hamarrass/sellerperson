

@extends('layouts_1.app')
@section('css')
<link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Bootstrap DatePicker -->
<link href="vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
<!-- Bootstrap Touchspin -->
<link href="vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" >
<!-- ClockPicker -->
<link href="vendor/clock-picker/clockpicker.css" rel="stylesheet">
<!-- RuangAdmin CSS -->
<link href="css/ruang-admin.min.css" rel="stylesheet">

@endsection


@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
              id="#modalCenter">+</button>
              <h1 class="h3 mb-0 text-gray-800">Client   </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Client</li>
      </ol>
    </div>

    <!-- Row -->
    <div class="row">
      <!-- Datatables -->
      <div class="col-lg-12">
        <div class="card mb-4">
         <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">SellerPerson</h6>
          </div>-->

          <div class="table-responsive p-3">
            <table class="table align-items-left table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>DealerId</th>
                  <th>Category</th>
                  <th>Seller Person</th>
                  <th>Package</th>
                  <th>Budget</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
            @foreach ($dealers as $dealer)
             <tr>
                <td>{{$dealer->dealerId}}</td>
                <td>{{$dealer->category}}</td>
                <td>{{$dealer->seller_person_id}}</td>
                <td>{{$dealer->package}}</td>
                <td>{{$dealer->budget}}</td>
                <td></td>
              </tr>
             @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- DataTable with Hover -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <!--<h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>-->
          </div>
          <div class="table-responsive p-3">

          </div>
        </div>
      </div>
    </div>
    <!--Row-->

    <!-- Documentation Link -->
    <!-- <div class="row">
      <div class="col-lg-12">
        <p>DataTables is a third party plugin that is used to generate the demo table below. For more information
          about DataTables, please visit the official <a href="https://datatables.net/" target="_blank">DataTables
            documentation.</a></p>
      </div>
    </div>
     -->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to logout?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="login.html" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!---Container Fluid-->

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

   <!-- Add a seller -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
   aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Add Seller Person</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

       <form action="{{route('subscribedealer.store')}}" method="POST">
           @csrf
            <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-3 pt-0">category</legend>
                  <div class="col-sm-9">
                    <div class="form-check">
                      <input type="radio"   class="form-check-input"  name='category' value="uppseller" id="category1" >
                      <label class="form-check-label" for="category1">
                        New seller
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="category" id="category2" value="newaccount">
                      <label class="form-check-label" for="category2">
                        UppSeller
                      </label>
                    </div>

                  </div>
                </div>
              </fieldset>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Seller </label>
              <div class="col-sm-9">
                <select class="select2-single-placeholder form-control" name="seller_person_id" id="sellerpersonId">
                    <option value="">Select</option>
                        @foreach ($sellers as $seller)
                            <option value="{{$seller->id}}">{{$seller->firstName}}  {{$seller->firstName}}</option>
                        @endforeach
                  </select>
              </div>
            </div>

            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-3 pt-0">Packages</legend>
                <div class="col-sm-9">
                  <div class="form-check">
                    <input type="radio"   class="form-check-input"  name='package' value="99">
                    <label class="form-check-label" for="package1">
                      99$
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="package"  value="199">
                    <label class="form-check-label" for="package2">
                      199$
                    </label>
                  </div>
                  <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="package" value="299" >
                    <label class="form-check-label" for="package3">
                      299$
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>

            <div class="form-group row">
                <label for="budget" class="col-sm-3 col-form-label">Add 360 budget</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="budget" placeholder="add 360 budget" value="" name="budget">
                </div>
              </div>
              <div class="form-group row">
                <label for="DealerId" class="col-sm-3 col-form-label">DealerId</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="DealerId" placeholder="DealerId" name="dealerId">
                </div>
              </div>

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Save</button>
       </div>
     </div>
    </form>
   </div>
 </div>

  @endsection

  <!-- Page level custom scripts -->
  @section('js')
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

<!--  select with search -->


  <!-- Select2 -->
  <script src="vendor/select2/dist/js/select2.min.js"></script>
  <!-- Bootstrap Datepicker -->
  <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap Touchspin -->
  <script src="vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
  <!-- ClockPicker -->
  <script src="vendor/clock-picker/clockpicker.js"></script>
  <!-- RuangAdmin Javascript -->
  <script src="js/ruang-admin.min.js"></script>
<script>
$(document).ready(function () {


    $('.select2-single').select2();

    // Select2 Single  with Placeholder
    $('.select2-single-placeholder').select2({
      placeholder: "Select a sellerPerson",
      allowClear: true
    });




  });
</script>
  @endsection



