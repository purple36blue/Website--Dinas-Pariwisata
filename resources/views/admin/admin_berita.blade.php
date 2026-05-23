<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Berita</title>

    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/templates_admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    @include('../templates/sidebar')

    <!-- Main Content -->
    <main class="main-content">

        <div class="d-flex justify-content-between mb-4">
            <div>
                <h2 class="fw-bold">Kelola Data Berita</h2>
                <p class="text-muted">Tambah, edit, atau hapus data berita</p>
            </div>

            <button class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#beritaModal"
                onclick="openAddModal()">
                + Tambah Data
            </button>
        </div>

        <!-- Table -->
        <div class="card tabel-custom mx-auto">
            <div class="card-body table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Deskripsi Singkat</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($berita as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{$item->foto}}" width="200px">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ Str::limit($item->deskripsi_singkat, 80) }}</td>
                            <td>{{ Str::limit($item->deskripsi, 80) }}</td>
                            <td class="aksi d-flex">
                                <button class="btn btn-sm btn-light"
                                    data-bs-toggle="modal"
                                    data-bs-target="#beritaModal"
                                    onclick='openEditModal(@json($item))'>
                                    ✏️
                                </button>
                                <button class="btn btn-sm btn-light"
                                    onclick="hapusBerita({{ $item->id }})">
                                    🗑️
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </main>
</div>
@include('../modal/modal_admin_berita')
@include ('../templates/footer_admin')
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/admin_berita.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>