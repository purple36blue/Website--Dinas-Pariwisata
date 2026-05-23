<nav class="navbar navbar-expand-lg fixed-top navbar-transparent" id="navbar">
    <div class="container navbar-wrapper">

        <!-- LOGO + BRAND -->
        <div class="d-flex align-items-center gap-2">
            <img src="images/logo.png" alt="">
            <div class="d-flex flex-column brand-text">
                <a class="navbar-brand fw-bold m-0" href="/login" data-id="brand">
                    DINAS PARIWISATA KABUPATEN POSO
                </a>
                <span class="brand-small" data-id="brand_small">
                    Sulawesi Tengah
                </span>
            </div>
        </div>

        <!-- TOGGLER -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            ☰
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-center gap-3">

                <li>
                    <a class="nav-link" href="/beranda" data-id="nav_home">
                        BERANDA
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="/profil" data-id="nav_profile">
                        PROFIL
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="/destinasi" data-id="nav_dest">
                        DESTINASI
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="/acara" data-id="nav_event">
                        ACARA
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="/informasi" data-id="nav_info">
                        INFORMASI
                    </a>
                </li>


            <!-- GARIS PEMISAH -->
            <div class="nav-divider"></div>

            <!-- SEARCH BOX -->
            <div class="pencarian-box" id="searchBox">

                <input type="text"
                    id="searchInput"
                    class="search-input"
                    placeholder="Cari destinasi, budaya, kuliner...">

                <button class="search-btn"
                    onclick="toggleSearch()">

                    <i class="bi bi-search"></i>

                </button>

            </div>

            <!-- HASIL SEARCH -->
            <div class="search-result" id="searchResult"></div>

        </li>

                <!-- LANGUAGE -->
                <li class="lang-dropdown">
                    <a class="nav-link d-flex align-items-center gap-1"
                       onclick="toggleLanguage(event)">
                        <img id="flagIcon"
                             src="https://flagcdn.com/w20/id.png"
                             style="width:20px; height:14px">
                        <span id="langLabel">ID</span>
                    </a>
                </li>

                <!-- ICON PESAN -->
                <li class="icon-pesan">
                    <a class="nav-link d-flex align-items-center"
                       data-bs-toggle="modal"
                       data-bs-target="#commentModal"
                       onclick="openAddModal()">
                        <i class="bi bi-chat-dots-fill"></i>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<script src="{{ asset('js/navbar.js') }}"></script>
<script src="{{ asset('js/bahasabaru.js') }}"></script>
