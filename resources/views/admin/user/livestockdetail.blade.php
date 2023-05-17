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
    <h3 class="card-title">Livestock Enterprises Detail</h3>
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
          <th>#</th>
          <th>Livestock Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Source</th>
          <th>Date</th>
        </tr>
        
        @if(count($details) > 0)      
          
          @foreach($details as $k => $detail)
            <tr>
              <td> {{ $k+1 }} </td>
              <td>{{$detail->name}}</td>
              <td>{{$detail->quantity}}</td>
              <td>{{$detail->price}}</td>
              <td>{{$detail->source}}</td>
              <td>{{ date('j F Y', strtotime($detail->created_at)) }}</td>
          </tr>
          <?php $k++;?>
          @endforeach
        @else
            
            <tr>
              <td>No data found</td>
            </tr>
        @endif
        
        
      </tbody>
    </table>
</div>            
</div>

@endsection