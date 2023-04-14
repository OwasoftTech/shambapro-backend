@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.user.actions.index'))

@section('body')

<div class="container">
    <h1>Enterprises</h1>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Livestock Type</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($enterprise) && $enterprise->count())
                @foreach($enterprise as $key => $value)
                    <tr>
                        <td><a href="@if($value->enterprise_type == 'Crop')
                                    {{ url('admin/users/crop/detail/'.$value->id) }}
                                    @else
                                    {{ url('admin/users/enterprise/detail/'.$value->id) }}
                                    @endif
                            " style="color: green;">{{ $value->enterprise_name }}</a></td>
                        <td>
                            {{ $value->enterprise_type }}
                        </td>
                        <td>
                            {{ $value->livestock_type }}
                        </td>
                        <td>
                            {{ date('j F Y', strtotime($value->created_at))}}
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
         
    {!! $enterprise->links() !!}
</div>





<!-- <div class="container">
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
         
    {!! $heard->links() !!}
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
                <th>Photo</th>
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
                        <td><img src="{{url($value->photo)}}" height="50px"> </td>
                        <td>{{ $value->date_of_purchase }}</td>


                        
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
         
    {!! $animals->links() !!}
</div> -->


@endsection