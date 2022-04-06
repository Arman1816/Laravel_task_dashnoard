@if (session('message'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <i class="icon fa fa-info"></i>
            {{--Alert!--}}
        </h4>
        {!! session('message')  !!}
    </div>
@endif
@if (session('message_success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <i class="icon fa fa-check"></i>
            {{--Alert!--}}
        </h4>
        {!! session('message_success')  !!}
    </div>
@endif
@if (session('message_info'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <i class="icon fa fa-info"></i>
            {{--Alert!--}}
        </h4>
        {!! session('message_info')  !!}
    </div>
@endif
@if (session('message_warning'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <i class="icon fa fa-warning"></i>
            {{--Alert!--}}
        </h4>
        {!! session('message_warning')  !!}
    </div>
@endif
@if (session('message_danger'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <i class="icon fa fa-ban"></i>
            {{--Alert!--}}
        </h4>
        {!! session('message_danger')  !!}
    </div>
@endif

@if(count($errors))

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <i class="icon fa fa-ban"></i>
            {{--Alert!--}}
        </h4>
        <ul>
            @foreach($errors as $$error)
                <li>{!! session('message_danger')  !!}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('popup_header') && session('popup_body'))
    @include('partials.popup',['header'=>session('popup_header'),'body'=>session('popup_body')])
@endif