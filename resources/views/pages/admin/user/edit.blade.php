@extends('layouts.admin')

@section('title', 'Edit Users')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nama User</label>
                    <input type="text" name="name" id="name" class="form-control" value="Midun Van Dejok" />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="email">Email User</label>
                    <input type="email" name="email" id="email" class="form-control" value="midun@gmail.com" />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="password">Password User</label>
                    <input type="password" name="password" id="password" class="form-control" />
                    <span class="text-danger">Kosongkan jika tidak ingin ganti password</span>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="roles_id">Roles</label>
                    <select name="roles_id" id="roles_id" class="form-control">
                        <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-right">
                <button class="btn btn-primary">Edit User</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('end-script')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

</script>
@endpush
