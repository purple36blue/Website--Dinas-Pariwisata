<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\destinasi;
use App\Models\kuliner;
use App\Models\budaya;
use App\Models\rating;
use App\Models\rating_kuliner;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/admin');
        }

        return back()->with('error', 'Username atau Password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function translate(Request $request)
    {
        $texts = $request->texts;
        $target = $request->lang;

        $tr = new GoogleTranslate($target);

        $result = [];

        foreach ($texts as $key => $text) {
            $result[$key] = $text ? $tr->translate($text) : "";
        }

        return response()->json($result);
    }

     public function search(Request $request)
    {
        $keyword = $request->keyword;

        $results = [];

        /* DESTINASI */
        $destinasi = destinasi::where('nama', 'like', "%$keyword%")
            ->get();

        foreach ($destinasi as $item) {

            $results[] = [
                'title' => $item->nama,
                'category' => 'Destinasi',
                'tab' => 'destinasi',
                'url' => '/destinasi?tab=destinasi&search=' . urlencode($item->nama)
            ];
        }

        /* BUDAYA */
        $budaya = budaya::where('nama', 'like', "%$keyword%")
            ->get();

        foreach ($budaya as $item) {

            $results[] = [
                'title' => $item->nama,
                'category' => 'Budaya',
                'tab' => 'budaya',
                'url' => '/destinasi?tab=budaya&search=' . urlencode($item->nama)
            ];
        }

        /* KULINER */
        $kuliner = kuliner::where('nama', 'like', "%$keyword%")
            ->get();

        foreach ($kuliner as $item) {

            $results[] = [
                'title' => $item->nama,
                'category' => 'Kuliner',
                'tab' => 'kuliner',
                'url' => '/destinasi?tab=kuliner&search=' . urlencode($item->nama)
            ];
        }

        return response()->json($results);
    }

    public function store_desrating(Request $request)
    {
        $request->validate([
            'destinasi_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:500'
        ]);

        rating::create([
            'destinasi_id' => $request->destinasi_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    // ambil rata-rata rating
    public function getDesrating($id)
    {
        $avg = rating::where('destinasi_id', $id)->avg('rating');
        $count = rating::where('destinasi_id', $id)->count();
        $komentar = rating::where('destinasi_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();

        return response()->json([
            'avg' => round($avg, 1),
            'count' => $count,
            'komentar' => $komentar
        ]);
    }

    public function store_kulrating(Request $request)
    {
        $request->validate([
            'kuliner_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:500'
        ]);

        rating_kuliner::create([
            'kuliner_id' => $request->kuliner_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    // ambil rata-rata rating
    public function getKulrating($id)
    {
        $avg = rating_kuliner::where('kuliner_id', $id)->avg('rating');
        $count = rating_kuliner::where('kuliner_id', $id)->count();
        $komentar = rating_kuliner::where('kuliner_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();

        return response()->json([
            'avg' => round($avg, 1),
            'count' => $count,
            'komentar' => $komentar
        ]);
    }

}
