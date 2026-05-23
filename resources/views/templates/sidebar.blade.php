    <aside class="sidebar">
    <div id="toggleBtn" class="toggle-arrow" onclick="toggleSidebar()">
        ❯
    </div>

    <!-- Header + Logo -->
    <div class="sidebar-header d-flex align-items-center gap-3">

    <div class="logo-box">
        <a href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
    </div>

    <div>
        <h5 class="mb-0">Admin Panel</h5>
        <small>Dinas Pariwisata</small>
    </div>

</div>

    <!-- Menu -->
    <ul class="menu mt-4">

    <li>
        <a href="/admin">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>
    </li>

    <li>
        <a href="/admin_destinasi">
            <i class="bi bi-geo-alt"></i>
            Destinasi Wisata
        </a>
    </li>

    <li>
        <a href="/admin_kuliner">
            <i class="bi bi-cup-hot"></i>
            Kuliner
        </a>
    </li>

    <li>
        <a href="/admin_budaya">
            <i class="bi bi-bank"></i>
            Budaya
        </a>
    </li>

    <li>
        <a href="/admin_acara">
            <i class="bi bi-calendar-event"></i>
            Acara
        </a>
        </li>

        <li>
            <a href="/admin_pegawai">
                <i class="bi bi-people"></i>
                Pegawai
            </a>
        </li>

        <li>
            <a href="/admin_berita">
                <i class="bi bi-newspaper"></i>
                Berita
            </a>
        </li>

        <li>
            <a href="/admin_comment">
                <i class="bi bi-chat-right-dots"></i>
                Komentar
            </a>
        </li>

    </ul>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger mt-4 w-100">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>

</aside>