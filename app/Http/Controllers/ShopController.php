<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{

    public function view(Request $request)
{
    if (!Session::has('user')) {
        // If not logged in, redirect to the login page
        return redirect()->route('login.submit')->withErrors([
            'auth' => 'You must be logged in to access this page.',
        ]);
    }
    // Ambil semua data produk dari database
    $products = DB::table('PRODUK')->get();

    // Kembalikan view dengan data produk
    return view('shop-admin', ['products' => $products]);
}


    public function showCategory($animal, $category = null)
    {
        // Mengambil kategori berdasarkan hewan
        $categories = DB::table('CATEGORY')
            ->where('CATEGORY_ANIMAL', $animal)
            ->where('STATUS_DEL', 0)
            ->get();

        // Mengambil produk berdasarkan kategori jika kategori dipilih
        if ($category) {
            $products = DB::table('PRODUK')
                ->join('CATEGORY', 'PRODUK.CATEGORY_ID', '=', 'CATEGORY.CATEGORY_ID')
                ->where('CATEGORY.CATEGORY_ANIMAL', $animal)
                ->where('CATEGORY.CATEGORY_NAME', $category)
                ->where('PRODUK.STATUS_DEL', 0)
                ->select('PRODUK.*')
                ->get();
        } else {
            $products = DB::table('PRODUK')
                ->join('CATEGORY', 'PRODUK.CATEGORY_ID', '=', 'CATEGORY.CATEGORY_ID')
                ->where('CATEGORY.CATEGORY_ANIMAL', $animal)
                ->where('PRODUK.STATUS_DEL', 0)
                ->select('PRODUK.*')
                ->get();
        }

        return view('shop', compact('animal', 'category', 'categories', 'products'));
    }
}
