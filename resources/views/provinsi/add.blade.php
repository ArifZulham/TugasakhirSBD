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

        <h5 class="card-title fw-bolder mb-3">Tambah provinsi</h5>

		<form method="post" action="{{ route('provinsi.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_provinsi" class="form-label">ID provinsi</label>
                <input type="text" class="form-control" id="id_provinsi" name="id_provinsi">
            </div>
			<div class="mb-3">
                <label for="provinsi" class="form-label">provinsi</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi">
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">kota</label>
                <input type="text" class="form-control" id="kota" name="kota">
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop