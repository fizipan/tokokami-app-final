@extends('layouts.auth')

@section('title', 'Daftar Untuk Belanja Kebutuhan Rumahmu')

@section('content')
<div class="form-content">
    <div class="form-heading">
        <h2>Siap Untuk Belanja ?</h2>
        <p class="text-muted">SUdah Punya Akun ? <a href="{{ route('login') }}" class="link-auth">Masuk</a></p>
    </div>
    <form action="{{ route('register') }}" method="POST" id="register">
        @csrf
        <div class="form-input">
            <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="username" class="form-control @error('name') is-invalid @enderror" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" @change="checkAvailable()" :class="{'is-invalid' : this.email_unavailable}" v-model="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" id="email" required autocomplete="email" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" id="password-confirm" type="password" class="form-control"
                name="password_confirmation" required autocomplete="new-password"/>
            </div>
            <button type="submit" :disabled="this.email_unavailable" class="btn btn-primary btn-block py-2">Daftar Akun</button>
            <hr />
            <a href="{{ route('socialite-redirect') }}" class="btn btn-info btn-block py-2">
                <img src="/images/logo_google.svg" class="mr-2" alt="" />
                Masuk / Daftar
            </a>
        </div>
    </form>
</div>
@endsection

@push('end-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        Vue.use(Toasted);
        let vue = new Vue({
            el: '#register',
            data() {
                return {
                    email: '',
                    email_unavailable: false,
                }
            },
            methods: {
                checkAvailable() {
                    let self = this;
                    axios.get('{{ route('api-check-user') }}', {
                        params: {
                            email: this.email,
                        }
                    })
                    .then(function (response) {
                        if (response.data == 'unavailable') {
                            self.$toasted.error(
                                "Oops!, Email tersebut sudah ada di sistem Kami!", {
                                    position: 'top-center',
                                    className: "rounded",
                                    duration: 5000,
                                }
                            );
                            self.email_unavailable = true;

                        } else {
                            self.$toasted.show(
                                "Email tersebut tersedia silahkan lanjutkan pendaftaran!", {
                                    position: 'top-center',
                                    className: "rounded",
                                    duration: 5000,
                                }
                            );
                            self.email_unavailable = false;
                        }
                    });
                }
            }
        });
    </script>
@endpush
