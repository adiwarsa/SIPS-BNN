<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mengambil data dari model SuratKeluar berdasarkan created_at yang terbaru
        $surat = SuratKeluar::orderByDesc('created_at')->get();
		return view('suratkeluar.index', compact('surat'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mendefinisikan Model SuratKeluar
        $surat = new SuratKeluar();
        //Mengambil jumlah data surat keluar
        $countsurat = SuratKeluar::count();
        //Merubah bentuk jumlah surat keluar menjadi format 3 digit (001)
        $nosurat = str_pad($countsurat+1, 3, '0', STR_PAD_LEFT);
		return view('suratkeluar.create', compact('surat', 'nosurat'));
    }

    public function createsprint()
    {
        //Mendefinisikan model surat keluar
        $surat = new SuratKeluar();
        //Mengambil data pegawai pada model Pegawai berdasarkan status yang terbaru
        $pegawai = Pegawai::orderBy('status', 'desc')->get();
        //Mengambil jumlah data surat yang keluar
        $countsurat = SuratKeluar::count();
        //Merubah bentuk jumlah surat keluar menjadi format 3 digit (001)
        $nosurat = str_pad($countsurat+1, 3, '0', STR_PAD_LEFT);
		return view('suratkeluar.createsprint', compact('surat', 'pegawai','nosurat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        //Input Request Surat Keluar
        $data['kepada'] = $request->kepada;
        $data['type'] = $request->type;
        $data['kategori'] = $request->kategori;
        $data['hal'] = $request->hal;
        $data['isi'] = $request->isi;
        $data['isilain'] = $request->isilain;
        $data['kesimpulan'] = $request->kesimpulan;
        $data['tempat'] = $request->tempat;
        $data['sebagai'] = $request->sebagai;
        $data['topik'] = $request->topik;
        $data['no_surat'] = $request->no_surat;
        $data['sifat'] = $request->sifat;
        $data['tanggal_surat'] = $request->tanggal_surat;
        $data['tanggal_pelaksanaan'] = $request->tanggal_pelaksanaan;
        $data['mulai'] = $request->mulai;
        $data['selesai'] = $request->selesai;
        $data['user_id'] = Auth::user()->id;
        $data['status'] = (Auth::user()->role == 'Admin') ? 1 : 0;
        $data['bidang'] = $request->bidang;

        
        //menggantikan inputan newline (\n) dengan <br>
        $menimbang = $request->menimbang;
        $menimbang = nl2br($menimbang);
        $untuk = $request->untuk;

        //menggantikan inputan newline (\n) dengan <br>
        $untuk = nl2br($untuk);
        $dasar = $request->dasar;

        //menggantikan inputan newline (\n) dengan <br>
        $dasar = nl2br($dasar);
        
        //Input setelah diganti format newline dengan br
        $data['menimbang'] = $menimbang;
        $data['untuk'] = $untuk;
        $data['dasar'] = $dasar;

        //store request data yang telah diinput
        $surat = SuratKeluar::create($data);

        //memetakan input kepada_id kedalam table pivot Surat Kepada
        if ($request->has('kepada_id')) {
            foreach ($request->input('kepada_id') as $pegawaiId) {
                //Store ke table pivot Surat kepada menggunakan func suratkepada()
                $kepada = $surat->suratkepada()->create([
                    'pegawai_id' => $pegawaiId,
                ]);
            }
        }

        return redirect()->route('suratkeluar.index')->withSuccess('Surat keluar berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('suratkeluar.print');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Mengambil surat bedasarkan id
        $surat = SuratKeluar::findOrFail($id);
        //Mengambil data pegawai pada model Pegawai berdasarkan status yang terbaru
        $pegawai = Pegawai::orderBy('status', 'desc')->get();
        //Menghitung jumlah surat keluar
        $countsurat = SuratKeluar::count();
        //Merubah bentuk jumlah surat keluar menjadi format 3 digit (001)
        $nosurat = str_pad($countsurat+1, 3, '0', STR_PAD_LEFT);
        return view('suratkeluar.edit', compact('surat','pegawai','nosurat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Mengambil surat bedasarkan id
        $surat = SuratKeluar::findOrFail($id);

        //Input Request Surat Keluar
        $data['no_surat'] = $request->no_surat;
        $data['sifat'] = $request->sifat;
        $data['kategori'] = $request->kategori;
        $data['kepada'] = $request->kepada;
        $data['hal'] = $request->hal;
        $data['type'] = $request->type;
        $data['isi'] = $request->isi;
        $data['isilain'] = $request->isilain;
        $data['kesimpulan'] = $request->kesimpulan;
        $data['sebagai'] = $request->sebagai;
        $data['topik'] = $request->topik;
        $data['tempat'] = $request->tempat;
        $data['tanggal_surat'] = $request->tanggal_surat;
        $data['tanggal_pelaksanaan'] = $request->tanggal_pelaksanaan;
        $data['mulai'] = $request->mulai;
        $data['selesai'] = $request->selesai;
        $data['bidang'] = $request->bidang;

        //menggantikan inputan newline (\n) dengan <br>
        $menimbang = $request->menimbang;
        $menimbang = nl2br($menimbang);
        //menggantikan inputan newline (\n) dengan <br>
        $untuk = $request->untuk;
        $untuk = nl2br($untuk);
        //menggantikan inputan newline (\n) dengan <br>
        $dasar = $request->dasar;
        $dasar = nl2br($dasar);
        
        //Input setelah diganti format newline dengan br
        $data['menimbang'] = $menimbang;
        $data['untuk'] = $untuk;
        $data['dasar'] = $dasar;

        if ($request->has('kepada_id')) {
            // Delete data KepadaSurat yang tersedia
            $surat->suratkepada()->delete();

            // membuat baru KepadaSurat record
            foreach ($request->input('kepada_id') as $pegawaiId) {
                $kepada = $surat->suratkepada()->create([
                    'pegawai_id' => $pegawaiId,
                ]);
            }
        }

        $surat->update($data);

		return to_route('suratkeluar.index')->withSuccess('Data surat keluar berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //Mengambil surat berdasarkan id
        $surat = SuratKeluar::findOrFail($id);
        //Menghapus surat yang diambil
        $surat->delete();
        return to_route('suratkeluar.index')->withSuccess('Surat Keluar berhasil dihapus.');
    }
    public function printSurat($suratId)
    {
        //Mengambil surat berdasarkan id
        $surat = SuratKeluar::findOrFail($suratId);

        return view('suratkeluar.print', compact('surat'));
    }

    public function printSuratsprint($suratId)
    {
        //Mengambil surat berdasarkan id
        $surat = SuratKeluar::findOrFail($suratId);

        return view('suratkeluar.printsprint',compact('surat'));
    }

    public function verifikasi(Request $request, $id)
    {
        //Mengambil surat berdasarkan id
        $suratkeluar = SuratKeluar::findOrFail($id);

        //Validasi input no_surat required
        $request->validate([
            'no_surat' => 'required|string',
        ]);
    
        //Mengganti no_surat dengan record baru
        $suratkeluar->no_surat = $request->no_surat;
        
        //Jika surat keluar statusnya = 1 maka pesan surat keluar berhasil dibatalkan verifikasinya lalu status berubah menjadi 0
        if($suratkeluar->status == 1){
            $suratkeluar->status = 0;
            $successMessage = 'Surat Keluar Berhasil Dibatalkan verifikasinya.';

        //Jika surat keluar statusnya = 0 maka pesan surat keluar berhasil dverifikasi lalu status berubah menjadi 1
        }else{
            $suratkeluar->status = 1;
            $successMessage = 'Surat Keluar Berhasil Diverifikasi.';

        }

        $suratkeluar->save();
        
        return to_route('suratkeluar.index')->withSuccess($successMessage);
    }

    public function test(){
        return view('suratkeluar.test');
    }
}
