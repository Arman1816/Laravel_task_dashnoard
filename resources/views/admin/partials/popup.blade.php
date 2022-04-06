<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ $header }}</h4>
            </div>
            <div class="modal-body">
                <p>{{ $body }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@section('script')
<script>
    $(window).on('load', function () {
        $('#myModal').modal('show');
    });
</script>
@endsection

{{--coll example--}}
{{--@if(isset($header) && isset($body))--}}
{{--@include('partials.popup',['header'=>$header,'body'=>$body])--}}
{{--@endif--}}