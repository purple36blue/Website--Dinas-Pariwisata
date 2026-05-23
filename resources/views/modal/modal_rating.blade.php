<div class="modal fade" id="modalRating{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Beri Penilaian</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body rating-modal" data-id="{{ $item->id }}" data-type="destinasi">

                <!-- BINTANG -->
                <div class="star-rating">
                    <i class="bi bi-star star" data-value="1"></i>
                    <i class="bi bi-star star" data-value="2"></i>
                    <i class="bi bi-star star" data-value="3"></i>
                    <i class="bi bi-star star" data-value="4"></i>
                    <i class="bi bi-star star" data-value="5"></i>
                </div>

                <!-- KOMENTAR -->
                <textarea class="form-control mt-2 komentar-input"
                    placeholder="Tulis komentar..."></textarea>

                <!-- BUTTON -->
                <button class="btn btn-primary mt-3 btn-submit-rating">
                    Kirim
                </button>

            </div>

        </div>
    </div>
</div>
