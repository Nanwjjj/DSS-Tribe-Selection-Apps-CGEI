@extends('layout.app')
@section('title', $title)
@section('content')
<form action="{{ route('crisp.update', $row) }}" method="post">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					{{show_error($errors)}}
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="mb-3">
						<label>Kriteria <span class="text-danger">*</span></label>
						<select class="form-select" name="kode_kriteria">
							<?= get_kriteria_option(old('kode_kriteria', $row->kode_kriteria)) ?>
						</select>
					</div>
					<div class="mb-3">
						<label>Nama <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="nama_crisp" value="{{ old('nama_crisp', $row->nama_crisp) }}">
					</div>
					<div class="mb-3">
						<label>Bobot <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="bobot_crisp" value="{{ old('bobot_crisp', $row->bobot_crisp) }}">
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			<a class="btn btn-danger" href="{{ route('crisp.index')}}"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div>
	</div>
</form>
@endsection