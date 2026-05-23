<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/templates_admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    @include('../templates/sidebar')

    <!-- Main Content -->
    <main class="main-content">

        <!-- Header -->
        <div class="dashboard-title mb-4">
            <h2>Dashboard</h2>
            <p class="text-muted">Selamat datang di dashboard admin Dinas Pariwisata</p>
        </div>

        <!-- Stats -->
        <div class="row g-4">
            @php
                $stats = [
                    ['label'=>'Destinasi Wisata','value'=>$totalWisata,'color'=>'green','icon'=>'bi-geo-alt'],
                    ['label'=>'Kuliner','value'=>$totalKuliner,'color'=>'blue','icon'=>'bi-cup-hot'],
                    ['label'=>'Budaya','value'=>$totalBudaya,'color'=>'cyan','icon'=>'bi-bank'],
                    ['label'=>'Acara','value'=>$totalAcara,'color'=>'darkblue','icon'=>'bi-calendar-event'],
                    ['label'=>'Pegawai','value'=>$totalPegawai,'color'=>'purple','icon'=>'bi-people'],
                ];
            @endphp

            @foreach($stats as $stat)
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card stat-card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="icon {{ $stat['color'] }}">
                                <i class="bi {{ $stat['icon'] }}"></i>
                            </div>
                        </div>

                        <h3 class="counter" data-target="{{ $stat['value'] }}">0</h3>
                        <p class="text-muted">{{ $stat['label'] }}</p>

                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Content -->
        <div class="row g-3 mt-3 activity-wrapper">

            <!-- Wisata -->
            <div class="col-12 col-md-6 col-xl-3">

                <div class="activity-card">

                    <h6>
                        <i class="bi bi-geo-alt-fill"></i>
                        Tambah Wisata
                    </h6>

                    @foreach($latestWisata as $item)

                    <div class="activity-item">

                        <span>{{ $item->nama }}</span>

                        <small>
                            {{ $item->created_at->diffForHumans() }}
                        </small>

                    </div>

                    @endforeach

                </div>

            </div>

            <!-- Acara -->
            <div class="col-12 col-md-6 col-xl-3">

                <div class="activity-card">

                    <h6>
                        <i class="bi bi-calendar-event-fill"></i>
                        Tambah Acara
                    </h6>

                    @foreach($latestAcara as $item)

                    <div class="activity-item">

                        <span>{{ $item->nama }}</span>

                        <small>
                            {{ $item->created_at->diffForHumans() }}
                        </small>

                    </div>

                    @endforeach

                </div>

            </div>

            <!-- Budaya -->
            <div class="col-12 col-md-6 col-xl-3">

                <div class="activity-card">

                    <h6>
                        <i class="bi bi-bank2"></i>
                        Tambah Budaya
                    </h6>

                    @foreach($latestBudaya as $item)

                    <div class="activity-item">

                        <span>{{ $item->nama }}</span>

                        <small>
                            {{ $item->created_at->diffForHumans() }}
                        </small>

                    </div>

                    @endforeach

                </div>

            </div>

            <!-- Pegawai -->
            <div class="col-12 col-md-6 col-xl-3">

                <div class="activity-card">

                    <h6>
                        <i class="bi bi-people-fill"></i>
                        Tambah Pegawai
                    </h6>

                    @foreach($latestPegawai as $item)

                    <div class="activity-item">

                        <span>{{ $item->nama }}</span>

                        <small>
                            {{ $item->created_at->diffForHumans() }}
                        </small>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    // 🔥 plugin untuk teks di tengah
    const centerText = {
        id: 'centerText',
        beforeDraw(chart) {
            const {width} = chart;
            const {height} = chart;
            const ctx = chart.ctx;

            ctx.restore();

            const value = chart.config.data.datasets[0].data[0];

            ctx.font = "bold 18px sans-serif";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            ctx.fillText(value, width / 2, height / 2);
            ctx.save();
        }
    };

   
function createChart(id, value, color, maxValue = 30) {

    const ctx = document.getElementById(id);

    let currentValue = 0;

    const chart = new Chart(ctx, {

        type: 'doughnut',

        data: {
            datasets: [{

                // bagian berwarna
                data: [0, maxValue],

                backgroundColor: [
                    color,
                    '#e5e7eb'
                ],

                borderWidth: 0,
                hoverOffset: 0
            }]
        },

        options: {

            responsive: true,
            maintainAspectRatio: false,

            cutout: '75%',

            animation: {
                duration: 0
            },

            plugins: {
                legend: {
                    display: false
                }
            }

        },

        plugins: [{

            id: 'centerText',

            beforeDraw(chart) {

                const {width, height, ctx} = chart;

                ctx.restore();

                ctx.font = "bold 18px sans-serif";
                ctx.fillStyle = "#1e293b";

                ctx.textAlign = "center";
                ctx.textBaseline = "middle";

                ctx.fillText(
                    Math.floor(currentValue),
                    width / 2,
                    height / 2
                );

                ctx.save();
            }
        }]
    });

    // animasi hanya warna utama
    // ======================
    // DURASI ANIMASI
    // ======================

    const duration = 2000; // 2 detik

    const fps = 60;

    const totalFrames = duration / (1000 / fps);

    const increment = value / totalFrames;

    let interval = setInterval(() => {

        currentValue += increment;

        if (currentValue >= value) {

            currentValue = value;

            clearInterval(interval);
        }

        // batas maksimum
        if (currentValue > maxValue) {
            currentValue = maxValue;
        }

        // hanya warna utama bergerak
        chart.data.datasets[0].data[0] = currentValue;

        chart.update();

    }, 1000 / fps);
}

        // 🔥 panggil chart
    createChart('chartWisata', {{ $totalWisata }}, '#20c997', 30);

    createChart('chartKuliner', {{ $totalKuliner }}, '#0dcaf0', 30);

    createChart('chartBudaya', {{ $totalBudaya }}, '#6f42c1', 30);

    createChart('chartAcara', {{ $totalAcara }}, '#0d6efd', 30);

    createChart('chartPegawai', {{ $totalPegawai }}, '#ffc107', 30);
});

document.querySelectorAll(".counter").forEach(counter => {

    let target = +counter.getAttribute("data-target");
    let count = 0;

    let updateCounter = () => {

        let increment = target / 60;

        if (count < target) {

            count += increment;

            counter.innerText = Math.ceil(count);

            requestAnimationFrame(updateCounter);

        } else {

            counter.innerText = target;
        }
    };

    updateCounter();
});
</script>

@include ('../templates/footer_admin')

<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>

</body>
</html>