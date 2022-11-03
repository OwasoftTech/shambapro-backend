@extends('brackets/admin-ui::admin.layout.default')

<title>Dashboard</title> 

<!-- App css -->
    <link href="https://shambapro.lynked.com.ng/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://shambapro.lynked.com.ng/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="https://shambapro.lynked.com.ng/assets/css/app.min.css" rel="stylesheet" type="text/css" />

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
                        <!-- end col -->

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
                        <!-- end col -->

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

                       <user-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/users') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                          <i class="fa fa-align-justify"></i> {{ trans('admin.user.actions.index') }}
                       <!--  <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/users/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.user.actions.create') }}</a>   -->
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.user.columns.id') }}</th>
                                        <th is='sortable' :column="'name'">{{ trans('admin.user.columns.name') }}</th>
                                        <th is='sortable' :column="'farm_name'">{{ trans('admin.user.columns.farm_name') }}</th>
                                        <th is='sortable' :column="'email'">{{ trans('admin.user.columns.email') }}</th>
                                        <th is='sortable' :column="'phone_number'">{{ trans('admin.user.columns.phone_number') }}</th>
                                        <th is='sortable' :column="'role'">{{ trans('admin.user.columns.role') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="8">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/users')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/users/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.name }}</td>
                                        <td>@{{ item.farm_name }}</td>
                                        <td>@{{ item.email }}</td>
                                        <td>@{{ item.phone_number }}</td>
                                        <td>@{{ item.role }}</td>
                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm  btn-info" :href="item.resource_url + '/details'" title="details" role="button"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="col-auto">
                                                    <a class="btn btn-sm   btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/users/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.user.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </user-listing>


@endsection