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
                <h2 class="fw-bold">Kelola Destinasi Wisata</h2>
                <p class="text-muted">Tambah, edit, atau hapus destinasi wisata</p>
            </div>

            <button class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#destinasiModal"
                onclick="openAddModal()">
                + Tambah Data
            </button>
        </div>

        <!-- Table -->
        <div class="card tabel-custom mx-auto">
            <div class="card-body table-responsive-custom">
                <table class="table table-custom custom-table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Jam Operasional</th>
                            <th>Deskripsi Singkat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinasi as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{$item->foto}}" width="200">
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ Str::limit($item->lokasi, 50) }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->jam_operasional }}</td>
                            <td>{{ Str::limit($item->deskripsi_singkat, 80) }}</td>
                            <td class="aksi d-flex">
                                <button class="btn btn-sm btn-light"
                                    data-bs-toggle="modal"
                                    data-bs-target="#destinasiModal"
                                    onclick='openEditModal(@json($item))'>
                                    ✏️
                                </button>
                                <button class="btn btn-sm btn-light"
                                    onclick="hapusDestinasi({{ $item->id }})">
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
@include('../modal/modal_admindestinasi')
@include ('../templates/footer_admin')
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/admin_destinasi.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>