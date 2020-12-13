
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
  <!-- Container Fluid-->
  @if(Session::has('flash_message'))
  <div class="alert alert-success">
    {{ Session::get('flash_message') }}
  </div>
@endif

  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
              id="#modalCenter">+</button>
              <h1 class="h3 mb-0 text-gray-800"> Pays   </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page"> Transporteur </li>
      </ol>
    </div>

    <!-- Row -->
    <div class="row">
      <!-- Datatables -->
      <div class="col-lg-12">
        <div class="card mb-4">


          <div class="table-responsive p-3">
            <table class="table align-items-left table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>country</th>
                </tr>
              </thead>

              <tbody>


                    @foreach ($countries as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
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
    <div class="row">
      <div class="col-lg-12">

      </div>
    </div>

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
         <h5 class="modal-title " id="exampleModalCenterTitle" >Ajouter un nouveau pays</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

       <form   class="from-group" method="POST" action='{{route('country.store')}}'>

           @csrf


              <div class="form-group row">
                <label for="country" class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="country" placeholder="country" name="country" value="{{old('country')}}">
                </div>
              </div>


       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Save</button>
       </div>
    </form>
     </div>
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




