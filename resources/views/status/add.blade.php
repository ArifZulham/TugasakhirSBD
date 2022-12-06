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

        <h5 class="card-title fw-bolder mb-3">Tambah status</h5>

		<form method="post" action="{{ route('status.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_status" class="form-label">ID status</label>
                <input type="text" class="form-control" id="id_status" name="id_status">
            </div>
			<div class="mb-3">
                <label for="status" class="form-label">status</label>
                <input type="text" class="form-control" id="status" name="status">
            </div>
            <div class="mb-3">
                <label for="waktu_kbm" class="form-label">waktu_kbm</label>
                <input type="text" class="form-control" id="waktu_kbm" name="waktu_kbm">
            </div>
        	<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop