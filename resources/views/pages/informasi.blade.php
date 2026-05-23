<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICON -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="styles/informasi.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/comment.css">
    <link rel="stylesheet" href="styles/footer.css">

    <title>Informasi</title>
</head>

<body>
    @include('../templates/navbar')

    <section id="heroCarousel" class="heroCarousel">
        <div class="overlay"></div>
        <div class="header-wisata">
            <h1>PUSAT INFORMASI DINAS PARIWISATA</h1>
            <p>Mengenal informasi dan data terkait Pariwisata Kabupaten Poso</p>
        </div>
    </section>

            <!-- TAB MENU -->
    <section class="informasi-section py-5">
            <div class="info-tabs-wrapper mb-5">

        <div class="info-tabs d-flex flex-wrap justify-content-center gap-3">

            <button class="info-tab-btn active"
                data-tab="wisataTab">

                <i class="bi bi-info-circle-fill"></i>
                Informasi Pariwisata

            </button>

            <button class="info-tab-btn"
                data-tab="beritaTab">

                <i class="bi bi-newspaper"></i>
                Berita & Pengumuman

            </button>

        </div>

    </div>

    
    <div id="wisataTab" class="tab-content-box active">

        <div class="container">

            <!-- HEADER -->
            <div class="text-center mb-5">

                <h1 class="info-title">
                    Pusat Informasi Wisata <br>
                    Kabupaten Poso
                </h1>

                <p class="info-description mx-auto">
                    Temukan berbagai informasi penting mengenai destinasi wisata,
                    budaya, kuliner, event daerah, fasilitas umum, serta layanan
                    pariwisata yang tersedia di Kabupaten Poso.
                </p>

            </div>

    <section class="visitor-section mb-5">
        
        <div class="visitor-header text-center mb-5">

            <span class="info-badge">
                STATISTIK PARIWISATA
            </span>

            <h1 class="visitor-title">
                Statistik Pengunjung Wisata <br>
                Kabupaten Poso
            </h1>

            <form method="GET" action="{{ route('informasi') }}">

                <div class="filter-tahun d-flex">

                    <select name="tahun" class="form-select me-2">

                        <option value="">
                            Semua Tahun
                        </option>

                        @foreach($daftarTahun as $tahun)

                            <option value="{{ $tahun }}"
                                {{ request('tahun') == $tahun ? 'selected' : '' }}>

                                {{ $tahun }}

                            </option>

                        @endforeach

                    </select>

                    <button type="submit" class="btn btn-primary">
                        Filter
                    </button>

                </div>

            </form>

            <p class="visitor-desc mx-auto mt-3">
                Menampilkan perkembangan jumlah pengunjung wisata berdasarkan
                data statistik yang tercatat pada sistem informasi pariwisata pada tahun {{$tahunDipilih}}.
            </p>

        </div>
        <div class="row g-4 mb-5 ms-3">

            <div class="col-lg-3 col-md-6">
                <div class="summary-card">
                    <div class="summary-icon blue">
                        <i class="bi bi-people-fill"></i>
                        Total Wisatawan
                    </div>

                    <div>
                        <h3>
                            {{ number_format($wisatawanDomestik) }}
                        </h3>
                        <p>Wisatawan Domestik</p>
                        <h3>
                            {{ number_format($wisatawanMancanegara) }} 
                        </h3>
                        <p>Wisatawan Mancanegara</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="summary-card">
                    <div class="summary-icon green">
                        <i class="bi bi-graph-up-arrow"></i>
                        Perubahan Data Wisatawan
                    </div>

                    <div>
                        <h3>
                            {{ $persentaseNaikdom }}%
                        </h3>
                        <p>Data {{$statusDom}} sebanyak {{number_format($selisihdom)}} Wisatawan Domestik</p>
                        <h3>
                            {{ $persentaseNaikman }}%
                        </h3>
                        <p>Data {{$statusMan}} sebanyak {{number_format($selisihman)}} WIsatawan Mancanegara</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="summary-card">
                    <div class="summary-icon orange">
                        <i class="bi bi-calendar-event-fill"></i>
                        Data Tahun Wisatawan Tertinggi
                    </div>

                    <div>
                        <h3>
                            {{ $tahunTertinggidom }}
                        </h3>
                        <p>Tahun Tertinggi Wisatawan Domenstik</p>
                    </div>
                    <div>
                        <h3>
                            {{ $tahunTertinggiman }}
                        </h3>
                        <p>Tahun Tertinggi Wisatwan Mancanegara</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- GRAFIK -->
        <div class="chart-wrapper mb-5">

            <div class="chart-header text-center">
                <h3>
                    Grafik Perkembangan Pengunjung
                </h3>

                <p>
                    Analisis perkembangan jumlah wisatawan berdasarkan data bulanan.
                </p>
            </div>

            <div class="chart-container">
                <canvas id="visitorChart"></canvas>
            </div>

        </div>

    </section>

            <!-- INFORMASI UTAMA -->
            <div class="row g-4 mb-5">

                <!-- CARD 1 -->
                <div class="col-lg-4 col-md-6">

                    <div class="info-card h-100">

                        <div class="icon-box">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>

                        <h4>Informasi Destinasi</h4>

                        <p>
                            Dapatkan informasi lengkap mengenai lokasi wisata,
                            akses perjalanan, fasilitas, tiket masuk,
                            dan jam operasional.
                        </p>

                        <a href="/destinasi" class="info-link">
                            Jelajahi Destinasi
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

                <!-- CARD 2 -->
                <div class="col-lg-4 col-md-6">

                    <div class="info-card h-100">

                        <div class="icon-box blue">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>

                        <h4>Event dan Festival</h4>

                        <p>
                            Informasi mengenai festival budaya,
                            event wisata, pertunjukan seni,
                            dan kegiatan daerah lainnya.
                        </p>

                        <a href="#" class="info-link">
                            Lihat Event
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

                <!-- CARD 3 -->
                <div class="col-lg-4 col-md-6">

                    <div class="info-card h-100">

                        <div class="icon-box green">
                            <i class="bi bi-cup-hot-fill"></i>
                        </div>

                        <h4>Kuliner Khas</h4>

                        <p>
                            Kenali berbagai kuliner khas Kabupaten Poso
                            yang dapat dinikmati wisatawan selama berkunjung.
                        </p>

                        <a href="#" class="info-link">
                            Jelajahi Kuliner
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            <!-- LAYANAN -->
            <div class="layanan-wrapper mb-5">

                <div class="row align-items-center g-5">

                    <!-- GAMBAR -->
                    <div class="col-lg-6">

                        <img src="{{ asset('images/foto_layanan.png') }}"
                            class="img-fluid layanan-image">

                    </div>

                    <!-- CONTENT -->
                    <div class="col-lg-6">

                        <span class="section-label">
                            Layanan Bantuan
                        </span>

                        <h2 class="layanan-title">
                            Kotak Komentar & Bantuan Wisatawan
                        </h2>

                        <p class="layanan-desc">
                            Melalui fitur kotak komentar, masyarakat dan wisatawan dapat
                            menyampaikan pertanyaan, masukan, maupun informasi terkait
                            pariwisata Kabupaten Poso secara cepat dan mudah.
                        </p>

                        <div class="layanan-list">

                            <div class="layanan-item">
                                <i class="bi bi-chat-dots-fill"></i>
                                <span>
                                    Mengajukan pertanyaan seputar destinasi wisata
                                </span>
                            </div>

                            <div class="layanan-item">
                                <i class="bi bi-megaphone-fill"></i>
                                <span>
                                    Memberikan saran dan masukan layanan pariwisata
                                </span>
                            </div>

                            <div class="layanan-item">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                <span>
                                    Melaporkan kendala atau informasi wisata
                                </span>
                            </div>

                            <div class="layanan-item">
                                <i class="bi bi-people-fill"></i>
                                <span>
                                    Berinteraksi langsung dengan admin Dinas Pariwisata
                                </span>
                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="mt-4">

                            <button type="button"
                                class="btn btn-primary bantuan-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#commentModal"
                                onclick="openAddModal()">

                                <i class="bi bi-chat-left-text-fill me-2"></i>
                                Buka Kotak Bantuan

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- STATISTIK -->
            <div class="statistik-box">

                <div class="row text-center g-4">

                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <h2>{{$totalDestinasi}}</h2>
                            <p>Destinasi</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <h2>{{$totalBudaya}}</h2>
                            <p>Budaya Lokal</p>
                        </div>
                    </div>

                    <div class="col-md-2 col-6">
                        <div class="stat-item">
                            <h2>{{$totalKuliner}}</h2>
                            <p>Kuliner Khas</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="stat-item">
                            <h2>{{ number_format($totalpengunjung, 0, ',', '.') }}</h2>
                            <p>Total Pengunjung {{$tahunterbaru}}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    </section>


            <!-- BERITA & PENGUMUMAN -->
<div id="beritaTab" class="tab-content-box">
    <section class="news-section mb-5">

        <!-- HEADER -->
        <div class="text-center mb-5">

            <span class="info-badge">
                INFORMASI TERBARU
            </span>

            <h1 class="news-title">
                Berita & Pengumuman Pariwisata
            </h1>

            <p class="news-desc mx-auto">
                Dapatkan informasi terbaru mengenai kegiatan,
                pengumuman resmi, event pariwisata,
                serta perkembangan wisata Kabupaten Poso.
            </p>

        </div>

        <div class="row g-4">

            <!-- BERITA UTAMA -->
            <div class="col-lg-8">

                <div class="news-card main-news h-100">

                    <div class="news-image-wrapper">

                        <img src="{{ asset('images/festival danau poso.jpeg') }}"
                            class="img-fluid news-image">

                        <span class="news-category">
                            Berita Utama
                        </span>

                    </div>

                    <div class="news-content">

                        <div class="news-meta">
                            <span>
                                <i class="bi bi-calendar-event"></i>
                                22 Mei 2026
                            </span>

                            <span>
                                <i class="bi bi-eye"></i>
                                1.2K Dibaca
                            </span>
                        </div>

                        <h3 class="news-card-title">
                            Festival Danau Poso 2026 Resmi Dibuka
                        </h3>

                        <p class="news-text">
                            Festival Danau Poso kembali hadir dengan berbagai
                            pertunjukan budaya, pameran UMKM,
                            serta atraksi wisata yang melibatkan
                            masyarakat lokal dan wisatawan mancanegara.
                        </p>

                        <a href="#" class="news-link">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            <!-- PENGUMUMAN -->
            <div class="col-lg-4">

                <div class="announcement-card h-100">

                    <div class="announcement-header">

                        <i class="bi bi-megaphone-fill"></i>

                        <h4>
                            Pengumuman
                        </h4>

                    </div>

                    <!-- ITEM -->
                    <div class="announcement-item">

                        <div class="announcement-date">
                            20 Mei
                        </div>

                        <div>
                            <h6>
                                Perubahan Jadwal Event Wisata
                            </h6>

                            <p>
                                Jadwal Festival Kuliner Poso
                                diundur hingga tanggal 30 Mei 2026.
                            </p>
                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="announcement-item">

                        <div class="announcement-date blue">
                            18 Mei
                        </div>

                        <div>
                            <h6>
                                Informasi Penutupan Destinasi
                            </h6>

                            <p>
                                Air Terjun Saluopa ditutup sementara
                                untuk proses pemeliharaan area wisata.
                            </p>
                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="announcement-item">

                        <div class="announcement-date green">
                            15 Mei
                        </div>

                        <div>
                            <h6>
                                Pembukaan Pendaftaran UMKM
                            </h6>

                            <p>
                                Pendaftaran peserta UMKM Festival Danau Poso
                                resmi dibuka untuk masyarakat umum.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- LIST BERITA -->
        <div class="row g-4 mt-2">

            <!-- CARD -->
            <div class="col-lg-4 col-md-6">

                <div class="mini-news-card h-100">

                    <img src="{{ asset('images/saluopa 1.jpg') }}"
                        class="img-fluid mini-news-image">

                    <div class="mini-news-content">

                        <span class="mini-category">
                            Wisata Alam
                        </span>

                        <h5>
                            Wisata Danau Poso Menjadi Destinasi Favorit 2026
                        </h5>

                        <p>
                            Jumlah pengunjung Danau Poso mengalami
                            peningkatan signifikan selama tahun 2026.
                        </p>

                    </div>

                </div>

            </div>

            <!-- CARD -->
            <div class="col-lg-4 col-md-6">

                <div class="mini-news-card h-100">

                    <img src="{{ asset('images/mangore.png') }}"
                        class="img-fluid mini-news-image">

                    <div class="mini-news-content">

                        <span class="mini-category blue">
                            Budaya
                        </span>

                        <h5>
                            Pelestarian Budaya Pamona Terus Ditingkatkan
                        </h5>

                        <p>
                            Pemerintah daerah bersama masyarakat
                            terus menjaga budaya lokal Kabupaten Poso.
                        </p>

                    </div>

                </div>

            </div>

            <!-- CARD -->
            <div class="col-lg-4 col-md-6">

                <div class="mini-news-card h-100">

                    <img src="{{ asset('images/dui.jpeg') }}"
                        class="img-fluid mini-news-image">

                    <div class="mini-news-content">

                        <span class="mini-category green">
                            Kuliner
                        </span>

                        <h5>
                            Kuliner Tradisional Poso Semakin Diminati Wisatawan
                        </h5>

                        <p>
                            Berbagai kuliner khas daerah menjadi
                            daya tarik baru wisata kuliner di Poso.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>
</div>

@include ('../modal/modal_komentar')
@include('../templates/footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('visitorChart');

new Chart(ctx, {

    type: 'line',

    data: {

        // LABEL TAHUN
        labels: @json($labels),

        datasets: [

            // DOMESTIK
            {
                label: 'Wisatawan Domestik',

                data: @json($datadomestik),

                borderColor: '#0d6efd',

                backgroundColor: 'rgba(13,110,253,0.15)',

                fill: true,

                tension: 0.4,

                pointRadius: 5,

                pointBackgroundColor: '#0d6efd',

                borderWidth: 3
            },

            // MANCANEGARA
            {
                label: 'Wisatawan Mancanegara',

                data: @json($datamancanegara),

                borderColor: '#198754',

                backgroundColor: 'rgba(25,135,84,0.15)',

                fill: true,

                tension: 0.4,

                pointRadius: 5,

                pointBackgroundColor: '#198754',

                borderWidth: 3
            }

        ]
    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {
                display: true,
                position: 'top'
            },

            tooltip: {
                mode: 'index',
                intersect: false
            }
        },

        interaction: {
            mode: 'nearest',
            axis: 'x',
            intersect: false
        },

        scales: {

            y: {

                beginAtZero: true,

                ticks: {
                    callback: function(value) {
                        return value.toLocaleString();
                    }
                }

            },

            x: {

                grid: {
                    display: false
                }

            }

        }

    }

});

</script>
<script src="{{ asset('js/informasi.js') }}"></script>
<script src="{{ asset('js/bahasabaru.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>