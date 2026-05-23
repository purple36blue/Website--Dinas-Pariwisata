<div class="modal fade" id="commentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content comment-modal">

            <!-- HEADER -->
            <div class="modal-header comment-header">

                <div class="d-flex align-items-center gap-2">
                    <div class="comment-icon">
                        <i class="bi bi-chat-dots-fill"></i>
                    </div>

                    <div>
                        <h5 class="modal-title mb-0" data-id="kol_kom">
                            Kotak Komentar
                        </h5>

                        <small class="text-muted">
                            Diskusi & Tanya Jawab
                        </small>
                    </div>
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body comment-body">

                <!-- CHAT -->
                <div class="chat-box" id="chatBox">

                    <!-- USER -->
                    <!--
                    <div class="chat-item chat-user">
                        <span class="chat-name">Lady Bontinge</span>

                        <div class="chat-bubble">
                            Halo admin 👋
                        </div>
                    </div>
                    -->

                    <!-- ADMIN -->
                    <!--
                    <div class="chat-item chat-admin">
                        <span class="chat-name">Admin</span>

                        <div class="chat-bubble">
                            Halo, ada yang bisa dibantu?
                        </div>
                    </div>
                    -->

                </div>

                <!-- FORM -->
                <form id="chatForm" class="chat-form">

                    <input type="text"
                        id="nama"
                        name="nama"
                        class="form-control"
                        data-id="input_nama"
                        placeholder="Masukan nama anda..."
                        required>

                    <textarea id="pesan"
                            name="pesan"
                            class="form-control"
                            data-id="input_pesan"
                            placeholder="Tulis pesan..."
                            required></textarea>

                    <input type="hidden"
                        id="role"
                        name="role"
                        value="user">

                    <button type="submit"
                            class="btn-send"
                            data-id="btn_cmt">

                        <i class="bi bi-send-fill"></i>
                        Kirim

                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/komentar.js') }}"></script>