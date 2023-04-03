@extends('brackets/admin-ui::admin.layout.default')

<title>Dashboard</title> 

<!-- App css -->
   <!--  <link href="https://shambapro.lynked.com.ng/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://shambapro.lynked.com.ng/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="https://shambapro.lynked.com.ng/assets/css/app.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

@section('body')

                   


                    

<div class="card">

<div class="card-header">
    <h3 class="card-title">Crop Enterprises</h3>
</div>
<div class="card-body"> 
    <table id="example4" class="table table-bordered table-striped">
      <thead>
      </thead>
      <tbody>
        <tr>
          <th style="text-align: center;">Enterprise Name</th>
          <td style="color: green;text-align: center;">{{$cropenterprise->enterprise_name}}</td>
        </tr>
        
        <tr>
          <th style="text-align: center;">Enterprise Type</th>
          <td style="color: green;text-align: center;">{{$cropenterprise->enterprise_type}}</td>
        </tr>
        
        
      </tbody>
    </table>
</div>            
</div>

<div class="card">

<div class="card-header">
    <h3 class="card-title">Crop Enterprises Detail</h3>
</div>
<div class="card-body"> 
    <table id="example4" class="table table-bordered table-striped">
      <thead>
        <!-- <tr>
          <th scope="col">#</th>
          <th scope="col">Total</th>
        </tr> -->
      </thead>
      <tbody>
        <tr>
          <th style="text-align: center;">Cropping System</th>
          <th style="text-align: center;">Cultivation System</th>
          <th style="text-align: center;">Watering Type</th>
          <th style="text-align: center;">Type</th>
          <th style="text-align: center;">Trees/Plants</th>
          <th style="text-align: center;">Field Size</th>
        </tr>
        
        
          @foreach($details as $detail)
            <tr>
              <td style="text-align: center;">{{$detail->croping_system}}</td>
              <td style="text-align: center;">{{$detail->cultivation_system}}</td>
              <td style="text-align: center;">{{$detail->watering_system}}</td>
              <td style="text-align: center;">{{$detail->plants_type}}</td>
              <td style="text-align: center;">{{$detail->no_of_plants}}</td>
              <td style="text-align: center;">{{$detail->field_size}}</td>
          </tr>
          @endforeach
       
        
        
      </tbody>
    </table>
</div>            
</div>

@endsection