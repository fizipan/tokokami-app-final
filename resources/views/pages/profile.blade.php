@extends('layouts.app')

@section('title', 'Biodata Diri')

@section('content')
<div class="page-content page-profile">
    <div class="heading-profile">
        <div class="profile-thumb">
            <img src="/images/profile-img.jpg" class="profile-img" alt="" />
            <div class="edit-wrapper" onclick="thisFileUpload()">
                <img src="/images/ic_camera.svg" class="icon-edit" alt="" />
                <input type="file" class="d-none" id="photo" name="photo" />
            </div>
        </div>
        <h5>Angular Mayasashi</h5>
        <p class="text-muted">angularmy@gmail.com</p>
    </div>
    <div class="form-profile">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" name="username" id="username" value="Angular Mayasashi"
                            class="form-control" />
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="angularmy26@gmail.com"
                            class="form-control" />
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="phone_number">No Telepon</label>
                        <input type="tel" name="phone_number" id="phone_number" value="098987654314"
                            class="form-control" />
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="postal_code">Kode Pos</label>
                        <input type="number" name="postal_code" id="postal_code" value="11750" class="form-control" />
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="provinces_id">Provinsi</label>
                        <select name="provinces_id" class="form-control" id="provinces_id">
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawab Tengah">Jawab Tengah</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="regencies_id">Kota</label>
                        <select name="regencies_id" class="form-control" id="regencies_id">
                            <option value="Jakarta Barat">Jakarta Barat</option>
                            <option value="Garut">Garut</option>
                            <option value="Purbolinggo">Purbolinggo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" class="form-control"
                            rows="5">Jln H sanusi Gang Hamzah No 21</textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-10 offset-1 text-right">
                    <button type="submit" class="btn btn-success px-4 py-2">Ubah Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('end-script')
<script>
    function thisFileUpload() {
        document.getElementById('photo').click();
    }

</script>
@endpush
