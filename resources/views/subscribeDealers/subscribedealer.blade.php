
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
@if(Session::has('flash_message'))
<div class="alert alert-success">
    {{ Session::get('flash_message') }}
</div>
@endif
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

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
          <div class="table-responsive p-1">
            <table class="table align-items-left table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>Vendeur          </th>
                  <th>Date Vente      </th>
                  <th>Date Lancement  </th>
                  <th>DealerId        </th>
                  <th>new price       </th>
                  <th>old price       </th>
                  <th>Nouveau client      </th>
                  <th>Upgrade package </th>
                  <th>Bénéfice </th>

                </tr>
              </thead>

              <tbody>
            @foreach ($dealers as $item)


                <tr>
                    <td>{{$item->seller_person_id }} </td>
                    <td>{{$item->dateVente }}        </td>
                    <td>{{$item->dateLancement }}    </td>
                    <td>{{$item->dealerId }}         </td>
                    <td>{{$item->newPrice}}          </td>
                    <td>{{$item->oldPrice }}         </td>
                    <td>{{$item->newClient }}        </td>
                    <td>{{$item->upgradePackage }}   </td>
                    <td>{{$item->benifit }}          </td>

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
         <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un nouveau client</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

       <form    class="from-group" method="POST" action="{{route('subscribedealer.store')}}" >
           @csrf
           <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Vendeur </label>
            <div class="col-sm-9">
              <select class="select2-single-placeholder form-control" name="seller_person_id" id="sellerpersonId">
                  <option value="">Select</option>
                      @foreach ($sellers as $seller)
                          <option value="{{$seller->id}}">{{$seller->firstName}}  {{$seller->firstName}}</option>
                      @endforeach
                </select>
            </div>
          </div>

           <div class="form-group row">
            <label for="dateVente" class="col-sm-3 col-form-label">DateVente</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="dateVente" placeholder="dateVente" value="" name="dateVente">
            </div>
          </div>

          <div class="form-group row">
            <label for="dateLancement" class="col-sm-3 col-form-label">date de Lancement</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="dateLancement" placeholder="dateLancement" value="" name="dateLancement">
            </div>
          </div>

          <div class="form-group row">
            <label for="DealerId" class="col-sm-3 col-form-label">DealerId</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="DealerId" placeholder="DealerId" name="dealerId">
            </div>
          </div>



            <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-3 pt-0">Upselle Ad360</legend>
                  <div class="col-sm-9">
                    <div class="form-check">
                      <input type="checkbox"     class="form-check-input"  name="upsellerAd360" id="upsellerAd360"  value="upsellerAd360" >
                      <br>
                    </div>
                    <div class="displayoldnew1">
                       <div>
                           <label for=""> new price</label>
                          <input type="text"   class="form-input"  name='newPrice' value="">
                       </div>
                       <div>
                        <label for=""> old price</label>
                            <input type="text"   class="form-input"  name='oldPrice' value="">
                       </div>
                      </div>


                  </div>
                </div>
              </fieldset>

              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-3 pt-0">Nouveau client</legend>
                  <div class="col-sm-9">

                      <input type="radio"     class="form-input"  name="newClient" id="newClient"  value="99" >
                      <label for=""> 99$</label>
                      <input type="radio"     class="form-input"  name="newClient" id="newClient"  value="199" >
                      <label for="">199$</label>
                      <input type="radio"     class="form-input"  name="newClient" id="newClient"  value="299" >
                      <label for="">299$</label>
                      <br>


                  </div>
                </div>
              </fieldset>

              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-3 pt-0">Upgrade</legend>
                  <div class="col-sm-9">
                    <div class="form-check">
                      <input type="checkbox"  class="form-check-input"  name="upgrade" id="upgrade"  value="upgrade" >
                      <br>
                    </div>
                    <div>

                       <div>
                        <select class="select2-single-placeholder form-control" name="upgradePackage" id="upgradePackage">
                                    <option value="0" > Select  upgrade </option>
                                    <option value="100">99$  -> 199$</option>
                                    <option value="200">99$  -> 299$</option>
                                    <option value="100">199$ -> 299$</option>
                          </select>
                       </div>
                      </div>


                  </div>
                </div>
              </fieldset>


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
      placeholder: "Select a  upgrade",
      allowClear: true
    });




  });
</script>

<script>
    displayoldnew(){
        document.getElementById(".displayoldnew1").style.display = "block";
    }
</script>
  @endsection



