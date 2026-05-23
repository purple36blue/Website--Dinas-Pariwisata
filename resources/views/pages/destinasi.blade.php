<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/comment.css">
    <link rel="stylesheet" href="styles/destinasi.css">
    <link rel="stylesheet" href="styles/modal_home.css">
    <title>Destinasi</title>
</head>
<body>
    @include ('templates/navbar')

<section id="heroCarousel" class="heroCarousel">
    <div class="overlay"></div>
    <div class="header-wisata" >
        <h1>DESTINASI WISATA, KULINER DAN BUDAYA</h1>
        <p>Temukan berbagai pengalaman menarik dan mempelajari hal baru seputar pariwisata di Kabupaten Poso</p>
    </div>
</section>

<section class="section-wisata">
    <div class="container">

        <!-- TAB -->
        <div class="tabs">
            <button class="tab" data-tab="destinasi" onclick="showTab(event, 'destinasi')">Destinasi</button>
            <button class="tab" data-tab="kuliner" onclick="showTab(event, 'kuliner')">Kuliner</button>
            <button class="tab" data-tab="budaya" onclick="showTab(event, 'budaya')">Budaya</button>
        </div>

        <!-- DESTINASI -->
        <div id="destinasi" class="tab-content {{ ($tab ?? 'destinasi') == 'destinasi' ? 'active' : '' }}">
            <h2>Destinasi Wisata</h2>
            <p>Temukan tempat-tempat menakjubkan di Kabupaten Poso</p>

            @if($destinasi->count() > 0)
            <div class="card-grid">
                @foreach ($destinasi as $item)

                @php
                    // Default
                    $icon = 'bi-geo-alt-fill';
                    $badgeColor = '#6c757d';

                    // Kondisi berdasarkan jenis
                    if ($item->jenis == 'Jelajah Gua') {
                        $icon = 'fas fa-monument';
                        $badgeColor = 'orange';
                    } elseif ($item->jenis == 'Pemandian') {
                        $icon = 'bi bi-water';
                        $badgeColor = 'green';
                    } elseif ($item->jenis == 'Dataran Tinggi') {
                        $icon = 'bi bi-tree-fill';
                        $badgeColor = 'green';
                    } elseif ($item->jenis == 'Padang') {
                        $icon = 'bi bi-tree-fill';
                        $badgeColor = 'success';
                    } elseif ($item->jenis == 'Taman') {
                        $icon = 'bi bi-flower1';
                        $badgeColor = 'pink';
                    } elseif ($item->jenis == 'Pantai') {
                        $icon = 'bi bi-water';
                        $badgeColor = 'blue';
                    } elseif ($item->jenis == 'Megalith') {
                        $icon = 'fas fa-monument';
                        $badgeColor = 'red';
                    } elseif ($item->jenis == 'Restoran & Cafe') {
                        $icon = 'bi bi-cup-hot-fill';
                        $badgeColor = 'red';
                    }elseif ($item->jenis == 'Penginapan') {
                        $icon = 'bi bi-house-door-fill';
                        $badgeColor = 'warning';
                    }
                @endphp

                <div>
                    <div class="tour-card" data-id="{{ $item->id }}">

                        <div class="tour-img">
                            <img src="{{ asset('storage/' . $item->foto) }}">
                            <div class="overlay"></div>

                            <span class="badge-category {{ $badgeColor }}">
                                <i class="{{ $icon }}"></i>
                                {{ $item->jenis }}
                            </span>

                            <div class="tour-text">
                                <h5>{{ $item->nama }}</h5>
                                <p>{{ $item->kategori }}</p>
                            </div>
                        </div>

                        <div class="tour-body">

                            <div class="d-flex justify-content-between">
                                <span class="location" title="{{ $item->lokasi }}">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    {{ $item->lokasi }}
                                </span>

                                <span class="rating-stars" id="rating-{{ $item->id }}">
                                ★★★★★ 0.0
                                </span>
                            </div>

                            <p class="desc">
                                {{ Str::limit($item->deskripsi, 500) }}
                            </p>

                            <a class="btn-link"
                            data-bs-toggle="modal"
                            data-bs-target="#modalDestinasi{{ $item->id }}">
                                Lihat Selengkapnya
                                <i class="bi bi-arrow-right arrow-icon"></i>
                            </a>

                        </div>
                    </div>
                </div>
                
                @include ('../modal/modal_destinasi')
                @endforeach
                
                <script src="{{ asset('js/rating.js') }}"></script>
            </div>
            @else

            <div class="text-center py-5">
                <h4 class="text-muted">
                    Tidak ada data yang sesuai
                </h4>
            </div>

        @endif
        </div>

        <!-- KULINER -->
        <div id="kuliner" class="tab-content {{ ($tab ?? '') == 'kuliner' ? 'active' : '' }}">
            <h2>Kuliner Daerah</h2>
            <p>Nikmati makanan khas dari berbagai daerah</p>

            <div class="card-grid">
                @foreach ($kuliner as $item)
                @php
                    // Default
                    $icon = 'bi-geo-alt-fill';
                    $badgeColor = '#6c757d';

                    // Kondisi berdasarkan jenis
                    if ($item->jenis == 'Metode Memasak') {
                        $icon = 'bi bi-fire'; 
                        $badgeColor = 'red';
                    } elseif ($item->jenis == 'Makanan Berkuah') {
                        $icon = 'bi bi-cup-hot-fill';
                        $badgeColor = 'blue'; // biru
                    } elseif ($item->jenis == 'Kue Tradisional') {
                        $icon = 'bi bi-cookie';
                        $badgeColor = 'orange';
                    } elseif ($item->jenis == 'Area Camping') {
                        $icon = 'bi-house-door-fill'; // icon tenda/camping
                        $badgeColor = 'red';
                    }
                @endphp
                
                <div>
                    <div class="tour-card">

                        <div class="tour-img">
                            <img src="{{ asset('storage/' . $item->foto) }}">
                            <div class="overlay"></div>
                            <span class="badge-category {{ $badgeColor }}">
                                <i class="{{ $icon }}"></i>
                                {{ $item->jenis }}
                            </span>

                            <div class="tour-text">
                                <h5>{{ $item->nama }}</h5>
                                <p>{{ $item->tagline }}</p>
                            </div>
                        </div>

                        <div class="tour-body">

                            <div class="d-flex justify-content-between">
                                <span class="location" >
                                    <i class="bi bi-geo-alt-fill"></i>
                                    {{ $item->bahan_utama }}
                                </span>
                            </div>

                            <p class="desc">
                                {{ Str::limit($item->deskripsi, 500) }}
                            </p>

                            <a class="btn-link"
                            data-bs-toggle="modal"
                            data-bs-target="#modalKuliner{{ $item->id }}">
                                Lihat Selengkapnya
                                <i class="bi bi-arrow-right arrow-icon"></i>
                            </a>

                        </div>
                    </div>
                </div>
                @include ('../modal/modal_kuliner')
                @endforeach
                
                <script src="{{ asset('js/rating_kuliner.js') }}"></script>

            </div>
        </div>

        <!-- BUDAYA -->
        <div id="budaya" class="tab-content {{ ($tab ?? '') == 'budaya' ? 'active' : '' }}">
            <h2>Budaya Kabupaten Poso</h2>
            <p>Kenali kekayaan budaya yang ada di Kabupaten Poso</p>

            <div class="card-grid">
                @foreach ($budaya as $item)

                @php
                    // Default
                    $icon = 'bi-geo-alt-fill';
                    $badgeColor = '#6c757d';

                    // Kondisi berdasarkan jenis
                    if ($item->jenis == 'Upacara Adat') {
                        $icon = 'bi bi-bank'; 
                        $badgeColor = 'orange';
                    } elseif ($item->jenis == 'Tarian Daerah') {
                        $icon = 'bi bi-person-arms-up';
                        $badgeColor = 'cyan'; // biru
                    } elseif ($item->jenis == 'Alat Musik') {
                        $icon = 'bi bi-music-note-beamed';
                        $badgeColor = 'green';
                    } elseif ($item->jenis == 'Pakaian Tradisional') {
                        $icon = 'bi bi-person-badge'; // icon tenda/camping
                        $badgeColor = 'red';
                    }
                @endphp
                <div>
                    <div class="tour-card">

                        <div class="tour-img">
                            <img src="{{ asset('storage/' . $item->foto) }}">
                            <div class="overlay"></div>
                            <span class="badge-category {{ $badgeColor }}">
                                <i class="{{ $icon }}"></i>
                                {{ $item->jenis }}
                            </span>

                            <div class="tour-text">
                                <h5>{{ $item->nama }}</h5>
                            </div>
                        </div>

                        <div class="tour-body">

                            <p class="desc">
                                {{ Str::limit($item->deskripsi, 500) }}
                            </p>

                            <a class="btn-link"
                            data-bs-toggle="modal"
                            data-bs-target="#modalBudaya{{ $item->id }}">
                                Lihat Selengkapnya
                                <i class="bi bi-arrow-right arrow-icon"></i>
                            </a>

                        </div>
                    </div>
                </div>
                @include ('../modal/modal_budaya')
                @endforeach

            </div>
        </div>

    </div>
</section>

@include ('../modal/modal_komentar')
@include ('templates/footer')
<script src="{{ asset('js/destinasi.js') }}"></script>
<script src="{{ asset('js/bahasabaru.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>