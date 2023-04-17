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
<div class="row">

                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="float-left" dir="ltr">
                                    <img src="https://cdn-icons-png.flaticon.com/512/187/187039.png" height="50px">
                                </div>
                                <div class="text-right">
                                    <h3 class="mb-1"> {{$users}} </h3>
                                    <p class="text-muted mb-1">Farms</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="float-left" dir="ltr">
                                    <img src="https://cdn-icons-png.flaticon.com/512/284/284493.png" height="50px">
                                </div>
                                <div class="text-right">
                                    <h3 class="mb-1"> {{$enterprise}} </h3>
                                    <p class="text-muted mb-1">Farms Entreprises</p>
                                </div>
                            </div>
                        </div>
                      

                         <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="float-left" dir="ltr">
                                   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROuriCYajzCJzMk5BP1EvMgSwX3egQDzb0qL75QAzIhq_QUi7qnVVVafaIwIZTEb_dY38&usqp=CAU" height="50px">
                                </div>
                                <div class="text-right">
                                    <h3 class="mb-1"> {{$cropenterprise}} </h3>
                                    <p class="text-muted mb-1">Crop Entreprises</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="float-left" dir="ltr">
                                   <img src="https://cdn3.iconfinder.com/data/icons/agriculture-outline/160/farm-2-512.png" height="50px">
                                </div>
                                <div class="text-right">
                                    <h3 class="mb-1"> {{$cropfield}} </h3>
                                    <p class="text-muted mb-1">Cropfield</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="float-left" dir="ltr">
                                   <img src="https://icon-library.com/images/icon-agriculture/icon-agriculture-15.jpg" height="50px">
                                </div>
                                <div class="text-right">
                                    <h3 class="mb-1"> {{$livestockenterprise}} </h3>
                                    <p class="text-muted mb-1">Livestock Enterprises</p>
                                </div>
                            </div>
                        </div>
                       

                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="float-left" dir="ltr">
                                    <img src="https://www.freeiconspng.com/thumbs/animal-icon-png/animal-icons-set-png-4.png" height="50px">
                                </div>
                                <div class="text-right">
                                    <h3 class="mb-1"> {{$animals}} </h3>
                                    <p class="text-muted mb-1"> Animals</p>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Farm Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Role</th>
                  </tr>
                  </thead>
                <tbody>
                    @foreach($data as $user)
                  <tr>
                    
                        <td><a style="color: green;" href="{{ url('admin/users/'.$user->id.'/details') }}">{{$user->id}} </a></td>
                        <td><a style="color: green;" href="{{ url('admin/users/'.$user->id.'/details') }}">{{$user->name}} </a> </td>
                        <td><a style="color: green;" href="{{ url('admin/users/'.$user->id.'/details') }}">{{$user->farm_name}} </a></td>
                        <td><a style="color: green;" href="{{ url('admin/users/'.$user->id.'/details') }}">{{$user->email}} </a> </td>
                        <td><a style="color: green;" href="{{ url('admin/users/'.$user->id.'/details') }}">{{$user->phone_number}} </a></td>
                        <td><a style="color: green;" href="{{ url('admin/users/'.$user->id.'/details') }}">{{$user->role}}</a> </td>
                  
                  </tr>
                    @endforeach
                </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
        </div> 

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Users By Type</h3>
      </div>
                       
    <div class="card-body">  
    <table id="example3" class="table table-bordered table-striped">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <th>Users</th>
        <td>{{$users}}</td>
        </tr>
        <tr>
        <th>Farm Owners</th>
        <td>{{$farm_owners}}</td>
        </tr>
        <tr>
        <th>Farm Managers </th>
        <td>{{$farm_managers}}</td>
        </tr>
        <tr>
        <th>Farm Workers </th>
        <td>{{$farm_workers}}</td>
        </tr>
        <tr>
        <th>Farm Experts </th>
        <td>{{$farm_experts}}</td>
        </tr>
        <tr>
        <th>Store Managers </th>
        <td>{{$store_managers}}</td>
        </tr>
        <tr>
        <th>Farm Observers </th>
        <td>{{$farm_observers}}</td>
        </tr>
        </tbody>
    </table>
    </div>

</div>                    

<div class="card">

<div class="card-header">
    <h3 class="card-title">Crop Enterprises</h3>
</div>
<div class="card-body"> 
    <table id="example4" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>Crop Enterprises</th>
          <td>{{$cropenterprise}}</td>
        </tr>
        
        <tr>
          <th>Number of Plants</th>
          <td>{{$totalplants}}</td>
        </tr>
        <tr>
          <th>Number of Trees</th>
          <td>{{$totaltrees}}</td>
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
    <tr>
    <th scope="col">#</th>
    <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th>Livestock Enterprises</th>
    <td>{{$livestockenterprise}}</td>
    </tr>
    <tr>
    <th>Number of Herds</th>
    <td>{{$heards}}</td>
    </tr>
    <tr>
    <th>Number of Animals </th>
    <td>{{$animals}}</td>
    </tr>
    <tr>
    <th>Number of Flocks </th>
    <td>{{$flocks}}</td>
    </tr>
    </tbody>
    </table>
</div>
</div>    

           
    
                      




@endsection