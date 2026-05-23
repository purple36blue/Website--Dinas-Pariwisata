<div class="modal fade"
    id="modalDestinasi{{ $item->id }}"
    data-id="{{ $item->id }}"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">

        <div class="modal-content destination-modal">

            <!-- HEADER IMAGE -->
            <div class="modal-header-custom">
                <button type="button"
                    class="btn-close-custom"
                    data-bs-dismiss="modal">
                    ✕
                </button>

                <img src="{{ asset('storage/' . $item->foto) }}" class="header-img">
                <div class="dark-overlay"></div>

                <div class="header-overlay-content">
                    
                    <div class="top-badge">
                        <span class="badge-category">
                            {{ $item->jenis }}
                        </span>
                    </div>

                    <div class="header-content">

                        <div class="title-rating">
                            <h2>{{ $item->nama }}</h2>

                            <span class="rating-box" id="avg-rating-{{ $item->id }}">
                                ★★★★★ 0.0
                            </span>
                        </div>

                        <p>{{ $item->lokasi }}</p>

                    </div>

                </div>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <div class="row g-4">

                    <!-- LEFT -->
                    <div class="col-lg-8">

                        <!-- DESKRIPSI -->
                        <div class="info-card">

                            <h5>
                                <i class="bi bi-text-paragraph"></i>
                                Deskripsi
                            </h5>

                            <p>
                                {{ $item->deskripsi }}
                            </p>

                        </div>

                        <!-- FASILITAS -->
                        <div class="info-card">

                            <h5>
                                <i class="bi bi-grid"></i>
                                Fasilitas
                            </h5>

                            <div class="facility-grid">

                                <div class="facility-item">
                                    <i class="bi bi-camera-fill"></i>
                                    Spot Foto
                                </div>

                                <div class="facility-item">
                                    <i class="bi bi-tree-fill"></i>
                                    Area Picnic
                                </div>

                                <div class="facility-item">
                                    <i class="bi bi-cup-hot-fill"></i>
                                    Tempat Makan
                                </div>

                                <div class="facility-item">
                                    <i class="bi bi-wifi"></i>
                                    WiFi Area
                                </div>

                                <div class="facility-item">
                                    <i class="bi bi-car-front-fill"></i>
                                    Area Parkir
                                </div>

                                <div class="facility-item">
                                    <i class="bi bi-droplet-fill"></i>
                                    Toilet Umum
                                </div>

                            </div>

                        </div>

                        <!-- MAP -->
                        <div class="info-card">

                            <h5>
                                <i class="bi bi-geo-alt-fill"></i>
                                Lokasi
                            </h5>

                            <iframe
                                src="{{$item->koordinat}}"
                                width="100%"
                                height="250"
                                style="border:0;border-radius:15px;"
                                allowfullscreen=""
                                loading="lazy">
                            </iframe>

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-4">

                        <div class="ticket-box">

                            <h5>
                                <i class="bi bi-ticket-fill"></i>
                                Informasi Tiket
                            </h5>

                            <div class="price-box">
                                <small>Harga Tiket</small>
                                <h3>Rp {{ $item->harga }}</h3>
                            </div>

                            <div class="schedule-grid">

                                <div>
                                    <small>Jam Operasional</small>
                                    <p>
                                        {{ $item->jam_operasional }}
                                    </p>
                                </div>

                            </div>

                            <div class="comment-list mt-3" id="comment-list-{{ $item->id }}">
                            </div>

                            <button class="btn-ticket"
                                data-bs-toggle="modal"
                                data-bs-target="#modalRating{{ $item->id }}">
                                
                                <i class="bi bi-star-fill"></i>
                                Beri Penilaian
                            </button>

                            <button class="btn-favorite">
                                <i class="bi bi-bookmark"></i>
                                Simpan Favorit
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

@include ('../modal/modal_rating')