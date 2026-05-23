<div class="modal fade"
    id="modalKuliner{{ $item->id }}"
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

                            <span class="rating-stars">
                                ★★★★★ {{ $item->rating }}
                            </span>
                        </div>

                        <p>{{ $item->lokasi }}</p>

                    </div>

                </div>

            </div>

            <!-- BODY -->
            <div class="modal-body">

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

                        <div class="info-card">

                            <h5>
                                <i class="bi bi-play-circle-fill"></i>
                                Video Destinasi
                            </h5>

                            <iframe
                                width="100%"
                                height="250"
                                src="{{ $item->video }}"
                                title="Video Destinasi"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                style="border-radius:15px;">
                            </iframe>

                        </div>

                    </div>

                </div>

            </div>
</div>
