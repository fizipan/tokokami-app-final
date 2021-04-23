@extends('layouts.admin')

@section('title', 'All Users')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Users</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="dashboard-users-create.html" class="btn btn-success">+ Tambah User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mujahidin Wahid</td>
                        <td>muja@gmail.com</td>
                        <td>USER</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-users-edit.html">
                                        <i class="fas fa-edit text-secondary mr-2"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-trash-alt text-secondary mr-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Midun Van Dejok</td>
                        <td>midun@gmail.com</td>
                        <td>USER</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-users-edit.html">
                                        <i class="fas fa-edit text-secondary mr-2"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-trash-alt text-secondary mr-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Marcus Paleojavanicus</td>
                        <td>marcus@gmail.com</td>
                        <td>USER</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-users-edit.html">
                                        <i class="fas fa-edit text-secondary mr-2"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-trash-alt text-secondary mr-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
