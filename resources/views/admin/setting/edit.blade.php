@extends('admin.layouts.default')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Edit setting</h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i><a href="{{ route('admin.setting.index') }}">All Settings</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <section class="content">
            <div id="required_error"></div>
            {!! Form::open(['route' => ['admin.setting.update',$setting->id], 'method' => 'put', 'enctype'=>"multipart/form-data",]) !!}
            <div class="tab-content">

                <div class="form-group {{ $errors->has('app_name') ? ' has-error' : '' }}">
                    {!! Form::label('app_name','App Name:') !!}
                    {!! Form::text('app_name', $setting->app_name, ['class'=>'form-control', 'placeholder'=>'App Name' ]) !!}

                    @if ($errors->has('app_name'))
                        <span class="help-block"><strong>{{ $errors->first('app_name') }}</strong></span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('consumer_key') ? ' has-error' : '' }}">
                    {!! Form::label('consumer_key', 'Consumer Key:') !!}
                    {!! Form::text('consumer_key', $setting->consumer_key, ['class'=>'form-control', 'placeholder'=>'Consumer Key' ]) !!}
                    @if ($errors->has('consumer_key'))
                        <span class="help-block"><strong>{{ $errors->first('consumer_key') }}</strong></span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('consumer_secret') ? ' has-error' : '' }}">
                    {!! Form::label('consumer_secret', 'Consumer Secret:') !!}
                    {!! Form::text('consumer_secret', $setting->consumer_secret, ['class'=>'form-control', 'placeholder'=>'Consumer Secret' ]) !!}
                    @if ($errors->has('consumer_secret'))
                        <span class="help-block"><strong>{{ $errors->first('consumer_secret') }}</strong></span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('active') ? ' has-error' : '' }}">
                    {!! Form::label('active', 'Active:') !!}
                    {!! Form::select('active',[1 => 'Active' , 0 => 'InActive'],$setting->active,['class'=>'form-control']); !!}
                    @if ($errors->has('active'))
                        <span class="help-block"><strong>{{ $errors->first('active') }}</strong></span>
                    @endif
                </div>
            </div>


            <div class="form-group" style="text-align:right">
                {{Form::submit('Edit', ['class' => 'btn btn-success large'])}}
            </div>

            {!! Form::close() !!}

        </section>
    </div>
@endsection

@section('script')

    <script src="{{ asset('bower_components/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea.editor',
            plugins: 'code print preview  searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker  help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        });
    </script>
@endsection
