@extends('layout.app')
@section('title', $title)
@section('content')
    <div class="row">
        <!-- Carousel Section -->
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/photo1a.JPG') }}" class="d-block w-100" alt="Gambar 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>MSIB 5</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/photo2.JPG') }}" class="d-block w-100" alt="Gambar 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>MSIB 5</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/photo3.JPG') }}" class="d-block w-100" alt="Gambar 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>MSIB 5</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/photo4.JPG') }}" class="d-block w-100" alt="Gambar 4">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>MSIB 5</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/photo5.JPG') }}" class="d-block w-100" alt="Gambar 5">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>MSIB 5</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div>
                <p>Tribe merupakan perwakilan mahasiswa magang di setiap mitra MSIB, dan ketua tribe yang dipilih akan memiliki tanggung jawab membantu mitra magang MSIB yang akan berperan sebagai koordinator di regional office mmitra Magang dan Studi Independen Bersertifikat</p>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                    <div id="container"></div>
                </div>
            </div>
        </div>
        <!-- Rank Tribe Section -->
        <div class="col-md-6">
            <div class="card card-primary card-outline mb-3">
                <div class="card-header">
                    Rank Tribe
                </div>
                <div class="card-body p-0 table-responsive fixed-table">
                    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search...">
                    <table class="table table-bordered table-hover table-striped m-0">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Nilai Pref</th>
                            </tr>
                        </thead>
                        <tbody id="rankTable">
                            @foreach ($alternatifs as $key => $row)
                                <tr class="{{ $row->rank == 1 ? 'table-success' : ($row->rank == 2 ? 'table-info' : ($row->rank == 3 ? 'table-warning' : '')) }}">
                                    <td>
                                        <i class="fas fa-medal {{ $row->rank == 1 ? 'text-gold' : ($row->rank == 2 ? 'text-silver' : ($row->rank == 3 ? 'text-bronze' : 'text-muted')) }}"></i>
                                        {{ $row->rank }}
                                    </td>
                                    <td>{{ $row->kode_alternatif }}</td>
                                    <td>{{ $row->nama_alternatif }}</td>
                                    <td>{{ round($row->total, 4) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Criteria Section -->
            <div class="card card-primary card-outline mb-3">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-balance-scale-right me-2"></i>
                    <span>Bobot Kriteria</span>
                </div>
                <div class="card-body p-0 table-responsive fixed-table">
                    <table class="table table-bordered table-hover table-striped m-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Atribut</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriterias as $key => $row)
                                <tr>
                                    <td>{{ $row->kode_kriteria }}</td>
                                    <td>{{ $row->nama_kriteria }}</td>
                                    <td>{{ $row->atribut }}</td>
                                    <td>{{ round($row->bobot, 4) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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

        // Search functionality for Rank Alternatif table
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#rankTable tr');
            rows.forEach(row => {
                const kode = row.children[1].textContent.toLowerCase();
                const nama = row.children[2].textContent.toLowerCase();
                if (kode.includes(searchValue) || nama.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    <style>
        .text-gold {
            color: gold;
        }
        .text-silver {
            color: silver;
        }
        .text-bronze {
            color: #cd7f32;
        }
        .carousel-inner img {
            height: 400px;
            object-fit: cover;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: black;
            border-radius: 50%;
        }
        .table-dark th {
            background-color: #343a40;
            color: white;
        }
        .fixed-table {
            max-height: 400px; /* Adjust as needed */
            overflow-y: auto;
        }
    </style>
@endsection
