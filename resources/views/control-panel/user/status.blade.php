<div class="modal-dialog modal-sm">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Change Status For User: {{ $user->name }}</h4>
        </div>
        <br />

        <form data-parsley-validate class="form-horizontal ajaxForm" method="POST" action="{{ route('user.edit.status', $user->id) }}" >
            <div class="modal-body">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="active" value="{{ $user->active }}">

                <p>Are you sure you want to change the status ?</p>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark" autofocus>Change Status</button>
            </div>
        </form>
    </div>
</div>
