<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/templates_admin.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Kolom Komentar Admin</title>
</head>
<body>
<div class="d-flex">

    <!-- Sidebar -->
    @include('../templates/sidebar')

    <!-- Main Content -->
    <main class="main-content d-flex flex-column" style="height:100vh;">

    <!-- HEADER -->
    <div class="p-3 border-bottom bg-white">
        <h5 class="mb-0">💬 Kolom Komentar</h5>
    </div>

    <!-- CHAT AREA -->
    <div id="chatBox" class="flex-grow-1 p-3" style="overflow-y:auto; background:#f5f5f5;">
        <!-- chat muncul di sini -->
    </div>

    <!-- INPUT -->
    <div class="d-flex justify-content-between align-items-center gap-2 p-3 border-top bg-white flex-wrap">

    <!-- FORM CHAT -->
        <form id="chatForm" class="d-flex gap-2 flex-grow-1">
            <input type="text" id="pesan" class="form-control" placeholder="Tulis pesan..." required>

            <input type="hidden" id="nama" value="admin">
            <input type="hidden" id="role" value="admin">
            <input type="hidden" id="email" value="admindipar@gmail.com">

            <button type="submit" class="btn btn-success">
                <i class="bi bi-send"></i>
            </button>
        </form>

        <!-- FILTER + HAPUS -->
        <div class="d-flex gap-2 align-items-center">
            <select id="filterRange" class="form-select w-auto">
                <option value="">Pilih Waktu</option>
                <option value="1">1 Bulan</option>
                <option value="3">3 Bulan</option>
                <option value="6">6 Bulan</option>
                <option value="all">Semua</option>
            </select>

            <button class="btn btn-danger" onclick="hapusByRange()">
                Hapus
            </button>
        </div>

    </div>
    </div>

    </main>
</div>
@include('../templates/footer_admin')

   <script src="{{ asset('js/komentar_admin.js') }}"></script> 
</body>
</html>