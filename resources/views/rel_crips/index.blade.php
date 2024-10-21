@extends('layout.app')
@section('title', $title)
@section('content')
{{ show_msg() }}
{{ show_error($errors) }}
<div class="card card-primary card-outline">
	<div class="card-header">
		<form class="row row-cols-lg-auto g-1">
			<div class="form-group mr-1">
				<select class="form-select" name="kode_kriteria">
					<?= get_kriteria_option($kode_kriteria) ?>
				</select>
			</div>
			<div class="form-group mr-1">
				<button class="btn btn-primary"><i class="fa fa-search"></i> Refresh</button>
			</div>
		</form>
	</div>
	@if($kode_kriteria)
	<div class="card-body">
		<div class="card">
			<div class="card-header">
				<form class="row row-cols-lg-auto g-1" method="post" action="{{ route('rel_crisp.simpan', ['kode_kriteria'=>$kode_kriteria]) }}">
					@csrf
					<div class="form-group mr-1">
						<select class="form-select" name="ID1">
							<?= get_crisp_option($kode_kriteria, old('ID1')) ?>
						</select>
					</div>
					<div class="form-group mr-1">
						<select class="form-select" name="nilai">
							<?= get_nilai_option(old('nilai')) ?>
						</select>
					</div>
					<div class="form-group mr-1">
						<select class="form-select" name="ID2">
							<?= get_crisp_option($kode_kriteria, old('ID2')) ?>
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
						@foreach($rel_crisp as $key => $val)
						<th>{{ $crisps[$key]->nama_crisp }}</th>
						@endforeach
					</thead>
					@foreach($rel_crisp as $key => $val)
					<tr>
						<td>{{ $key }}</td>
						<td>{{ $crisps[$key]->nama_crisp }}</td>
						@foreach($val as $k => $v)
						<td>{{ round($v, 4) }}</td>
						@endforeach
					</tr>
					@endforeach
				</table>
			</div>
			<div class="card-body"></div>
			<div class="card-body p-0 table-responsive">
				<table class="table table-bordered table-hover table-striped m-0 border-top">
					<thead>
						<th>Kode</th>
						@foreach($rel_crisp as $key => $val)
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
	</div>
	@endif
</div>
@endsection