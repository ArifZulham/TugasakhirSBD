@extends('produk.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah sekolah</h5>

		<form method="post" action="{{ route('sekolah.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_sekolah" class="form-label">ID sekolah</label>
                <input type="text" class="form-control" id="id_sekolah" name="id_sekolah">
            </div>

            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">nama_sekolah</label>
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah">
            </div>
            <div class="mb-3">
                <label for="jenis_sekolah" class="form-label">jenis_sekolah</label>
                <input type="text" class="form-control" id="jenis_sekolah" name="jenis_sekolah">
            </div>
            <div class="mb-3">
                <label for="id_status" class="form-label">id_status</label>
                <input type="text" class="form-control" id="id_status" name="id_status">
            </div>
            <div class="mb-3">
                <label for="id_provinsi" class="form-label">id_provinsi</label>
                <input type="text" class="form-control" id="id_provinsi" name="id_provinsi">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="kode_pos" class="form-label">kode_pos</label>
                <input type="text" class="form-control" id="kode_pos" name="kode_pos">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop