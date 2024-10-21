@extends('layout.app')
@section('title', $title)
@section('content')
    {{ show_msg() }}
    <div class="card card-primary card-outline">
        <div class="card-header">
            <form class="row row-cols-lg-auto g-1">
                <div class="form-group mr-1">
                    <input class="form-control" type="text" name="q" value="{{ $q }}"
                        placeholder="Pencarian..." />
                </div>
                <div class="form-group mr-1">
                    <button class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                </div>
                <div class="form-group mr-1" {{ is_hidden('rel_alternatif.cetak') }}>
                    <a class="btn btn-secondary" href="{{ route('rel_alternatif.cetak') }}" target="_blank"><span
                            class="fa fa-print"></span> Cetak</a>
                </div>
            </form>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama alternatif</th>
                    @foreach ($kriterias as $kriteria)
                        <th>{{ $kriteria->nama_kriteria }}</th>
                    @endforeach
                    <th>Aksi</th>
                </thead>
                @foreach ($rows as $key => $row)
                    <tr>
                        <td>{{ ($rows->currentPage() - 1) * $limit + $key + 1 }}</td>
                        <td>{{ $row->kode_alternatif }}</td>
                        <td>{{ $row->nama_alternatif }}</td>
                        @foreach ($rel_alternatif[$row->kode_alternatif] as $k => $v)
                            {{-- <td>{{ isset($crisp[$v]) ? $crisp[$v]->bobot_crisp : '' }}</td>aa --}}
                            <td>
                                @if (isset($crisp[$v]))
                                    @if ($crisp[$v]->bobot_crisp == null)

                                    @elseif ($crisp[$v]->bobot_crisp <= 60)
                                        Sangat Kurang
                                    @elseif ($crisp[$v]->bobot_crisp >= 61 && $crisp[$v]->bobot_crisp <= 65)
                                        Kurang
                                    @elseif ($crisp[$v]->bobot_crisp >= 66 && $crisp[$v]->bobot_crisp <= 70)
                                        Cukup
                                    @elseif ($crisp[$v]->bobot_crisp >= 71 && $crisp[$v]->bobot_crisp <= 75)
                                        Baik
                                    @elseif ($crisp[$v]->bobot_crisp >= 76 && $crisp[$v]->bobot_crisp <= 80)
                                        Sangat Baik
                                    @else
                                        Nilai tidak valid
                                    @endif
                                @else
                                @endif
                            </td>
                        @endforeach
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('rel_alternatif.edit', $row->kode_alternatif) }}"
                                {{ is_hidden('rel_alternatif.edit') }}><i class="fa fa-edit"></i> Ubah</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @if ($rows->hasPages())
            <div class="card-footer">
                {{ $rows->links() }}
            </div>
        @endif
    </div>
@endsection
