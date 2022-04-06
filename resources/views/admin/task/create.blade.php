@extends('admin.layouts.default')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Create task</h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i><a href="{{ route('admin.task.index') }}">All task</a> </li>
                <li class="active">Create</li>
            </ol>
        </section>

        <section class="content">


            <div id="required_error"></div>
            {!! Form::open(['route' => 'admin.task.store','enctype'=>"multipart/form-data",'id'=>'form_lang_tab']) !!}
            <div class="tab-content">

                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title','Title:') !!}
                    {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Title']) !!}

                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="tab-content">
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description','Description:') !!}
                    {!! Form::text('description', old('description'), ['class'=>'form-control', 'placeholder'=>'Description']) !!}

                    @if ($errors->has('description'))
                        <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                {{Form::submit('Create', ['class' => 'btn btn-success large'])}}
            </div>

            {!! Form::close() !!}

        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('bower_components/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('js/submit.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea.editor',
            plugins: 'code print preview  searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker  help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        });
    </script>
@endsection
