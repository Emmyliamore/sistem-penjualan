<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        // Hanya memanggil file view index
        return view('penjualan.index'); 
    }
}