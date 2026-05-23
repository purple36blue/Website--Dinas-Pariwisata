<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Destinasi</title>

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
                <h2 class="fw-bold">Kelola Data Kuliner</h2>
                <p class="text-muted">Tambah, edit, atau hapus data kuliner</p>
            </div>

            <button class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#kulinerModal"
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
                            <th>Nama</th>
                            <th>Bahan Dasar</th>
                            <th>Jenis</th>
                            <th>Link Video</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kuliner as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{$item->foto}}" width="200">
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->bahan_utama}}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->video }}</td>
                            <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                            <td class="aksi d-flex">
                                <button class="btn btn-sm btn-light"
                                    data-bs-toggle="modal"
                                    data-bs-target="#kulinerModal"
                                    onclick='openEditModal(@json($item))'>
                                    ✏️
                                </button>
                                <button class="btn btn-sm btn-light"
                                    onclick="hapusKuliner({{ $item->id }})">
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
@include('../modal/modal_adminkuliner')
@include ('../templates/footer_admin')
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/admin_kuliner.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>