@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6" style="margin: auto">
            <div class="#">
                <div>
                    <img style="width:100%" src="{{ url('/') }}/logo/logo_kostin.png">
                </div>
                <div style="margin-top: 20px">
                    <p>
                        Dengan menggunakan KOST-IN mengiklankan sebuah kost dapat dengan mudah. seorang penilik kost tidak memerlukan tenaga ekstra untuk mengiklankan sebuah. 
                        Menggunakan sentuhan tangan iklan telah tersedia dan tersebar.
                    </p>   
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('No HP') }}</label>
                            <div class="col-md-8">
                                <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" required autocomplete="nohp" autofocus>
                                @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-8">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="4" name="alamat" value="{{ old('alamat') }}" autofocus required ></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fotoktp" class="col-md-4 col-form-label text-md-right">{{ __('Foto KTP') }}</label>
                            <div class="col-md-8">
                                <input id="fotoktp" type="file" class="form-control @error('fotoktp') is-invalid @enderror" name="fotoktp" required autocomplete="fotoktp" autofocus>
                                @error('fotoktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fototerbaru" class="col-md-4 col-form-label text-md-right">{{ __('Foto Terbaru') }}</label>
                            <div class="col-md-8">
                                <input id="fototerbaru" type="file" class="form-control @error('fototerbaru') is-invalid @enderror" name="fototerbaru" required autocomplete="fototerbaru" autofocus>
                                @error('fototerbaru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
