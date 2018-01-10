<div class="modal-dialog modal-sm">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Delete User: {{ $user->name }}</h4>
        </div>
        <br />

        <form data-parsley-validate class="form-horizontal ajaxForm" method="POST" action="{{ route('user.delete', $user->id) }}" >
            <div class="modal-body">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $user->id }}">

                <p>Are you sure you want to delete the {{ $user->name }} user ?</p>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" autofocus>Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>
