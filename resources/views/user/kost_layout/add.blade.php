@extends('layouts.app_bootstrap')

@section('content')
<style type="text/css" media="screen">
    .input-group{
      display: none;
    } 
</style>
<!-- Begin Page Content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"><b><a style="color:#858796" href="{{ route('list_kost') }}">{{ __('Kost') }}</a></b> \ {{ __('Tambah') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('simpan_tambah_kost') }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama kost') }}</label>
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
                            <label for="tk" class="col-md-4 col-form-label text-md-right">{{ __('Total kamar') }}</label>
                            <div class="col-md-8">
                                <input id="tk" type="number" class="form-control @error('tk') is-invalid @enderror" name="tk" value="{{ old('tk') }}" required autocomplete="tk" autofocus>
                                @error('tk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kt" class="col-md-4 col-form-label text-md-right">{{ __('Kamar terisi') }}</label>
                            <div class="col-md-8">
                                <input id="kt" type="number" class="form-control @error('kt') is-invalid @enderror" name="kt" value="{{ old('kt') }}" required autocomplete="kt" autofocus>
                                @error('kt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>
                            <div class="col-md-8">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Fasilitas') }}</label>
                            <div class="col-md-8">
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="tt" name="tt">
                                        <label class="custom-control-label" for="tt">Tempat tidur</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="mb" name="mb">
                                        <label class="custom-control-label" for="mb">Meja belajar</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="lp" name="lp">
                                        <label class="custom-control-label" for="lp">Lemari pakaian</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="kamarmd" name="kamarmd">
                                        <label class="custom-control-label" for="kamarmd">Kamar mandi dalam</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="kamarml" name="kamarml">
                                        <label class="custom-control-label" for="kamarml">Kamar mandi luar</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="dapur" name="dapur">
                                        <label class="custom-control-label" for="dapur">Dapur</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rt" name="rt">
                                        <label class="custom-control-label" for="rt">Ruang tamu</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Lokasi dekat') }}</label>
                            <div class="col-md-8">
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="kampus" name="kampus">
                                        <label class="custom-control-label" for="kampus">Kampus</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="jalanraya" name="jalanraya">
                                        <label class="custom-control-label" for="jalanraya">Jalan raya</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="tempatibadah" name="tempatibadah">
                                        <label class="custom-control-label" for="tempatibadah">Tempat peribadahan</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="temandaerah" name="temandaerah">
                                        <label class="custom-control-label" for="temandaerah">Teman Sedaerah</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rumahmakan" name="rumahmakan">
                                        <label class="custom-control-label" for="rumahmakan">Rumah makan</label>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="tempathiburan" name="tempathiburan">
                                        <label class="custom-control-label" for="tempathiburan">Tempat hiburan</label>
                                    </div>
                                </div>  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sk" class="col-md-4 col-form-label text-md-right">{{ __('Sistem Kontrak') }}</label>
                            <div class="col-md-8">
                                <select class="custom-select @error('sk') is-invalid @enderror" required autocomplete="sk" name="sk" autofocus>
                                    <option selected value="">Pilih sistem kontrak</option>
                                    <option value="1">Tahunan</option>
                                    <option value="2">Enam bulan</option>
                                    <option value="3">Tiga bulan</option>
                                    <option value="4">Satu bulan</option>
                                </select> 
                                @error('sk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fotokost" class="col-md-4 col-form-label text-md-right">{{ __('Foto Kost') }}</label>
                            <div class="col-md-8">
                                <input id="fotokost" style="height: 100%" type="file" class="form-control bg-light border-0 @error('fotokost') is-invalid @enderror" name="fotokost" required autocomplete="fotokost" autofocus>
                                @error('fotokost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-8">
                                <textarea class="form-control @error('name') is-invalid @enderror" id="alamat" rows="4" name="alamat" value="{{ old('alamat') }}" autofocus required ></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection