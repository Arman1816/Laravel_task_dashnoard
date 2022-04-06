@extends('admin.layouts.default')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Settings
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i>All Settings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <a class="btn btn-primary margin"
               href="{{route('admin.setting.create')}}"
            >Create</a>

            <!-- /.box-header -->
            <div class="box-body">
                <div id="user_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            @if(count($settings))
                                <table id="user" class="table table-bordered table-striped dataTable" role="grid"
                                   aria-describedby="user_info">
                                <thead>
                                <tr role="row">
                                    <th class="th-del">Id</th>
                                    <th class="th-del">App Name</th>
                                    <th class="th-del" >Consumer Key</th>
                                    <th class="th-del" >Consumer Secret</th>
                                    <th class="th-del" >Active</th>
                                    <th class="th-del">Action</th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                    @foreach($settings as $setting)
                                        <tr data-id="{{ $setting->id}}" role="row" class="odd">
                                            <td class="ui-state-default">{{$setting->id}}</td>
                                            <td class="ui-state-default">{{$setting->app_name}}</td>
                                            <td class="ui-state-default">{{$setting->consumer_key}}</td>
                                            <td class="ui-state-default">{{$setting->consumer_secret}}</td>
                                            <td class="ui-state-default">{{$setting->active}}</td>
                                            <td class="ui-state-default">
                                                <div class="btn-group">
                                                    <a class="btn btn-info"
                                                       href="{{ route('admin.setting.edit', $setting->id)}}"
                                                    ><i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>Edit</a>
                                                    @include("admin.partials.delete-modal",['id'=>$setting->id,'route'=>'admin.setting'])
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Id</th>
                                    <th rowspan="1" colspan="1">App Name</th>
                                    <th rowspan="1" colspan="1">Consumer Key</th>
                                    <th rowspan="1" colspan="1">Consumer Secret</th>
                                    <th rowspan="1" colspan="1">Active</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                                </tfoot>
                            </table>

                            @else
                                <div id="user" class="text-center" role="grid"
                                     aria-describedby="user_info"><h2>Setting Not found</h2> </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box-body -->
        </div>

    </section>
    <!-- /.content -->
@endsection




