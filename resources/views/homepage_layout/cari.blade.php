@extends('homepage')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-12">
            <div class="title m-b-md">
                <img class="cari_image" src="{{ url('/') }}/logo/logo_kostin.png">
            </div>
            <div class="search">
                <div class="card">
                    <form method="GET" action="{{ route('cari_kost_utama') }}">
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nama Kost" aria-label="Masukan nama kost" aria-describedby="basic-addon2" name="name">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row nama_kategori">
                                    <div class="col-12">
                                        <div class="nama_kategori"><b>Lokasi dekat</b></div>    
                                    </div>  
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

                                <div class="row nama_kategori">
                                    <div class="col-12">
                                        <div class="nama_kategori"><b>Fasilitas</b></div>    
                                    </div>  
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
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="nama_kategori">
                                                    Harga
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="nama_kategori">
                                                    <input style="width: 100%" type="range" class="custom-range" value="0" id="slider-harga" min="50000" max="6500000" name="harga">    
                                                </div>        
                                            </div>
                                            <div class="col-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Harga" id="nilai_harga" aria-label="Harga" aria-describedby="basic-addon2" name="nilai_harga">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="nama_kategori">Sistem pembayaraan</div>
                                            </div>
                                            <div class="col-5">
                                                <select class="custom-select" required autocomplete="sk" name="sk" autofocus>
                                                    <option selected value="">Pilih sistem kontrak</option>
                                                    <option value="1">Tahunan</option>
                                                    <option value="2">Enam bulan</option>
                                                    <option value="3">Tiga bulan</option>
                                                    <option value="4">Satu bulan</option>
                                                </select>      
                                            </div>
                                            
                                        </div>
                                    </div>                                     
                                </div>                                              
                            </div>                                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            
        </div>      
    </div>
</div>
@endsection

@section('content-cari')
@if ($status == 1)
    <div style="background-color:#2f318b;margin-top: 2%; padding: 2%">
        <div class="container">
            <div class="row">            
                @foreach ($data as $element)
                    <div class="col-xs-1 col-md-3 col-xl-4">
                        <div class="card" style="margin-top: 10px">
                            <img src="{{ url($element->foto_kosts_id) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $element->name }}</h5>
                                <p class="card-text">{{ $element->alamat }}</p>
                            </div>
                            <ul class="list-group list-group-flush"> 
                                <li class="list-group-item">Jumlah kamar : {{ $element->total_kamar }}</li>
                                <li class="list-group-item" style="font-weight: bold;">Sisa Kamar : {{ $element->total_kamar - $element->kamar_terisi }}</li>
                                <li class="list-group-item" style="font-weight: bold;">Harga : {{ $element->harga_prefix }}</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection