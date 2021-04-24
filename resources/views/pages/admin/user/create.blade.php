@extends('layouts.admin')

@section('title', 'Create Users')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Users</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Nama User</label>
                        <input type="text" name="name" id="name" class="form-control" />
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email User</label>
                        <input type="email" name="email" id="email" class="form-control" />
                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="password">Password User</label>
                        <input type="password" name="password" id="password" class="form-control" />
                        @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <select name="roles" id="roles" class="form-control">
                            <option value="ADMIN">ADMIN</option>
                            <option value="USER">USER</option>
                        </select>
                        @error('roles')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary">Tambah User</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
