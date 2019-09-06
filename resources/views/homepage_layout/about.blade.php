@extends('homepage')
@section('content')
<div class="container" style="margin-top: 5%;margin-bottom: 5%">
    <div class="row justify-content-md-center">
        <div class="col-6"  style="margin: auto">
            <div class="title m-b-md">
                <img class="about_image" src="{{ url('/') }}/logo/logo_kostin.png">
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        KOST-IN menyajikan beragam informasi kamar kost area Semarang, lengkap dengan fasilitas kost, harga kost, dan juga dekorasi kamar beserta foto desain kamar kos yang kami sesuaikan dengan kondisi sebenarnya. Setiap kamar kost yang ada di KOST-IN benar-benar kami survey, kami verifikasi, kami seleksi dan kami ambil data secara langsung termasuk kost yang didaftarkan oleh si pemilik kost dan umum. Informasi ketersediaan kamar kost kami update setiap seminggu sekali untuk memastikan info kost secara akurat dan bermanfaat yang sedang mencari kost. Saat ini data kamar kost yang kami miliki sudah mencakup area kampus UNNES dan pengembangan data kamar kost akan terus  kami usahakan. Jika kamu ingin mendapatkan inspirasi desain kamar kost sesuai kebutuhanmu langsung bisa cek di KOST-IN.
                    </p>
                </div>
            </div>
        </div>      
    </div>
</div>
@endsection

@section('content-cari')
<div class="content-hasil">
    <div class="container">
        <div class="row content">
            <div class="col">
                <div class="card">
                    <img class="card-img-top fitur-image" src="{{ url('/') }}/logo/info.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Berbagai informasi akurat yang bisa di dapatkan di KOST_IN, seperti Foto dari kost, harga kost, dan informasi ketersediaan kamar</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img class="card-img-top fitur-image" src="{{ url('/') }}/logo/seo.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Dapat menerapkan pencarian sesuai dengan kriteria dan mengurutkannya sesuai list terbaik.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img class="card-img-top fitur-image" src="{{ url('/') }}/logo/customer-review.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Dengan adanya fitur rangking dalam pencarian memudahkan para pemburu kost mencari kost dengan hasil yang terbaik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>
@endsection