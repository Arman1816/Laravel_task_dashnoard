@extends('admin.layouts.default')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Tasks
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i>All Tasks</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <a class="btn btn-primary margin"
               href="{{route('admin.task.create')}}"
            >Create</a>

            <!-- /.box-header -->
            <div class="box-body">
                <div id="user_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            @if(count($tasks))
                                <table id="user" class="table table-bordered table-striped dataTable" role="grid"
                                   aria-describedby="user_info">
                                <thead>
                                <tr role="row">
                                    <th class="th-del">Id</th>
                                    <th class="th-del">Title</th>
                                    <th class="th-del" >Description</th>
                                    <th class="th-del">Number of required images</th>
                                    <th class="th-del">Action</th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                    @foreach($tasks as $task)
                                        <tr data-id="{{ $task->id}}" role="row" class="odd">
                                            <td class="ui-state-default">{{$task->id}}</td>
                                            <td class="ui-state-default">{{$task->title}}</td>
                                            <td class="ui-state-default">{{$task->description}}</td>
                                            <td class="ui-state-default">{{$task->required_images}}</td>
                                            <td class="ui-state-default">
                                                <div class="btn-group">
                                                    <a class="btn btn-info"
                                                       href="{{ route('admin.task.edit', $task->id)}}"
                                                    ><i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>Edit</a>
                                                    @include("admin.partials.delete-modal",['id'=>$task->id,'route'=>'admin.task'])
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Id</th>
                                    <th rowspan="1" colspan="1">Title</th>
                                    <th rowspan="1" colspan="1">Description</th>
                                    <th rowspan="1" colspan="1">Number of required images</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                                </tfoot>
                            </table>

                            @else
                                <div id="user" class="text-center" role="grid"
                                     aria-describedby="user_info"><h2>Task Not found</h2> </div>
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




