<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menghitung jumlah user
        $jumlahuser = User::all()->count();
        //Menghitung jumlah surat masuk
        $jumlahsuratmasuk =SuratMasuk::all()->count();
        //Menghitung jumlah surat keluar
        $jumlahsuratkeluar = SuratKeluar::all()->count();
        //Menghitung jumlah pegawai
        $jumlahpegawai = Pegawai::all()->count();
        //Mendefinisikan waktu saat ini
        $sekarang = Carbon::now()->locale('id');
        $sekarang->settings(['formatFunction' => 'translatedFormat']);
        //Menghitung jumlah surat masuk bulan ini
        $sinmonth = SuratMasuk::where('created_at', '>=', Carbon::now()->subMonth())->count();
        //Menghitung jumlah surat keluar bulan ini
        $soutmonth = SuratKeluar::where('created_at', '>=', Carbon::now()->subMonth())->count();
        return view('home', compact('jumlahsuratmasuk','jumlahsuratkeluar','jumlahuser', 'jumlahpegawai','sekarang','sinmonth','soutmonth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
