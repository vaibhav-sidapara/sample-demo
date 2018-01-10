<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit User: {{ $user->name }}</h4>
        </div>
        <br />

        <form data-parsley-validate class="form-horizontal ajaxForm" method="POST" action="{{ route('user.edit', $user->id) }}" >
            <div class="modal-body">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="form-group">
                    <label for="name" class="control-label text-right col-md-4 col-sm-4 col-xs-12">Name <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control col-md-7 col-xs-12" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label text-right col-md-4 col-sm-4 col-xs-12">Email <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control col-md-7 col-xs-12" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="role" class="control-label text-right col-md-4 col-sm-4 col-xs-12">Role <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" title="Select Role" name="role" id="role">
                            <option value="">Select Role</option>
                            <option value="Admin" @if($user->role == 'Admin') selected="selected" @endif>Admin</option>
                            <option value="Staff" @if($user->role == 'Staff') selected="selected" @endif>Staff</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Update User</button>
            </div>
        </form>
    </div>
</div>
