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
        <th style="text-align: left;">Livestock Enterprises</th>
        <th style="text-align: left;">Number of Herds</th>
        <th style="text-align: left;">Number of Animals </th>
        <th style="text-align: left;">Number of Flocks </th>
    </tr>
    <tr>
        <td style="color: green;text-align: left;">{{$livestockenterprise}}</td>
        <td style="color: green;text-align: left;">{{$heards}}</td>
        <td style="color: green;text-align: left;">{{$animals}}</td>
        <td style="color: green;text-align: left;">{{$flocks}}</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>    

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
        <th style="text-align: left;">#</th>
        <th style="text-align: left;">Name</th>
        <th style="text-align: left;">Livestock Type</th>
        <th style="text-align: left;">Fram Name</th>
        <th style="text-align: left;">Created Date </th>
    </tr>
    @foreach($details as $k => $detail)
    <tr>
        <td style="color: green;text-align: left;"> {{ $k+1 }} </td>
        <td style="color: green;text-align: left;"><a href="{{ url('admin/users/livestock/detail/'.$detail->id) }}" style="color: green;">{{$detail->enterprise_name}}</a></td>
        <td style="color: green;text-align: left;"><a href="{{ url('admin/users/livestock/detail/'.$detail->id) }}" style="color: green;">{{$detail->livestock_type}}</a></td>
        <td style="color: green;text-align: left;"><a href="{{ url('admin/users/livestock/detail/'.$detail->id) }}" style="color: green;">{{$detail->farm_name}}</a></td>
        <td style="color: green;text-align: left;">{{ date('j F Y', strtotime($detail->created_at)) }}</td>
    </tr>
    <?php $k++;?>
    @endforeach
    </tbody>
    </table>
    </div>
</div>           
    
                      




@endsection