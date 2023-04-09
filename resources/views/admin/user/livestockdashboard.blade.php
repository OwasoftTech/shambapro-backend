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
        <h3 class="card-title">Livestock Enterprises</h3>
    </div>
                        
    <div class="card-body"> 
    <table id="example5" class="table table-bordered table-striped">
    <thead>
    <!-- <tr>
    <th scope="col">#</th>
    <th scope="col">Total</th>
    </tr> -->
    </thead>
    <tbody>
    <tr>
        <th style="text-align: center;">Livestock Enterprises</th>
        <th style="text-align: center;">Number of Herds</th>
        <th style="text-align: center;">Number of Animals </th>
        <th style="text-align: center;">Number of Flocks </th>
    </tr>
    <tr>
        <td style="color: green;text-align: center;">{{$livestockenterprise}}</td>
        <td style="color: green;text-align: center;">{{$heards}}</td>
        <td style="color: green;text-align: center;">{{$animals}}</td>
        <td style="color: green;text-align: center;">{{$flocks}}</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>    

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Livestock Enterprises Details</h3>
    </div>
                        
    <div class="card-body"> 
    <table id="example5" class="table table-bordered table-striped">
    <thead>
    <!-- <tr>
    <th scope="col">#</th>
    <th scope="col">Total</th>
    </tr> -->
    </thead>
    <tbody>
    <tr>
        <th style="text-align: center;">Name</th>
        <th style="text-align: center;">Livestock Type</th>
        <th style="text-align: center;">Created Date </th>
    </tr>
    @foreach($details as $detail)
    <tr>
        <td style="color: green;text-align: center;">{{$detail->enterprise_name}}</td>
        <td style="color: green;text-align: center;">{{$detail->livestock_type}}</td>
        <td style="color: green;text-align: center;">{{ date('j F Y', strtotime($detail->created_at)) }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
</div>           
    
                      




@endsection