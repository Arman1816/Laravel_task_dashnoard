@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="card col-md-3 m-lg-2" style="width: 18rem">
                        <div class="card-body">
                            <h5 class="card-title">{{$task->title}}</h5>
                            <p class="card-text">{{$task->description}}</p>
                            <a href="#" class="btn btn-primary">Start Task</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection