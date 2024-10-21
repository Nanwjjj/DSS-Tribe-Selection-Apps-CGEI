@extends('layout.app')

@section('title', $title)

@section('content')
    {{ show_msg() }}

    <!-- Data Kriteria Section -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <strong class="card-title">Kriteria</strong>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Atribut</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $key => $val)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $val->nama_kriteria }}</td>
                            <td>{{ $val->atribut }}</td>
                            <td>{{ round($val->bobot, 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Data Alternatif Section -->
    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            <strong class="card-title">Data Alternatif</strong>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        @foreach ($kriterias as $key => $val)
                            <th>{{ $val->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rel_alternatif as $key => $val)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                            @foreach ($val as $k => $v)
                                <td>{{ isset($crisp[$v]) ? $crisp[$v]->nama_crisp : '' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Nilai Alternatif Section -->
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <strong class="card-title">Nilai Alternatif</strong>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Kode</th>
                        @foreach ($kriterias as $key => $val)
                            <th>{{ $key }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topsis->rel_alternatif as $key => $val)
                        <tr>
                            <td>{{ $key }}</td>
                            @foreach ($val as $k => $v)
                                <td>{{ round($v, 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Matriks Ternormalisasi Section -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header bg-warning text-white">
                    <strong class="card-title">Normalisasi</strong>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-hover table-striped m-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Kode</th>
                                @foreach ($kriterias as $key => $val)
                                    <th>{{ $key }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topsis->normal as $key => $val)
                                <tr>
                                    <td>{{ $key }}</td>
                                    @foreach ($val as $k => $v)
                                        <td>{{ number_format($v, 4) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<!-- Matriks Ternormalisasi Terbobot Section -->
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header bg-danger text-white">
                    <strong class="card-title">Terbobot</strong>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-bordered table-hover table-striped m-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Kode</th>
                                @foreach ($kriterias as $key => $val)
                                    <th>{{ $key }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topsis->terbobot as $key => $val)
                                <tr>
                                    <td>{{ $key }}</td>
                                    @foreach ($val as $k => $v)
                                        <td>{{ number_format($v, 4) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Matriks Solusi Ideal Positif dan Negatif Section -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <strong class="card-title">Matriks Solusi Ideal</strong>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Ideal</th>
                        @foreach ($kriterias as $key => $val)
                            <th>{{ $key }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topsis->solusi_ideal as $key => $val)
                        <tr>
                            <td>{{ $key }}</td>
                            @foreach ($val as $k => $v)
                                <td>{{ number_format($v, 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Jarak Solusi Ideal Positif dan Negatif Section -->
    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            <strong class="card-title">Jarak Solusi Ideal</strong>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Kode</th>
                        <th>Positif</th>
                        <th>Negatif</th>
                        <th>Preferensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topsis->jarak_solusi as $key => $val)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ number_format($val['positif'], 4) }}</td>
                            <td>{{ number_format($val['negatif'], 4) }}</td>
                            <td>{{ number_format($topsis->pref[$key], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Perangkingan Section -->
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <strong class="card-title">Perangkingan</strong>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Rank</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topsis->rank as $key => $val)
                        <tr>
                            <td>{{ $val }}</td>
                            <td>{{ $key }}</td>
                            <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                            <td>{{ number_format($topsis->pref[$key], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <div id="container"></div>
            <script>
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Hasil Perhitungan'
                    },
                    xAxis: {
                        categories: <?= json_encode($categories) ?>,
                        crosshair: true,
                        accessibility: {
                            description: 'Countries'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Total'
                        }
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: <?= json_encode($series) ?>
                });
            </script>
        </div>

        <div class="card-footer">
            <a class="btn btn-secondary" href="{{ route('hitung.cetak') }}" target="_blank"><span class="fa fa-print"></span> Cetak Hasil</a>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .table thead th {
        text-align: center;
    }
    .card-header {
        font-size: 1.2rem;
    }
    .card-body p-0 {
        padding: 15px;
    }
</style>
@endsection
