<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\statistik;
use App\Models\destinasi;
use App\Models\event;
use App\Models\pegawai;
use App\Models\budaya;
use App\Models\kuliner;
use App\Models\comment;
use App\Models\rating;

class home extends Controller
{
    public function index()
    {

        $destinasi = destinasi::first();
        $kuliner = kuliner::first();
        $acara = event::all();
        $data = destinasi::all();
        $budaya = budaya::first();
        $rating = destinasi::with('ratings')->get();
        $jenis_destinasi = destinasi::all()->unique('jenis');
        $kategori = destinasi::select('kategori')
            ->distinct()
            ->pluck('kategori');

        // Ambil jenis unik
        $jenis = destinasi::select('jenis')
            ->distinct()
            ->pluck('jenis');

        // Ambil wilayah dari kata pertama sebelum koma pada lokasi
        $wilayah = destinasi::get()
            ->map(function ($item) {
                return trim(explode(',', $item->lokasi)[0]);
            })
            ->unique()
            ->values();

        foreach ($acara as $item) {

            $today = Carbon::today();

            $mulai = Carbon::parse($item->mulai);
            $akhir = Carbon::parse($item->akhir);

            if ($today->lt($mulai)) {

                // Sebelum mulai
                $item->status = 'Mendatang';
                $item->text = 'Jangan lewatkan acara menarik yang akan datang';

            } elseif ($today->between($mulai, $akhir)) {

                // Sedang berlangsung
                $item->status = 'Sedang Berlangsung';
                $item->text = 'Jangan lewatkan acara menarik yang akan datang';

            } else {

                // Setelah selesai
                $item->status = 'Selesai';
                $item->text = 'Acara telah selesai';
            }
        }
        return view('index', [
            'totalDestinasi' => destinasi::count(),
            'totalKuliner' => kuliner::count(),
            'totalBudaya' => budaya::count(),
            'totalAcara' => event::count(),
            'totalPegawai' => pegawai::count(),
            'destinasi'=> $destinasi,
            'kuliner'=> $kuliner,
            'acara'=> $acara,
            'budaya'=> $budaya,
            'jenis_destinasi'=> $jenis_destinasi,
            'jenis'=> $jenis,
            'kategori'=> $kategori,
            'wilayah'=> $wilayah,
            'rating'=> $rating
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function beranda()
    {
        $destinasi = destinasi::first();
        $kuliner = kuliner::first();
        $acara = event::all();
        $budaya = budaya::first();
        $rating = destinasi::with('ratings')->get();
        $jenis_destinasi = destinasi::all()->unique('jenis');
        $kategori = destinasi::select('kategori')
            ->distinct()
            ->pluck('kategori');

        // Ambil jenis unik
        $jenis = destinasi::select('jenis')
            ->distinct()
            ->pluck('jenis');

        // Ambil wilayah dari kata pertama sebelum koma pada lokasi
        $wilayah = destinasi::get()
            ->map(function ($item) {
                return trim(explode(',', $item->lokasi)[0]);
            })
            ->unique()
            ->values();

        foreach ($acara as $item) {

            $today = Carbon::today();

            $mulai = Carbon::parse($item->mulai);
            $akhir = Carbon::parse($item->akhir);

            if ($today->lt($mulai)) {

                // Sebelum mulai
                $item->status = 'Mendatang';
                $item->text = 'Jangan lewatkan acara menarik yang akan datang';

            } elseif ($today->between($mulai, $akhir)) {

                // Sedang berlangsung
                $item->status = 'Sedang Berlangsung';
                $item->text = 'Jangan lewatkan acara menarik yang akan datang';

            } else {

                // Setelah selesai
                $item->status = 'Selesai';
                $item->text = 'Acara telah selesai';
            }
        }

        return view('pages.home', [
            'totalDestinasi' => destinasi::count(),
            'totalKuliner' => kuliner::count(),
            'totalBudaya' => budaya::count(),
            'totalAcara' => event::count(),
            'totalPegawai' => pegawai::count(),
            'destinasi'=> $destinasi,
            'jenis_destinasi' => $jenis_destinasi,
            'kuliner'=> $kuliner,
            'acara'=> $acara,
            'budaya'=> $budaya,
            'jenis'=> $jenis,
            'kategori'=> $kategori,
            'wilayah'=> $wilayah,
            'rating'=> $rating
        ]);
    }

    public function event() {
        $acara = event::all();

        foreach ($acara as $item) {

            $today = Carbon::today();

            $mulai = Carbon::parse($item->mulai);
            $akhir = Carbon::parse($item->akhir);

            if ($today->lt($mulai)) {

                // Sebelum mulai
                $item->status = 'Mendatang';
                $item->text = 'Jangan lewatkan acara menarik yang akan datang';

            } elseif ($today->between($mulai, $akhir)) {

                // Sedang berlangsung
                $item->status = 'Sedang Berlangsung';
                $item->text = 'Jangan lewatkan acara menarik yang akan datang';

            } else {

                // Setelah selesai
                $item->status = 'Selesai';
                $item->text = 'Acara telah selesai';
            }
        }

        return view ('pages/acara', [
            'acara'=> $acara
        ]);
    }

    public function profil()
    {
    $pegawais = pegawai::all();

    $responsibilities = [
        [
            "description" => "Perumusan kebijakan dibidang pengembangan destinasi pariwisata, pengembangan indrustri pariwisata, pengembangan sumber daya pariwisata."
        ],
        [
            "description" => "Pelaksanaan kebijakan dibidang pengembangan destinasi pariwisata, pengembangan industri pariwisata, pengembangan sumber daya pariwisata."
        ],
        [
            "description" => "Pelaksanaan evaluasi dan pelaporan dibidang pengembangan destinasi pariwisata, pengembangan industri pariwisata, pengembangan sumber daya pariwisata."
        ],
        [
            "description" => "Pelaksanaan administrasi dinas di bidangn pngembangan destinasi pariwisata, industri pariwisata, pengembangan sumber daya pariwisata."
        ],
        [
            "description" => "Pelaksanaan fungsi lain yang diberikan oleh Bupati terkait dengan tugas dan fungsinya."
        ]
    ];

    return view('pages.profil', compact('pegawais', 'responsibilities'));
    }

    public function destinasi(Request $request)
    {
        $tab = $request->tab ?? 'destinasi';

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        $search = $request->search;

        /*
        |--------------------------------------------------------------------------
        | QUERY DESTINASI
        |--------------------------------------------------------------------------
        */

        $query = destinasi::query();

        // FILTER KATEGORI
        if ($request->kategori) {

            $query->where('kategori', $request->kategori);

        }

        // FILTER JENIS
        if ($request->jenis) {

            $query->where('jenis', $request->jenis);

        }

        // FILTER WILAYAH
        if ($request->wilayah) {

            $query->whereRaw("
                TRIM(SUBSTRING_INDEX(lokasi, ',', 1)) = ?
            ", [$request->wilayah]);

        }

        // SEARCH DESTINASI
        if ($search) {

            $query->where('nama', 'like', "%{$search}%");

        }

        /*
        |--------------------------------------------------------------------------
        | DESTINASI WISATA
        |--------------------------------------------------------------------------
        */

        $destinasi = (clone $query)

            ->whereNotIn('jenis', [
                'Penginapan',
                'Restoran & Cafe'
            ])

            ->leftJoin(
                'ratings',
                'ratings.destinasi_id',
                '=',
                'destinasis.id'
            )

            ->select('destinasis.*')

            ->selectRaw('AVG(ratings.rating) as rata_rating')

            ->groupBy('destinasis.id')

            ->orderByDesc('rata_rating')

            ->get();

        /*
        |--------------------------------------------------------------------------
        | PENGINAPAN
        |--------------------------------------------------------------------------
        */

        $penginapan = destinasi::where('jenis', 'Penginapan')

            ->when($search, function ($q) use ($search) {

                $q->where('nama', 'like', "%{$search}%");

            })

            ->leftJoin(
                'ratings',
                'ratings.destinasi_id',
                '=',
                'destinasis.id'
            )

            ->select('destinasis.*')

            ->selectRaw('AVG(ratings.rating) as rata_rating')

            ->groupBy('destinasis.id')

            ->orderByDesc('rata_rating')

            ->get();

        /*
        |--------------------------------------------------------------------------
        | RESTORAN & CAFE
        |--------------------------------------------------------------------------
        */

        $restoran = destinasi::where('jenis', 'Restoran & Cafe')

            ->when($search, function ($q) use ($search) {

                $q->where('nama', 'like', "%{$search}%");

            })

            ->leftJoin(
                'ratings',
                'ratings.destinasi_id',
                '=',
                'destinasis.id'
            )

            ->select('destinasis.*')

            ->selectRaw('AVG(ratings.rating) as rata_rating')

            ->groupBy('destinasis.id')

            ->orderByDesc('rata_rating')

            ->get();

        /*
        |--------------------------------------------------------------------------
        | REKOMENDASI
        |--------------------------------------------------------------------------
        */

        $rekomendasi = destinasi::whereNotIn('jenis', [
                'Penginapan',
                'Restoran & Cafe'
            ])

            ->when($search, function ($q) use ($search) {

                $q->where('nama', 'like', "%{$search}%");

            })

            ->leftJoin(
                'ratings',
                'ratings.destinasi_id',
                '=',
                'destinasis.id'
            )

            ->select('destinasis.*')

            ->selectRaw('AVG(ratings.rating) as rata_rating')

            ->groupBy('destinasis.id')

            ->orderByDesc('rata_rating')

            ->take(6)

            ->get();

        /*
        |--------------------------------------------------------------------------
        | DATA KULINER
        |--------------------------------------------------------------------------
        */

        $jenisKuliner = kuliner::select('jenis')

            ->selectRaw('COUNT(*) as total')

            ->groupBy('jenis');

        $kuliner = kuliner::leftJoinSub(
                $jenisKuliner,
                'jenis_kuliner',
                function ($join) {

                    $join->on(
                        'kuliners.jenis',
                        '=',
                        'jenis_kuliner.jenis'
                    );

                }
            )

            ->when($search, function ($q) use ($search) {

                $q->where('kuliners.nama', 'like', "%{$search}%");

            })

            ->orderBy('jenis_kuliner.total', 'asc')

            ->select('kuliners.*')

            ->get();

        /*
        |--------------------------------------------------------------------------
        | DATA BUDAYA
        |--------------------------------------------------------------------------
        */

        $jenisBudaya = budaya::select('jenis')

            ->selectRaw('COUNT(*) as total')

            ->groupBy('jenis');

        $budaya = budaya::leftJoinSub(
                $jenisBudaya,
                'jenis_budaya',
                function ($join) {

                    $join->on(
                        'budayas.jenis',
                        '=',
                        'jenis_budaya.jenis'
                    );

                }
            )

            ->when($search, function ($q) use ($search) {

                $q->where('budayas.nama', 'like', "%{$search}%");

            })

            ->orderBy('jenis_budaya.total', 'asc')

            ->select('budayas.*')

            ->get();

        return view('pages.destinasi', compact(
            'tab',
            'destinasi',
            'penginapan',
            'restoran',
            'rekomendasi',
            'kuliner',
            'budaya'
        ));
    }

 

    public function informasi(Request $request)
    {
        /* =========================
        DATA STATISTIK
        ========================= */

        $statistik = statistik::orderBy('tahun', 'asc')->get();
        $tahunterbaru = $statistik->last()->tahun ?? 0;

        $pengunjungdom = $statistik->last()->wisatawan_domestik ?? 0;
        $pengunjungman = $statistik->last()->wisatawan_mancanegara ?? 0;

        /* =========================
        FILTER TAHUN
        ========================= */

        $tahunDipilih = $request->tahun;

        if ($tahunDipilih) {

            $dataTahunDipilih = statistik::where(
                'tahun',
                $tahunDipilih
            )->first();

        } else {

            // Ambil tahun terbaru jika tidak memilih tahun

            $dataTahunDipilih = statistik::orderBy(
                'tahun',
                'desc'
            )->first();
        }

        /* =========================
        WISATAWAN TAHUN DIPILIH
        ========================= */

        $wisatawanDomestik =
            $dataTahunDipilih->wisatawan_domestik ?? 0;

        $wisatawanMancanegara =
            $dataTahunDipilih->wisatawan_mancanegara ?? 0;

        /* =========================
        TOTAL PENGUNJUNG
        ========================= */

        $totalpengunjung = $pengunjungdom + $pengunjungman;

        /* =========================
        TOTAL DATA
        ========================= */

        $totalDestinasi = destinasi::count();

        $totalBudaya = budaya::count();

        $totalKuliner = kuliner::count();

        /* =========================
        DATA CHART
        ========================= */

        $labels = $statistik->pluck('tahun');

        $datadomestik =
            $statistik->pluck('wisatawan_domestik');

        $datamancanegara =
            $statistik->pluck('wisatawan_mancanegara');

        /* =========================
        DAFTAR TAHUN
        ========================= */

        $daftarTahun = statistik::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        /* =========================
        TAHUN SEBELUMNYA
        ========================= */

        $tahunSebelumnya =
            ($dataTahunDipilih->tahun ?? date('Y')) - 1;

        $dataSebelumnya = statistik::where(
            'tahun',
            $tahunSebelumnya
        )->first();

        /* =========================
        DATA TAHUN SEBELUMNYA
        ========================= */

        $domestikSebelumnya =
            $dataSebelumnya->wisatawan_domestik ?? 0;

        $mancaSebelumnya =
            $dataSebelumnya->wisatawan_mancanegara ?? 0;

        /* =========================
        PERSENTASE DOMESTIK
        ========================= */
        $selisihdom = $wisatawanDomestik - $domestikSebelumnya;

        $selisihman = $wisatawanMancanegara - $mancaSebelumnya;
        
        if ($selisihdom > 0) {

            $statusDom = "Naik";

        } elseif ($selisihdom < 0) {

            $statusDom = "Turun";

        } else {

            $statusDom = "Tetap";

        }

        if ($selisihman > 0) {

            $statusMan = "Naik";

        } elseif ($selisihman < 0) {

            $statusMan = "Turun";

        } else {

            $statusMan = "Tetap";

        }

        if ($domestikSebelumnya > 0) {

            $persentaseNaikdom = round(
                (
                    ($wisatawanDomestik - $domestikSebelumnya)
                    /
                    $domestikSebelumnya
                ) * 100,
                1
            );

        } else {

            $persentaseNaikdom = 0;
        }

        /* =========================
        PERSENTASE MANCANEGARA
        ========================= */

        if ($mancaSebelumnya > 0) {

            $persentaseNaikman = round(
                (
                    ($wisatawanMancanegara - $mancaSebelumnya)
                    /
                    $mancaSebelumnya
                ) * 100,
                1
            );

        } else {

            $persentaseNaikman = 0;
        }

        /* =========================
        TAHUN DENGAN PENGUNJUNG
        TERTINGGI
        ========================= */

        $tertinggi_domestik = statistik::orderBy(
            'wisatawan_domestik',
            'desc'
        )->first();

        $tertinggi_mancanegara = statistik::orderBy(
            'wisatawan_mancanegara',
            'desc'
        )->first();

        $tahunTertinggidom =
            $tertinggi_domestik->tahun ?? '-';

        $tahunTertinggiman =
            $tertinggi_mancanegara->tahun ?? '-';

        /* =========================
        RETURN VIEW
        ========================= */

        return view('pages.informasi', compact(
            'statistik',
            'daftarTahun',
            'tahunDipilih',
            'wisatawanDomestik',
            'wisatawanMancanegara',
            'persentaseNaikdom',
            'persentaseNaikman',
            'tahunTertinggidom',
            'tahunTertinggiman',
            'totalpengunjung',
            'totalDestinasi',
            'totalBudaya',
            'totalKuliner',
            'selisihdom',
            'selisihman',
            'statusDom',
            'statusMan',
            'labels',
            'datadomestik',
            'datamancanegara',
            'tahunterbaru'
        ));
    }

    public function statistik(Request $request)
    {
        /* =========================
        TAHUN DIPILIH
        ========================= */

        $tahunDipilih = $request->tahun;

        /* =========================
        QUERY
        ========================= */


        /* =========================
        RETURN VIEW
        ========================= */

        return view(
            'statistik',
            compact(
                'statistik',
                'daftarTahun',
                'tahunDipilih',
                'totalpengunjung',
                'persentaseNaikdom',
                'persentaseNaikman'
            )
        );
    }

    public function store_komentar(Request $request)
    {

         // validasi
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
            'role' => 'required'
        ]);

        // simpan ke database
        comment::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
            'role' => $request->role
        ]);

        // response AJAX
        return redirect ('beranda'); 
    }

    public function store_comment(Request $request)
    {
        // cari user berdasarkan nama
        $user = comment::where('nama', $request->nama)->first();

        if (!$user || !$user->email) {
        return response()->json([
            'status' => 'error',
            'message' => 'Akun Anda Belum Terdaftar, Mohon Masukkan Akun Anda Melalui Kolom Komentar Yang Ada di Beranda Terlebih Dahulu'
        ], 400);
    }

        // simpan komentar
        $comment = comment::create([
            'nama'  => $request->nama,
            'email' => $user->email, // AUTO ISI
            'pesan' => $request->pesan,
            'role' => $request->role
        ]);

        return response()->json(['status' => 'success','data' => $comment]);
    }

    public function getcomments()
    {
        return comment::orderBy('id', 'asc')->get();
    }

}
