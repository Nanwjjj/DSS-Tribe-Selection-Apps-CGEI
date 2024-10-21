@extends('layout.print')
@section('title', $title)
@section('content')
<table class="table table-bordered table-hover table-striped m-0">
	<thead>
		<th>No</th>
		<th>Kriteria</th>
		<th>Nama crisp</th>
		<th>Bobot</th>
	</thead>
	<?php $no = 1 ?>
	@foreach($rows as $key => $row)
	<tr>
		<td>{{ $no++ }}</td>
		<td>{{ $row->nama_kriteria }}</td>
		<td>{{ $row->nama_crisp }}</td>
		<td>{{ round($row->bobot_crisp, 4) }}</td>
	</tr>
	@endforeach
</table>
@endsection