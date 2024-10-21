@extends('layout.app')
@section('title', $title)
@section('content')
{{ show_msg() }}
{{ show_error($errors) }}
<div class="card card-primary card-outline">
	<div class="card-header">
		<form class="row row-cols-lg-auto g-1" method="post" action="{{ route('rel_kriteria.simpan') }}">
			@csrf
			<div class="form-group mr-1">
				<select class="form-select" name="ID1">
					<?= get_kriteria_option(old('ID1')) ?>
				</select>
			</div>
			<div class="form-group mr-1">
				<select class="form-select" name="nilai">
					<?= get_nilai_option(old('nilai')) ?>
				</select>
			</div>
			<div class="form-group mr-1">
				<select class="form-select" name="ID2">
					<?= get_kriteria_option(old('ID2')) ?>
				</select>
			</div>
			<div class="form-group mr-1">
				<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<div class="form-group mr-1" {{ is_hidden('rel_alternatif.cetak') }}>
				<a class="btn btn-secondary" href="{{ route('rel_alternatif.cetak') }}" target="_blank"><span class="fa fa-print"></span> Cetak</a>
			</div>
		</form>
	</div>
	<div class="card-body p-0 table-responsive">
		<table class="table table-bordered table-hover table-striped m-0">
			<thead>
				<th>Kode</th>
				<th>Nama Kriteria</th>
				@foreach($kriterias as $kriteria)
				<th>{{ $kriteria->nama_kriteria }}</th>
				@endforeach
			</thead>
			@foreach($rel_kriteria as $key => $val)
			<tr>
				<td>{{ $key }}</td>
				<td>{{ $kriterias[$key]->nama_kriteria }}</td>
				@foreach($val as $k => $v)
				<td>{{ round($v, 4) }}</td>
				@endforeach
			</tr>
			@endforeach
			<tfoot>
				<tr>
					<td colspan="2">Total</td>
					@foreach($ahp->baris_total as $key => $val)
					<td>{{ round($val, 4) }}</td>
					@endforeach
				</tr>
			</tfoot>
		</table>
	</div>
	<div class="card-body"></div>
	<div class="card-body p-0 table-responsive">
		<table class="table table-bordered table-hover table-striped m-0 border-top">
			<thead>
				<th>Kode</th>
				@foreach($kriterias as $key => $val)
				<th>{{ $key }}</th>
				@endforeach
				<th>Prioritas</th>
				<th>Consistency Measure</th>
			</thead>
			@foreach($ahp->normal as $key => $val)
			<tr>
				<td>{{ $key }}</td>
				@foreach($val as $k => $v)
				<td>{{ round($v, 4) }}</td>
				@endforeach
				<td>{{ round($ahp->prioritas[$key], 4) }}</td>
				<td>{{ round($ahp->cm[$key], 4) }}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div class="card-footer">
		Ratio Index: <?= round($ahp->ri, 4) ?><br />
		Consistency Index: <?= round($ahp->ci, 4) ?><br />
		Consistency Ratio: <?= round($ahp->cr, 4) ?> (<?= $ahp->konsistensi ?>)
	</div>
</div>
@endsection