<a data-toggle="modal" data-target="#deleteModal{!! $id !!}" class="btn btn-danger"
   data-placement="top"
   data-original-title="Delete row"
><i class="fa fa-trash-o"></i>
Delete</a>
<div class="modal fade" id="deleteModal{!! $id !!}" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left" id="simpleModalLabel">Delete</h4>

            </div>
            <div class="modal-body">
                <h3>Do you want to delete?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <form style="display: inline-table" method="post"
                      action="{{ route("$route.destroy",$id) }}">
                    {!! csrf_field() !!}
                    {!! method_field("DELETE") !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
