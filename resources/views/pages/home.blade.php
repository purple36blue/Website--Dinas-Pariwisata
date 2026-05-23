<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/comment.css">
    <link rel="stylesheet" href="styles/modal_home.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Beranda</title>
</head>
<body>
@include('../templates/navbar')

<!-- HERO CAROUSEL -->
<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <div class="carousel-inner ">

        <div class="carousel-item active">
            <img src="{{ asset('images/danau_poso.jpg') }}" class="d-block w-100 hero-img">
            
            <div class="carousel-caption-custom ">
                <h1 data-id="home_carousel1">Danau Poso</h1>
                <p data-id="text_carousel1">Keindahan danau tektonik terbesar ketiga di Indonesia</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/gua_pamona.png') }}" class="d-block w-100 hero-img">

            <div class="carousel-caption-custom">
                <h1 data-id="home_carousel2">Gua Latea</h1>
                <p data-id="text_carousel2">Situs peninggalan sejarah dan keindahan tiada tara</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/saluopa.jpg') }}" class="d-block w-100 hero-img">

            <div class="carousel-caption-custom">
                <h1 data-id="home_carousel3">Air Terjun Wera Saluopa</h1>
                <p data-id="text_carousel3">Kesegaran dan kejernihan 12 tingkat jantung hutan tropis  </p>
            </div>
        </div>

    </div>

    <!-- 🔥 CONTENT -->
    <div class="hero-content text-center">

        <div class="mt-4">
            <a href="/destinasi" class="btn btn-explore" data-id="btncarousel1">Mulai Menjelajah →</a>
            <a href="/profil" class="btn btn-about" data-id="btncarousel2" >Tentang Kami</a>
        </div>
    </div>

</div>

<!-- SEARCH -->
<form action="{{ route('destinasi') }}" method="GET">
<div class="search-container reveal">
    <div class="search-box">
        <h4 class="text-center mb-3" data-id="text_home1">
            Temukan Tujuan Wisatamu di <b>Kabupaten Poso</b>
        </h4>

        <div class="row g-3">
            <div class="col-md-3 col-6">
                <select class="form-select" name="kategori">
                    <option data-id="filter1" value="">Kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item }}">
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 col-6">
                <select class="form-select" name="jenis">
                    <option data-id="filter2" value="">Jenis</option>
                    @foreach ($jenis as $item)
                        <option value="{{ $item }}">
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 col-6">
                <select class="form-select" name="wilayah">
                    <option data-id="filter3" value="">Wilayah</option>
                    @foreach ($wilayah as $item)
                        <option value="{{ $item }}">
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 col-6">
                    <button type="submit"
                        class="btn btn-search w-100"
                        data-id="filter_search">
                        Cari 🔍
                    </button>
            </div>
        </div>
    </div>
</div>
</form>

<!-- CONTENT -->
<section class="welcome-section text-center mt-5 px-3">
    <h1 class="title reveal" data-id="home_title1">Selamat Datang di Dinas Pariwisata Kabupaten Poso</h1>
    <p class="welcome mt-3 reveal" data-id="home_description1">
        Dinas Pariwisata berkomitmen untuk memajukan sektor pariwisata,
        melestarikan budaya, dan meningkatkan kualitas destinasi wisata 
        yang ada di Kabupaten Poso.
    </p>
    
    <section class="stats-section container py-5">

        <div class="stats-wrapper">

            <!-- Gambar kiri -->
            <div class="stats-img left-img reveal">
                <img src="{{ asset('images/adat_pria.png') }}" alt="Pria Adat">
            </div>

            <!-- CARD -->
            <div class="stats-card reveal">

                <h1 class="text-center mb-4" data-id="card_stat">Data Pariwisata</h1>

                <div class="row text-center">

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="stat-box">
                            <i class="bi bi-geo-alt-fill"></i>
                            <h3 class="counter" data-target="{{ $totalDestinasi }}">0</h3>
                            <p data-id="stat_des">Destinasi</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="stat-box">
                            <i class="bi bi-cup-hot-fill"></i>
                            <h3 class="counter" data-target="{{ $totalKuliner }}">0</h3>
                            <p data-id="stat_kul">Kuliner</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="stat-box">
                            <i class="bi bi-bank2"></i>
                            <h3 class="counter" data-target="{{ $totalBudaya }}">0</h3>
                            <p data-id="stat_bud">Budaya</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="stat-box">
                            <i class="bi bi-calendar-event-fill"></i>
                            <h3 class="counter" data-target="{{ $totalAcara }}">0</h3>
                            <p data-id="stat_ac">Acara</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="stat-box">
                            <i class="bi bi-people-fill"></i>
                            <h3 class="counter" data-target="{{ $totalPegawai }}">0</h3>
                            <p data-id="stat_peg">Pegawai</p>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Gambar kanan -->
            <div class="stats-img right-img reveal">
                <img src="{{ asset('images/adat_wanita.png') }}" alt="Wanita Adat">
            </div>

        </div>

    </section>
</section>

<section class="container-fluid py-5 text-center px-3 reveal">

    <h1 class="fw-bold" data-id="home_title2">Jelajahi Keindahan Pariwisata di Kabupaten Poso</h1>
    <p class="text-muted" data-id="home_description2">
        Temukan berbagai pilihan destinasi dan pengalaman wisata yang menakjubkan
    </p>

    @php
        $stats = [
            ['label'=>'Destinasi Wisata','tab'=>'destinasi','value'=>$destinasi,'color'=>'green','icon'=>'bi-geo-alt', 'rating'=>'rating'],
            ['label'=>'Kuliner','tab'=>'budaya','value'=>$kuliner,'color'=>'blue','icon'=>'bi-cup-hot', 'rating'=>'kulrating'],
            ['label'=>'Budaya','tab'=>'kuliner','value'=>$budaya,'color'=>'cyan','icon'=>'bi-bank', 'rating'=>'bulrating'],
        ];
    @endphp

    <div class="row mt-4 g-3">

    @foreach ( $stats as $stat)
    
    @php
        $item = $stat['value'];
    @endphp

    <!-- CARD 1 -->
    @if($item) {{-- supaya tidak error kalau kosong --}}

    <div class="col-lg-4 col-md-6 d-flex">
        <div class="tour-card">

            <div class="tour-img">
                <img src="{{ asset('storage/' . $item->foto) }}">
                <div class="overlay"></div>

                <!-- BADGE -->
                <span class="badge-category {{ $stat['color'] }}" data-translate 
                data-key="stat-label-{{ $loop->index }}" data-original="{{ $stat['label']}}">
                    <i class="bi {{ $stat['icon'] }}"></i>
                    {{ $stat['label'] }}
                </span>

                <div class="tour-text">
                    <h5 data-translate data-key="nama-{{ $item->id }}" data-original="{{ $item->nama }}">{{ $item->nama }}</h5>
                    <p data-translate data-key="tagline-{{ $item->id }}" data-original="{{ $item->deskripsi_singkat }}">{{ $item->deskripsi_singkat }}</p>
                </div>
            </div>

            <div class="tour-body">

                <div class="d-flex justify-content-between">
                    <span class="location" data-translate data-key="lokasi-{{ $item->id }}" data-original="{{ $item->lokasi }}">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $item->lokasi }}
                    </span>

                </div>

                <p class="desc" data-translate data-key="deskripsi-{{ $item->id }}" data-original="{{ $item->deskripsi }}">
                    {{ Str::limit($item->deskripsi, 500) }}
                </p>

                <a href="{{ route('destinasi', ['tab' => strtolower($stat['label'])]) }}"
                    class="btn-link">
                    <span data-id="next">
                    Jelajahi Lebih Lanjut
                    </span>
                    <i class="bi bi-arrow-right arrow-icon"></i>

                </a>

            </div>
        </div>
    </div>

    @endif
    @endforeach
    </div>
</section>

<section class="select-destination py-5 text-center px-3 reveal">
        <div class="pilihan-destinasi mt-3">
        <h1 class="fw-bold" data-id="home_title3">Pilih Destinasi Wisata Yang Ingin ANda Kunjungi</h1>
        <p class="text-muted" data-id="home_description3">
            Ada Banyak Pilihan Destinasi Wisata yang dapat anda kunjungi, mulai dari Situs Bersejarah, Megalith, Pemandian, Dataran Tinggi, Pantai, dan lain sebaganya.
        </p>

        <div class="row mt-4 g-3">
            @foreach ( $jenis_destinasi as $item)
            @php
                    // Default
                    $icon = 'bi-geo-alt-fill';
                    $badgeColor = '#6c757d';

                    // Kondisi berdasarkan jenis
                    if ($item->jenis == 'Jelajah Gua') {
                        $icon = 'fas fa-monument'; // icon gua
                        $badgeColor = 'orange';
                    } elseif ($item->jenis == 'Pemandian') {
                        $icon = 'bi bi-water'; // icon gelombang
                        $badgeColor = 'blue'; // biru
                    } elseif ($item->jenis == 'Dataran Tinggi') {
                        $icon = 'bi bi-tree-fill'; // icon tenda/camping
                        $badgeColor = 'green';
                    } elseif ($item->jenis == 'Area Camping') {
                        $icon = 'bi-house-door-fill'; // icon tenda/camping
                        $badgeColor = 'red';
                    }
            @endphp

        <div class="col-lg-4 col-md-6 d-flex">
            <div class="tour-card">

            <div class="tour-img">
                <img src="{{ asset('storage/' . $item->foto) }}">
                <div class="overlay"></div>

                <!-- BADGE -->
                <span class="badge-category {{ $badgeColor }}" data-translate 
                data-key="jendes-{{ $item->jenis }}" data-original="{{ $item->jenis}}">
                    <i class="bi {{ $icon }}"></i>
                    {{ $item -> jenis }}
                </span>

                <div class="tour-text">
                    <h5 data-translate data-key="namajendes-{{ $item->id }}" data-original="{{ $item->nama }}">{{ $item->nama }}</h5>
                    <p data-translate data-key="taglinejendes-{{ $item->id }}" data-original="{{ Str::limit($item->deskripsi_singkat, 50) }}">{{ Str::limit($item->deskripsi_singkat, 50) }}</p>
                </div>
            </div>

            <div class="tour-body">

                <div class="d-flex justify-content-between">
                    <span class="location" data-translate data-key="lokasijendes-{{ $item->id }}" data-original="{{ $item->lokasi }}">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $item->lokasi }}
                    </span>

                    <span class="rating-stars" id="rating-{{ $item->id }}">
                                ★★★★★ 0.0
                    </span>
                </div>

                <p class="desc" data-translate data-key="deskripsijendes-{{ $item->id }}" data-original="{{ $item->deskripsi }}">
                    {{ Str::limit($item->deskripsi, 500) }}
                </p>

                <a href="/destinasi"
                    class="btn-link">
                    <span data-id="next">
                    Jelajahi Lebih Lanjut
                    </span>
                    <i class="bi bi-arrow-right arrow-icon"></i>

                </a>

            </div>
        </div>
        </div>
    @endforeach
    </div>

</section>

<!-- SECTION EVENT TERBARU -->
<section class="container py-5 reveal">
    <h1 class="text-center fw-bold" data-id="new_ev">Event Terbaru</h1>
    <p class="text-center text-muted mb-4" data-id="des_ev">
        Ikuti berbagai event menarik di Kabupaten Poso
    </p>

    <div class="row g-4">
        @foreach ($acara as $item)

        @php 
            if($item->status == 'Mendatang') {
                $badgecolor = 'blue';
            }elseif ($item->status == 'Sedang Berlangsung') {
                $badgecolor = 'green';
            }elseif ($item->status == 'Selesai') {
                $badgecolor = 'red';
            }
        @endphp

        <!-- EVENT 1 -->
        <div class="col-lg-4 col-md-6 d-flex">
            <div class="tour-card">

                <div class="tour-img">
                    <img src="{{ asset('storage/' . $item->foto) }}">
                    <div class="overlay"></div>

                    <!-- BADGE -->
                    <div class="badge-category {{ $badgecolor}} d-flex">
                        <i class="bi bi-calendar2-event-fill me-2"></i>
                    <span data-translate data-key="status-{{ $item->id }}" data-original="{{ $item->status }}">
                        {{ $item->status }}
                    </span>
                    </div>

                    <div class="tour-text">
                        <h5 data-translate data-key="namaev-{{ $item->id }}" data-original="{{ $item->nama }}">{{ $item->nama }}</h5>
                        <p> @if (\Carbon\Carbon::parse($item->mulai)->format('mY') == \Carbon\Carbon::parse($item->akhir)->format('mY'))
                                {{ \Carbon\Carbon::parse($item->mulai)->format('d') }} - {{ \Carbon\Carbon::parse($item->akhir)->format('d F Y') }}
                            @else
                                {{ \Carbon\Carbon::parse($item->mulai)->format('d F') }} - {{ \Carbon\Carbon::parse($item->akhir)->format('d F Y') }}
                            @endif</p>
                    </div>
                </div>

                <div class="tour-body">

                    <div class="d-flex ">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="location ms-2" title="{{ $item->lokasi }}" data-translate data-key="lokasiev-{{ $item->id }}" data-original="{{ $item->lokasi }}">
                            {{ $item->lokasi }}
                        </span>
                    </div>

                    <p class="desc" data-translate data-key="deskripsiev-{{ $item->id }}" data-original="{{ $item->deskripsi }}">
                        {{ Str::limit($item->deskripsi, 500) }}
                    </p>

                    <a href="/acara" class="btn-link">
                        <span data-id="next">
                        Jelajahi Lebih Lanjut
                        </span>
                        <i class="bi bi-arrow-right arrow-icon"></i>
                    </a>

                </div>
            </div>
        </div>

        @endforeach

    </div>
</section>

<section class="video-card-section reveal">
    <div class="video-card">

        <!-- KONTEN -->
        <div class="video-content">
            <span class="tag" data-id="vid_title">Budaya Kabupaten Poso</span>

            <h2 data-id="vid_lable">Upacara Adat Poso</h2>

            <p data-id="des_video">
                Saksikan keindahan tradisi adat masyarakat Pamona di Poso,
                Sulawesi Tengah. Video ini menampilkan proses budaya,
                kebersamaan masyarakat, dan warisan leluhur yang terus dijaga
                hingga saat ini.
            </p>

            <div class="video-info">
                <div class="info-box">
                    <i class="bi bi-play-circle-fill"></i>
                    <span data-id="vid_bud">Video Budaya</span>
                </div>

                <div class="info-box next-video" style="cursor:pointer;">
                    <i class="bi bi-camera-video-fill"></i>
                    <span data-id="next_vid">Video Selanjutnya</span>
                </div>
            </div>
        </div>

        <!-- VIDEO -->
        <div class="video-wrapper">

            <div class="video-overlay">
                <h4 data-id="min_title">Budaya & Tradisi Kabupaten Poso</h4>
                <p data-id="min_des">Warisan budaya yang tetap hidup</p>
            </div>

            <iframe
                id="youtubeVideo"
                src="https://www.youtube.com/embed/BOLuZYsvkMs?mute=1&playsinline=1"
                title="YouTube video player"
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen>
            </iframe>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="card-text container py-5 reveal">
    <div class="cta-box text-center">
        <h2 data-id="cta_box">Siap Menjelajahi Kabupaten Poso?</h2>
        <p data-id="cta_des">Temukan destinasi wisata impian Anda dan rasakan pengalaman yang tak terlupakan</p>

        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="/tourism" class="btn-destinasi" data-id="see_des">
                Lihat Destinasi →
            </a>

            <a href="/acara" class="btn-event" data-id="see_ev">
                Lihat Acara
            </a>
        </div>
    </div>
</section>

<section class="comment-section reveal">
    <div class="contact-box">

    <!-- LEFT -->
        <div class="contact-info">
            <div class="d-flex">
            <h2 data-id="contact_h2">Hubungi </h2>
             <h2 class="contact-us" data-id="contact_us">Kami</h2>
            </div>
            <p data-id="contact_p">Kami siap membantu Anda...</p>

            <div class="info-item d-flex">
                <i class="bi bi-geo-alt-fill text-primary"></i>
                <div>
                    <h5 data-id="add_off">Alamat Kantor</h5>
                    <p data-id="address_p">Jl. Raja Moili No.1, Poso</p>
                </div>
            </div>

            <div class="info-item d-flex">
                <i class="bi bi-telephone-fill text-primary"></i>
                <div>
                    <h5 data-id="home_tlp">Telepon</h5>
                    <p>+62 812-xxxx</p>
                </div>
            </div>

            <div class="info-item">
                <i class="bi bi-envelope-at-fill text-primary"></i>
                <div>
                    <h5>Email</h5>
                    <p>dispar@posokab.go.id</p>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="contact-form">
            <h3 data-id="home_send">Kirim Pesan</h3>

            <form action="{{url ('/comment')}}" method="POST">
                @csrf
                <input type="text" name="nama" placeholder="Nama Lengkap" data-id="home_name" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="pesan" placeholder="Pesan..." data-id="home_mess" required></textarea>
                <input type="hidden" name="role" value="user">

                <button type="submit" data-id="just_send">Kirim<i class="bi bi-send-fill"></i></button>

            </form>
        </div>

    </div>
</section>

@include ('../modal/modal_komentar')
@include ('../templates/footer')

<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/bahasabaru.js') }}"></script>
<script src="{{ asset('js/rating.js') }}"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div id="loadingTranslate" class="loading-overlay">
    <div class="spinner"></div>
    <p>Menerjemahkan...</p>
</div>
</body>
</html>
