
@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    Update user
                </div>
                <div class="card-body">
                    @if(isset($user))
                    <!-- update User Form -->
                    <form action="{{ url('/update_user') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <!-- User Name -->
                        <div class="mb-3">
                            <label for="user-name" class="form-label">Name</label>
                            <input type="text" value="{{ $user->name }}" name="name" id="user-name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="user-email" class="form-label">Email</label>
                            <input type="email" value="{{ $user->email }}" name="email" id="user-name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="user-pass" class="form-label">Password</label>
                            <input type="password" value="{{ $user->password }}" name="password" id="user-name" class="form-control">
                        </div>
                        <!-- Add user Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Update User
                            </button>
                        </div>
                    </form>
                    @else
                    <!-- New user Form -->
                    <form action="create_user" method="POST">
                        @csrf
                        <!-- user Name -->
                        <div class="mb-3">
                            <label for="user-name" class="form-label">User name</label>
                            <input type="text" name="name" id="user-name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="user-email" class="form-label">User email</label>
                            <input type="text" name="email" id="user-name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="user-password" class="form-label">User password</label>
                            <input type="text" name="password" id="user-name" class="form-control">
                        </div>
                        <!-- Add user Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add user
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>

            <!-- Current users -->
            <div class="card mt-4">
                <div class="card-header">
                    Current users
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>email</th>
                                <th>Password</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td>
                                    <form action="delete_user/{{ $user->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="edit_user/{{ $user->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-info me-2"></i>Edit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
