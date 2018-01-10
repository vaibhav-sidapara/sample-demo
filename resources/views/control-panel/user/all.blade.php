@extends('control-panel.layouts.layout')

@section('main-container')

    <div class="col-md-12">
        <div class="content-panel">
            <h4>
                <i class="fa fa-angle-right"></i> Users
            </h4>

            <hr>
            <div class="col-md-10">
                <table id="data-table" class="table table-striped table-advance table-hover display dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th><i class=" fa fa-edit"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users  as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if(!! $user->active)
                                <span class="label label-success label-mini">Active</span>
                            @else
                                <span class="label label-danger label-mini">Inactive</span>
                            @endif
                        </td>
                        <td>
                            @if(!! $user->active)
                                <button class="btn btn-dark btn-xs modalEvent" data-url="{{ route('user.edit.status', $user->id) }}" title="Inactivate"><i class="fa fa-check"></i></button>
                            @else
                                <button class="btn btn-success btn-xs modalEvent" data-url="{{ route('user.edit.status', $user->id) }}" title="Activate"><i class="fa fa-check"></i></button>
                            @endif
                            <button class="btn btn-primary btn-xs modalEvent" data-url="{{ route('user.edit', $user->id) }}" title="Edit"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs modalEvent" data-url="{{ route('user.delete', $user->id) }}" title="Delete"><i class="fa fa-trash-o "></i></button>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <section class="panel">
                    <div class="x_title">
                        <h4>User</h4>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                        <button type="button" data-url="{{ route('user.create') }}" class="btn btn-primary btn-sm modalEvent"><i class="fa fa-plus"></i> Add New User</button>
                    </div>
                </section>
            </div>

            <div class="clearfix"></div>
        </div>

    </div>

@endsection