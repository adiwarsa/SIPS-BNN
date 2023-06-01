<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mengambil surat terbaru berdasarkan created_at
        $surat = SuratMasuk::orderByDesc('created_at')->get();
		return view('suratmasuk.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mendefinisikan model SuratMasuk
        $surat = new SuratMasuk();
		return view('suratmasuk.create', compact('surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Request input data dengan validasi
        $data = $request->validate([
			'no_surat' => 'required|string',
            'dari' => 'required|string',
            'kepada' => 'required|string',
            'perihal' => 'required|string',
		]);

        //Request Input File
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('suratmasuk', $fileName, 'public');

        $data['file'] = $fileName;

        $request['user_id'] = Auth::user()->id;
        
        //Store request ke dalam database SuratMasuk
		SuratMasuk::create($data + $request->all());

		return to_route('suratmasuk.index')->withSuccess('Surat masuk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mengambil surat masuk berdasarkan id
        $surat = SuratMasuk::where('id', $id)->first();
        //Mengambil disposisi berdasarkan id surat yang diambil
        $disposition = Disposisi::where('surat_id', $surat->id)->get();
        //Menghitung disposisi surat yang diambil
        $countdisposisi = Disposisi::where('surat_id' , $surat->id)->count();
        return view('suratmasuk.detail', compact('surat', 'countdisposisi','disposition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasuk $surat)
    {
        return view('suratmasuk.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratMasuk $surat)
    {
        //Request input data
        $data['no_surat'] = $request->no_surat;
        $data['dari'] = $request->dari;
        $data['kepada'] = $request->kepada;
        $data['tanggal_surat'] = $request->tanggal_surat;
        $data['tanggal_terima'] = $request->tanggal_terima;
        $data['perihal'] = $request->perihal;
        $data['keterangan'] = $request->keterangan;

        //Jika request mempunyai inputan 'file' maka
        if($request->file('file')){
        $file = $request->file('file');
        //Mengubah file name dengan waktu_namafile
        $fileName = time() . '_' . $file->getClientOriginalName();
        //menyimpan file kedalam folder suratmasuk dengan nama waktu_namafile
        $filePath = $file->storeAs('suratmasuk', $fileName, 'public');

        $data['file'] = $fileName;
        }
        
        //mengupdate data
        $surat->update($data);

		return to_route('suratmasuk.index')->withSuccess('Data surat berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(SuratMasuk $surat)
    {
        //Menghapus data yang dipilih berdasarkan argumen (SuratMasuk $surat)
        $surat->delete();
        return to_route('suratmasuk.index')->withSuccess('Surat berhasil dihapus.');
    }
}
