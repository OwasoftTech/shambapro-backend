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

<div class="container">
    <h1>Heards </h1>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                

            </tr>
        </thead>
        <tbody>
            @if(!empty($heard) && $heard->count())
            
                @foreach($heard as $key => $value)
                    <tr>
                        <td>{{ $value->heard_name }}</td>
                        <td>
                            {{ $value->heard_description }}
                        </td>
                        
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
         
    
</div>



<div class="container">
    <h1>Animals </h1>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Bread</th>
                <th>Animal Sex</th>
                <th>Color</th>
                
                <th>Date of Purchase</th>


                

            </tr>
        </thead>
        <tbody>
            @if(!empty($animals) && $animals->count())
                @foreach($animals as $key => $value)
                    <tr>
                        <td>{{ $value->animal_name }}</td>
                        <td>
                            {{ $value->bread_type }}
                        </td>
                        <td>{{ $value->animal_sex }}</td>
                        <td>{{ $value->animal_color }}</td>
                        
                        <td>{{ date('j F Y', strtotime($value->date_of_purchase)) }}</td>


                        
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
         
    
</div>

<div class="container">
    <h1>Flocks </h1>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Bread</th>
                <th>No of Birds</th>
                <th>Source of Birds</th>
                <th>Hachting Date</th>


                

            </tr>
        </thead>
        <tbody>
            @if(!empty($flocks) && $flocks->count())
                @foreach($flocks as $key => $value)
                    <tr>
                        <td>{{ $value->flock_name }}</td>
                        <td>
                            {{ $value->bread }}
                        </td>
                        <td>{{ $value->number_of_birds }}</td>
                        <td>{{ $value->source_of_birds }}</td>
                        
                        <td>{{ date('j F Y', strtotime($value->hachting_date)) }}</td>


                        
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
         
    
</div>

@endsection