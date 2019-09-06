@extends('layouts.app_bootstrap')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col" style="margin: auto">
                <h6 class="m-0 font-weight-bold text-primary">Daftar kost</h6>  
            </div>
            <div class="col" style="text-align: right">
                <a class="btn btn-primary btn-icon-split" href="{{ route('tambah_kost') }}">
                    <span class="icon text-white-50 left">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Total kamar</th>
                        <th>Sisa kamar</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $hasil)
                        <tr>
                            <td>{{ $hasil->name }}</td>
                            <td>{{ $hasil->alamat }}</td>
                            <td>{{ $hasil->total_kamar }}</td>
                            <td>{{ (int)$hasil->total_kamar - (int)$hasil->kamar_terisi }}</td>
                            <td>{{ $hasil->harga }}</td>
                            <td  width="390">
                                <div class="row">
                                    <div class="col">
                                        <form action="{{ route('detail_kost') }}" method="POST">
                                            @csrf
                                            <input type="text" name="info_kosts" value="{{ $hasil->kosts_id }}" style="display: none">
                                            <button type="submit" class="btn btn-warning btn-icon-split"">
                                                <span class="icon text-white-50 left">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Info</span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('edit_kost') }}" method="GET">
                                            @csrf
                                            <input type="text" name="info_kosts" value="{{ $hasil->kosts_id }}" style="display: none">
                                            <button type="submit" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50 left">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapusModal" onclick="event.preventDefault();$('#hapus_input').val({{ $hasil->kosts_id }});">
                                            <span class="icon text-white-50 left">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </button>
                                    </div>    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col" style="padding: 0">
                {{ $data->links() }}
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Hapus Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus kost ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tekan tombol hapus untuk menghapus kost dari aplikasi ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="{{ route('delete_kost') }}" onclick="event.preventDefault();document.getElementById('hapus-form').submit();">Hapus</a>
                <form id="hapus-form" action="{{ route('delete_kost') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="text" name="info_kosts" id="hapus_input">
                </form>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function getDatafromButtonDelete(data)
    {
        $('#hapus_input').val(data);
    }
</script>
<!-- /.container-fluid -->
@endsection