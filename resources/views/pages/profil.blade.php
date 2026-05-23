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
    <link rel="stylesheet" href="styles/profil.css">
    <link rel="stylesheet" href="styles/comment.css">
    <title>Profil</title>
</head>
<body>
@include ('../templates/navbar')
    <div>
    <!-- HEADER -->
    <section id="heroCarousel" class="heroCarousel">
        <div class="overlay"></div>
        <div class="header-wisata">
            <h1 data-id="profil_title">PROFIL DINAS PARIWISATA</h1>
            <p data-id="profil_tag">Mengenal informasi terkait Dinas Pariwisata Kabupaten Poso</p>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="container py-5">

        <!-- TAB MENU -->
        <div class="profile-tab-wrapper text-center mb-4" id="profileTab">

    <button class="profile-tab active" data-target="history">Tentang Kami</button>
    <button class="profile-tab" data-target="vision">Visi & Misi</button>
    <button class="profile-tab" data-target="employees">Pegawai</button>
    <button class="profile-tab" data-target="duties">Tugas</button>

</div>

<!-- CONTENT -->
    <div class="profile-content">

        <div class="tab-pane active" id="history">
            <div class="container py-4">
            <div class="employee-header text-center mb-5">

                <span class="employee-badge">
                   PROFIL DINAS
                </span>

                <h2 class="employee-title">
                    Profil Dinas Pariwisata <br>
                    Kabupaten Poso
                </h2>

                <p class="employee-desc mx-auto">
                    Mengenal lebih lanjut informasi terkait Kantor Dinas Pariwisata Kabupaten Poso
                </p>

            </div>

                <div class="mt-3 mb-3">
                    <h4 class=" mb-3 text-center">Kepala Dinas</h4>

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 text-center">
                                <div class="card-body">
                                    
                                @foreach($pegawais as $pegawai)

                                    @if(strtolower($pegawai->jabatan) == 'kepala dinas pariwisata')
                                    
                                    <img src="{{ asset('storage/'. $pegawai->foto) }}" 
                                        class="rounded-circle mb-3"
                                        width="120" height="120"
                                        style="object-fit: cover;">

                                    <h5 class="fw-bold mb-1">{{$pegawai->nama}}</h5>
                                    <p class="text-muted mb-0">NIP: {{$pegawai->nip}}</p>
                                    @endif

                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- HEADER -->
                <div class="deskripsi mb-5">
                    <h2 class="text-primary text-center fw-bold">Dinas Pariwisata Kabupaten Poso</h2>
                    <p class="text-muted">
                        Kantor Dinas Kebuyadaan dan Pariwisata wilayah Kabupaten Poso, Sulawesi Tengah memiliki tugas untuk melaksanakan urusan pemerintahan Kabupaten Poso dalam bidang budaya dan pariwisata berdasarkan asas otonomi daerahnya. <br>
                        <br>
                        Melalui kantor Dinas pariwisata dan kebudayaan atau yang disingkan Disparbud ini, berbagai urusan pemerintah daerah terkait bidang pariwisata dan kebudayaan dilakukan. Adapun tugas Disparbud adalah sebagai pelaksana urusan 
                        pemerintah daerah pada bidang pariwisata dan pelestarian budaya di wilayah kerjanya. Fungsi Disparbud ialah merumuskan kebijakan bidang pariwisata, kesenian, kebudayaan dan perfilman, penyelenggara pariwisata dan kebudayaan, 
                        pembinaan dan pembimbingan pada pelaku pariwisata dan budaya di wilayah kerjanya, koordinator UPTD, hingga pelaporan dan koordinasi urusan pariwisata dan budaya. <br>
                        <br>
                        Terkait dengan tugas dan fungsinya, Disparbud berwenang untuk mengeluarkan izin-izin bidang pariwisata meliputi Izin Usaha Pariwisata untuk travel agent dan lainnya, mengurus Izin Tetap Usaha Pariwisata (ITUP), Tanda Daftar 
                        Usaha Pariwisata atau TDUP meliputi surat Tanda Daftar Usaha Jasa Perjalanan Wisata, Tanda Daftar Usaha Penyedia Akomodasi, Tanda daftar Usaha Kawasan Pariwisata, dan lainnya. Selain izin-izin bidang pariwisata, Disparbud juga 
                        memiliki wewenang dalam mengeluarkan izin terkait bidang kebudayaan seperti kegiatan kebudayaan, alih fungsi bangunan bersejarah dan lainnya. Untuk informasi lainnya Anda dapat berkunjung langsung pada kantor Disparbud terdekat, 
                        menghubungi kontak telepon, atau mengakses website resmi Disparbud untuk informasi umum.
                    </p>
                </div>


                <div class="row g-4">

                    <!-- INFORMASI KONTAK -->
                    <div class="kontak-info col-lg-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="title-info d-flex">
                                <i class="bi bi-geo-fill text-dark"></i> 
                                <h5 class="mb-3">Informasi Kantor</h5>
                                </div>

                                <p><strong>Alamat:</strong><br>
                                Jl. Contoh No.123, Kabupaten Poso, Sulawesi Tengah</p>

                                <p><strong>Telepon:</strong><br>
                                (0452) 123456</p>

                                <p><strong>Email:</strong><br>
                                dinaspariwisata@poso.go.id</p>

                                <hr>

                                <h6 class="text-dark"><i class="bi bi-globe-asia-australia"></i> Media Sosial</h6>
                                <div class="icon-kontak d-flex gap-3 mt-3">                                    
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- GOOGLE MAPS -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body p-2">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.071395226663!2d120.75527877404625!3d-1.38458343573952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d8ee5ccd29840e7%3A0xc6e8f51a0efe8f8!2sDinas%20Pariwisata%20Kab.%20Poso!5e1!3m2!1sid!2sid!4v1778832594284!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>

                </div>

                
            </div>
        </div>

        <div class="tab-pane" id="vision">
            <div class="row g-4 mb-5 mt-5">
                <div class="employee-header text-center mb-5">

                <span class="employee-badge">
                   VISI & MISI
                </span>

                <h2 class="employee-title">
                    Visi & Misi Dinas Pariwisata <br>
                    Kabupaten Poso
                </h2>

                <p class="employee-desc mx-auto">
                    Visi dan Misi Dinas Pariwisata Kabupaten Poso disusun selaras dengan Visi dan Misi Bupati Kabupaten Poso sebagai bagian dari upaya mendukung pembangunan daerah, khususnya dalam pengembangan sektor pariwisata, budaya, dan pelayanan kepada masyarakat.
                </p>

            </div>

            <div class="col-lg-6">
                
                <div class="info-card h-100">
                    <div class="card-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <h3>Visi</h3>

                    <p>
                        "KABUPATEN POSO YANG MAKIN MAJU, BERDAYA SAING DAN BERKELANJUTAN ”
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="info-card h-100">
                    <div class="card-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h3>Misi</h3>

                    <ul>
                        <li><b>Poso Pintar.</b> Meningkatkan Kualitas SDM yang Unggul, Berdaya Saing dan Berkarakter. </li>
                        <li><b>Pertanian Maju.</b> Mewujudkan Sektor Pertanian yang Modern, Maju dan Mandiri. </li>
                        <li><b>Pariwisata Beradaya Saing.</b> Mewujudkan Poso Menjadi Daerah Tujuan Wisata Utama di Sulawesi.</li>
                        <li><b>Poso Sehat.</b> Meningkatkan Layanan Kesehatan yang Prima, Merata dan Terjangkau Bagi Seluruh Masyarakat.</li>
                        <li><b>Poso Harmoni dan Sejahtera.</b> Mewujudkan Kehidupan Masyarakat yang Harmoni dan Sejahtera. </li>
                        <li><b>Poso Hebat.</b> Mewujudkan Transformasi Tata Kelola dan Birokrasi Yang Bersih dan Melayani.  </li>
                        <li><b>Poso Mantap Berkelanjutan.</b> Merevitalisasi Infrastruktur dalam Mendukung Pembangunan Berkelanjutan. </li>
                    </ul>
                </div>
            </div>

        </div>

        </div>

        <div class="tab-pane" id="employees">

            <div class="employee-section">

        <!-- HEADER -->
            <div class="employee-header text-center mb-5">

                <span class="employee-badge">
                    STRUKTUR PEGAWAI
                </span>

                <h2 class="employee-title">
                    Pegawai Dinas Pariwisata <br>
                    Kabupaten Poso
                </h2>

                <p class="employee-desc mx-auto">
                    Informasi kepala dinas dan pegawai yang berperan dalam pengembangan,
                    pengelolaan, serta pelayanan sektor pariwisata Kabupaten Poso.
                </p>

            </div>

        <!-- ========================= -->
        <!-- KEPALA DINAS -->
        <!-- ========================= -->

            @foreach($pegawais as $pegawai)

                @if(strtolower($pegawai->jabatan) == 'kepala dinas pariwisata')

                <div class="head-wrapper mb-5">

                    <div class="head-card">

                        <!-- FOTO -->
                        <div class="head-image-wrapper">

                            <img src="{{ asset('storage/'. $pegawai->foto) }}"
                                class="head-image">

                            <div class="head-overlay"></div>

                            <span class="head-label">
                                <i class="bi bi-award-fill"></i>
                                Kepala Dinas
                            </span>

                        </div>

                        <!-- CONTENT -->
                        <div class="head-content">

                            <h2>
                                {{ $pegawai->nama }}
                            </h2>

                            <p class="head-position">
                                {{ $pegawai->jabatan}}
                            </p>

                            <div class="head-divider"></div>

                            <p class="head-description">
                                Memimpin pelaksanaan kebijakan daerah pada sektor
                                pariwisata serta mengoordinasikan pengembangan
                                destinasi wisata Kabupaten Poso.
                            </p>

                        </div>

                    </div>

                </div>

                @endif

            @endforeach


    <!-- ========================= -->
    <!-- PEGAWAI LAINNYA -->
    <!-- ========================= -->

            <div class="staff-title-wrapper text-center mb-4">

                <h3 class="staff-title">
                    Pegawai dan Staff Pariwisata
                </h3>

                <p class="staff-desc">
                    Tim yang mendukung pelayanan dan pengembangan wisata daerah.
                </p>

            </div>

            <div class="row g-4 justify-content-center">

                @foreach($pegawais as $pegawai)

                    @if(strtolower(trim($pegawai->jabatan)) != strtolower('Kepala Dinas Pariwisata'))

                    <div class="col-lg-4 col-md-6">

                        <div class="employee-card">

                            <!-- IMAGE -->
                            <div class="employee-image-wrapper">

                                <img src="{{ asset('storage/'. $pegawai->foto) }}"
                                    class="employee-image">

                                <div class="employee-overlay"></div>

                            </div>

                            <!-- CONTENT -->
                            <div class="employee-content">

                                <h4>
                                    {{ $pegawai->nama }}
                                </h4>

                                <p class="employee-position">
                                    {{ $pegawai->jabatan }}
                                </p>

                                <p class="employee-nip">
                                    NIP: {{ $pegawai->nip }}
                                </p>

                            </div>

                        </div>

                    </div>

                    @endif

                @endforeach

            </div>

        </div>

        </div>

        <div class="tab-pane" id="duties">

    <div class="duties-section">

        <!-- HEADER -->
        <div class="duties-header text-center mb-5">

            <span class="duties-badge">
                TUGAS DAN FUNGSI
            </span>

            <h2 class="duties-title">
                Tugas Dinas Pariwisata <br>
                Kabupaten Poso
            </h2>

            <p class="duties-desc mx-auto">
                Tugas dan tanggung jawab Dinas Pariwisata dalam pengelolaan,
                pengembangan, promosi, dan pelayanan sektor pariwisata daerah.
            </p>

        </div>

        <!-- LIST TUGAS -->
        <div class="row g-4">

            @foreach($responsibilities as $item)

            <div class="col-lg-6">

                <div class="duty-card h-100">

                    <!-- NOMOR -->
                    <div class="duty-number">

                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}

                    </div>

                    <!-- CONTENT -->
                    <div class="duty-content">

                        <div class="duty-icon">
                            <i class="bi bi-check2-circle"></i>
                        </div>

                        <h4>
                            Tugas {{ $loop->iteration }}
                        </h4>

                        <p>
                            {{ $item['description'] }}
                        </p>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

    </div>
    </section>

</div>

@include ('../modal/modal_komentar')
@include ('../templates/footer')
<script src="{{ asset('js/profil.js') }}"></script>
<script src="{{ asset('js/bahasabaru.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>