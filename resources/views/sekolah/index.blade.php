@extends('produk.layout')

@section('content')

<h4 class="mt-5">Data Sekolah</h4>

<a href="{{ route('sekolah.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('sekolah.trash') }}" type="button" class="btn btn-dark rounded-3">Trash</a>
<form class = "row mt-3 ml-3 justify-content-center; "action="" method="GET">
        <h4 class="text-center mb-1">Search</h4>
        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
        <input type="text" name="search" required/>
        
        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
</form>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No</th>
        <th>Sekolah</th>
        <th>Jenis Sekolah</th>
        <th>Status</th>
        <th>Provinsi</th>
        <th>Alamat</th>
        <th>Kode Pos</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_sekolah }}</td>
                <td>{{ $data->nama_sekolah }}</td>
                <td>{{ $data->jenis_sekolah }}</td>
                <td>{{ $data->status}}</td>
                <td>{{ $data->provinsi }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->kode_pos }}</td>
                <td>
                    <a href="{{ route('sekolah.edit', $data->id_sekolah) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_sekolah }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_sekolah }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('sekolah.softdelete', $data->id_sekolah) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
@stop