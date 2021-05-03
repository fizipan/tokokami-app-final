@extends('layouts.app')

@section('title', 'Biodata Diri')

@section('content')
<div class="page-content page-profile">
    <div class="heading-profile">
        <div class="profile-thumb">
            @isset($user->photo)
            <img src="{{ Storage::url($user->photo) }}" class="profile-img rounded-circle" alt="" />
            @else
            <img src="/images/pic_default.svg" class="profile-img rounded-circle" alt="" />
            @endisset
            <div class="edit-wrapper" onclick="thisFileUpload()">
                <img src="/images/ic_camera.svg" class="icon-edit" alt="" />
                <form action="{{ route('profile-upload', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="file" class="d-none" onchange="form.submit()" id="photo" name="photo" />
                </form>
            </div>
        </div>
        <h5>{{ $user->name }}</h5>
        <p class="text-muted">{{ $user->email }}</p>
    </div>
    <div class="form-profile">
        <form action="{{ route('profile-update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name') ?? $user->name }}"
                                class="form-control" />
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" readonly name="email" id="email" value="{{ old('email') ?? $user->email }}"
                                class="form-control" />
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="phone_number">No Telepon</label>
                            <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') ?? $user->phone_number }}"
                                class="form-control" />
                            @error('phone_number')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="postal_code">Kode Pos</label>
                            <input type="number" name="postal_code" id="postal_code" value="{{ old('postal_code') ?? $user->postal_code }}" class="form-control" />
                            @error('postal_code')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="provinces_id">Provinsi</label>
                            <select name="provinces_id" class="form-control" id="provinces_id">
                                @foreach ($provinces as $item)
                                    <option {{ $item->id == $user->provinces_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('provinves_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="regencies_id">Kota</label>
                            <select name="regencies_id" class="form-control" id="regencies_id">
                                <option value="{{ $user->regencies_id }}">{{ $user->regency->name }}</option>
                            </select>
                            @error('regencies_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" class="form-control"
                                rows="5">{{ old('address') ?? $user->address }}</textarea>
                            @error('address')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-10 offset-1 text-right">
                        <button type="submit" class="btn btn-success px-4 py-2">Ubah Profile</button>
                    </div>
                </div>
            </div>
        </form> 
    </div>
</div>
@endsection

@push('end-script')
<script>
    function thisFileUpload() {
        document.getElementById('photo').click();
    }

</script>
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted);

    @if(session()->has('success'))
    Vue.toasted.success(
        "{{ session()->get('success') }}", {
            position: 'top-center',
            className: "rounded",
            duration: 5000,
        }
    );
    @endif
    @error('photo')
    Vue.toasted.error(
        "{{ $message }}", {
            position: 'top-center',
            className: "rounded",
            duration: 5000,
        }
    );
    @enderror

</script>
<script>
    $(function() {
        $('select[id="provinces_id"]').change(function () { 
            let value = $(this).val();
            let currentRegency = {{ $user->regencies_id }};
            if (value) {
                $.ajax({
                    type: "get",
                    url: "/api/regency/" + value,
                    dataType: "json",
                    success: function (response) {
                        let html = '';
    
                        $.each(response, function (index, value) { 
                            $('select[id="regencies_id"]').empty();
                            html += `<option value="${value.city_id}">${value.name}</option>`
                             $('select[id="regencies_id"]').append(html);
                        });
                    }
                });
            } else {
                $('select[id="regencies_id"]').empty();
            }
        });
    });
</script>
@endpush
