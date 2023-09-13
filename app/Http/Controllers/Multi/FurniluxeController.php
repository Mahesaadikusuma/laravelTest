<?php

namespace App\Http\Controllers\Multi;

use App\Models\ProductF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\uuid;

class FurniluxeController extends Controller
{
    public function index()
    {
        $product = ProductF::with(['student'])->get();
        // Menggunakan koneksi database tambahan
        // $product = DB::connection('mysql2')->table('products')->get();

        // dd($product);

        
        return view('product', compact('product'));
    }


    // INI UNTUK UUID
    public function uuid()
    {
        $product = uuid::all();
        // Menggunakan koneksi database tambahan
        // $product = DB::connection('mysql2')->table('products')->get();

        // dd($product);

        
        return view('uuid.index', compact('product'));
    }

    

     public function uuidDetail($id)
    {
        $product = uuid::findOrFail($id);
        // Menggunakan koneksi database tambahan
        // $product = DB::connection('mysql2')->table('products')->get();

        // dd($product);

        
        return view('uuid.detail', compact('product'));
    }
}
