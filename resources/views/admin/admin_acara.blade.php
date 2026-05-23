<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Event</title>

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
                <h2 class="fw-bold">Kelola Event Pariwisata</h2>
                <p class="text-muted">Tambah, edit, atau hapus event pariwisata</p>
            </div>

            <button class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#acaraModal"
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
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Koordinat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($acara as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{$item->foto}}" width="200">
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ Str::limit($item->lokasi, 20) }}</td>
                            <td>
                                @if (\Carbon\Carbon::parse($item->mulai)->format('mY') == \Carbon\Carbon::parse($item->akhir)->format('mY'))
                                    {{ \Carbon\Carbon::parse($item->mulai)->format('d') }} - {{ \Carbon\Carbon::parse($item->akhir)->format('d F Y') }}
                                @else
                                    {{ \Carbon\Carbon::parse($item->mulai)->format('d F') }} - {{ \Carbon\Carbon::parse($item->akhir)->format('d F Y') }}
                                @endif
                            </td>
                            <td>
                                {{ Str::limit($item->koordinat,20) }}
                            </td>
                            <td>{{ $item->status }}</td>
                            <td class="aksi d-flex">
                                <button class="btn btn-sm btn-light"
                                    data-bs-toggle="modal"
                                    data-bs-target="#acaraModal"
                                    onclick='openEditModal(@json($item))'>
                                    ✏️
                                </button>
                                <button class="btn btn-sm btn-light"
                                    onclick="hapusAcara({{ $item->id }})">
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
@include('../modal/modal_adminacara')
@include ('../templates/footer_admin')
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/admin_acara.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>