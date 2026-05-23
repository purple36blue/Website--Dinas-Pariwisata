<div class="modal fade"
    id="modalBudaya{{ $item->id }}"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">

        <div class="modal-content destination-modal">

            <!-- HEADER IMAGE -->
            <div class="modal-header-custom">

                <img src="{{ asset('storage/' . $item->foto) }}"
                    class="header-img">

                <div class="dark-overlay"></div>

                <!-- TOP INFO -->
                <div class="top-badge">
                    <span class="badge-category {{ $badgeColor }}">
                        <i class="{{ $icon }}"></i>
                        {{ $item->jenis }}
                    </span>

                    <span class="rating-box">
                        ★★★★★ {{ $item->rating }}
                    </span>
                </div>

                <!-- TITLE -->
                <div class="header-content">
                    <h2>{{ $item->nama }}</h2>
                </div>

                <!-- CLOSE -->
                <button type="button"
                    class="btn-close-custom"
                    data-bs-dismiss="modal">
                    ✕
                </button>

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
