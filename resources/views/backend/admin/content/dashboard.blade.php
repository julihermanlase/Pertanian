@extends('backend/admin/layout/main')
@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="content mt-3">
                <div class="row">
                    <!-- Tanaman Aktif -->
                    <div class="col-md-4">
                        <div class="card text-white bg-success rounded shadow-sm">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="fa fa-leaf fa-3x"></i>
                                </div>
                                <div class="text-right">
                                    <h2 class="font-weight-bold mb-0">100</h2>
                                    <small class="text-uppercase">Tanaman Aktif</small> <!-- $totalTanaman -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Lahan Pertanian -->
                    <div class="col-md-4">
                        <div class="card text-white bg-info rounded shadow-sm">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="fa fa-tractor fa-3x"></i>
                                </div>
                                <div class="text-right">
                                    <h2 class="font-weight-bold mb-0">50</h2>
                                    <small class="text-uppercase">Lahan Pertanian</small> <!-- $totalLahan -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total Panen -->
                    <div class="col-md-4">
                        <div class="card text-white bg-warning rounded shadow-sm">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="fa fa-seedling fa-3x"></i>
                                </div>
                                <div class="text-right">
                                    <h2 class="font-weight-bold mb-0">1000 Kg</h2>
                                    <small class="text-uppercase">Total Panen Bulan Ini</small> <!-- $totalPanen -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grafik Pertumbuhan Hasil Panen -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Grafik Pertumbuhan Hasil Panen</strong>
                </div>
                <div class="card-body">
                    <canvas id="panenChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Grafik Pertumbuhan Hasil Panen
        const panenCtx = document.getElementById('panenChart').getContext('2d');
        const panenChart = new Chart(panenCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Juli', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Hasil Panen (kg)',
                    data: [120, 200, 150, 180, 250, 300],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.4
                }]
            }
        });
    </script>
@endsection
