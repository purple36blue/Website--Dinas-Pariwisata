<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/acara.css">
    <link rel="stylesheet" href="styles/comment.css">
    <title>Event</title>
</head>
<body>
@include ('../templates/navbar')
<section class="heroCarousel" id="heroCarousel">
    <div class="overlay"></div>
    <div class="header-event">
        <h1>Acara & Festival</h1>
        <p>Ikuti berbagai acara wisata dan festival budaya menarik di Indonesia</p>
    </div>
</section>

<!-- CONTENT -->
<section class="container py-5">

    <!-- TAB -->
    <div class="tabs">
        <button class="tab {{ ($tab ?? 'mendatang') == 'mendatang' ? 'active' : '' }}"
            onclick="showTab(event, 'mendatang')">
            Acara Mendatang
        </button>

        <button class="tab {{ ($tab ?? '') == 'selesai' ? 'active' : '' }}"
            onclick="showTab(event, 'selesai')">
            Acara Sebelumnya
        </button>
    </div>

    <!-- UPCOMING -->
<!-- TAB CONTENT MENDATANG -->
    <div id="mendatang" class="tab-content {{ ($tab ?? '') == 'mendatang' ? 'active' : '' }}">

        <!-- HEADER -->
        <div class="event-header">

            <div class="event-title-box">

                <div class="event-icon">
                    <i class="bi bi-calendar-event"></i>
                </div>

                <div>
                    <h2>Acara Mendatang</h2>

                    <p>
                        Temukan berbagai acara menarik yang akan datang
                        di Kabupaten Poso.
                    </p>
                </div>

            </div>

        </div>

        <!-- GRID -->
        <div class="event-grid">

            @foreach ($acara->filter(fn($i) => strtolower(trim($i->status)) == 'mendatang') as $item)

            <div class="event-card reveal">

                <!-- IMAGE -->
                <div class="event-img">

                    <img src="{{ asset('storage/'. $item->foto) }}" alt="">

                </div>

                <!-- CONTENT -->
                <div class="event-content">

                    <!-- DATE -->
                    <div class="event-date">

                        <i class="bi bi-calendar-event"></i>

                        @if (\Carbon\Carbon::parse($item->mulai)->format('mY') == \Carbon\Carbon::parse($item->akhir)->format('mY'))

                            {{ \Carbon\Carbon::parse($item->mulai)->format('d') }}
                            -
                            {{ \Carbon\Carbon::parse($item->akhir)->format('d F Y') }}

                        @else

                            {{ \Carbon\Carbon::parse($item->mulai)->format('d F') }}
                            -
                            {{ \Carbon\Carbon::parse($item->akhir)->format('d F Y') }}

                        @endif

                    </div>

                    <!-- TITLE -->
                    <h4>
                        {{$item->nama}}
                    </h4>

                    <!-- DESC -->
                    <p class="event-desc">
                        {{ Str::limit($item->deskripsi, 160) }}
                    </p>

                    <!-- FOOTER -->
                    <div class="event-footer">

                        <span>
                            <i class="bi bi-geo-alt"></i>
                            {{ Str::limit($item->lokasi, 20) }}
                        </span>

                        <span>
                            <i class="bi bi-tag"></i>
                            Festival
                        </span>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

<!-- TAB CONTENT SELESAI -->
    <div id="selesai" class="tab-content {{ ($tab ?? '') == 'selesai' ? 'active' : '' }}">

        <!-- HEADER -->
        <div class="event-header">

            <div class="event-title-box">

                <div class="event-icon done">
                    <i class="bi bi-clock-history"></i>
                </div>

                <div>
                    <h2>Acara Sebelumnya</h2>

                    <p>
                        Dokumentasi acara dan festival yang telah
                        diselenggarakan sebelumnya.
                    </p>
                </div>

            </div>

        </div>

        <!-- GRID -->
        <div class="event-grid">

            @foreach ($acara->filter(fn($i) => strtolower(trim($i->status)) == 'selesai') as $item)

            <div class="event-card reveal">

                <!-- IMAGE -->
                <div class="event-img">

                    <img src="{{ asset('storage/'. $item->foto) }}" alt="">

                </div>

                <!-- CONTENT -->
                <div class="event-content">

                    <!-- DATE -->
                    <div class="event-date done-date">

                        <i class="bi bi-calendar-event"></i>

                        {{ \Carbon\Carbon::parse($item->mulai)->translatedFormat('d F Y') }}

                    </div>

                    <!-- TITLE -->
                    <h4>
                        {{$item->nama}}
                    </h4>

                    <!-- DESC -->
                    <p class="event-desc">
                        {{ Str::limit($item->deskripsi, 160) }}
                    </p>

                    <!-- FOOTER -->
                    <div class="event-footer">

                        <span>
                            <i class="bi bi-geo-alt"></i>
                            {{ Str::limit($item->lokasi, 10) }}
                        </span>

                        <span>
                            <i class="bi bi-tag"></i>
                            Festival
                        </span>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>


</section>

@include ('../modal/modal_komentar')
@include ('../templates/footer')
<script src="{{ asset('js/acara.js') }}"></script>
<script src="{{ asset('js/bahasabaru.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>