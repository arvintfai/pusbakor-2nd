@extends('layouts/master')

@section('tittle')
Dashboard
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{number_format($perusahaan, 0, ",", ".")}}</h3>

            <p>Perusahaan</p>
          </div>
          <div class="icon">
            <i class="ion ion-settings"></i>
          </div>
          <a href="{{route('perusahaan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{number_format($proyek, 0, ",", ".")}}</h3>

            <p>Proyek</p>
          </div>
          <div class="icon">
            <i class="ion ion-briefcase"></i>
          </div>
          <a href="{{route('proyek')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{number_format($proyeklokasi, 0, ",", ".")}}</h3>

            <p>Proyek dengan lokasi</p>
          </div>
          <div class="icon">
            <i class="ion ion-location"></i>
          </div>
          <a href="{{route('proyek')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>Coming</h3>

            <p>Soon</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="col">
      @include('layouts/diagram')
    </div>
@endsection

@push('scripts')
<script>
function generateRandomColor() {
        // Fungsi untuk menghasilkan warna acak
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function generateRandomColors(count) {
        // Fungsi untuk menghasilkan array warna acak sebanyak count
        const colors = [];
        for (let i = 0; i < count; i++) {
            colors.push(generateRandomColor());
        }
        return colors;
    }

    // Menghasilkan 12 warna acak
    const randomColors = generateRandomColors({{json_encode($data_proyek)}}.length);

    // Inisialisasi grafik area pada tab pertama
    var ctxAreaChart = document.getElementById('revenue-chart-canvas').getContext('2d');
    var areaChart = new Chart(ctxAreaChart, {
        type: 'bar', // Anda bisa mengganti tipe grafik sesuai kebutuhan (line, bar, doughnut, dll.)
        data: {
            // Data grafik area
            labels: {!!json_encode($data_kecamatan)!!},
            datasets: [{
                label: 'Proyek',
                data: {{json_encode($data_proyek)}},
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            // Opsi grafik area
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Inisialisasi grafik donut pada tab kedua
    var ctxDonutChart = document.getElementById('sales-chart-canvas').getContext('2d');
    var donutChart = new Chart(ctxDonutChart, {
        type: 'doughnut', // Anda bisa mengganti tipe grafik sesuai kebutuhan (line, bar, doughnut, dll.)
        data: {
            // Data grafik donut
            labels: {!!json_encode($data_kecamatan)!!},
            datasets: [{
                data: {{json_encode($data_proyek)}},
                backgroundColor: randomColors
            }]
        },
        options: {
            // Opsi grafik donut
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endpush