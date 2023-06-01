<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //Mengambil data surat masuk berdasarkan id
        $surat = SuratMasuk::where('id', $id)->first();
        //Mengambil data disposisi yang surat_idnya adalah id dari surat yang diambil sebelumnya
        $disposition = Disposisi::where('surat_id', $surat->id)->get();
		return view('disposisi.index', compact('disposition', 'surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //Mengambil data surat masuk berdasarkan id
        $surat = SuratMasuk::where('id', $id)->first();
        return view('disposisi.create', compact('surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //Mengambil data surat masuk berdasarkan id
        $surat = SuratMasuk::where('id', $id)->first();
        
        //Validasi input
        $data = $request->validate([
            'tenggat' => 'required|string',
            'disposisi_kbnn' => 'required|string',
        ]);

        //Inisiasi inputan checkbox array kepada
        $kepadaArray = $request->input('kepada', []);
        //Menghitung jumlah array kepada
        $kepadaCount = count($kepadaArray);

        //Pemetaan input checkbox kepada dengan perulangan for
        for ($i = 0; $i < $kepadaCount; $i++) {
            $kepada = $kepadaArray[$i];
            $newData = $data;
            //Request input array kepada
            $newData['kepada'] = $kepada;
            $newData['tenggat'] = $request->tenggat;
            $newData['status'] = $request->status;
            $newData['surat_id'] = $surat->id;
            $newData['user_id'] = Auth::user()->id;

            //Store request input ke database
            Disposisi::create($newData);
        }
        return to_route('suratmasuk.show',['surat' => $surat->id])->withSuccess('Disposisi berhasil ditambahkan.');
    }

    

    public function kabid($disposisi)
    {
        //Mengambil data disposisi berdasarkan $disposisi
        $disposisi = Disposisi::findOrFail($disposisi);
        return view('disposisi.disposisikabid', compact('disposisi'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function show(Disposisi $disposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function edit($surat, $disposisiId)
    {
        //Mengambil data surat masuk berdasarkan $surat
        $surat = SuratMasuk::findOrFail($surat);
        //Mengambil data disposisi berdasarkan $disposisiId
        $disposisi = Disposisi::findOrFail($disposisiId);
        return view('disposisi.edit', compact('disposisi','surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $suratid, $disposisiId)
    {
        //Mengambil data surat masuk berdasarkan $suratid
        $surat = SuratMasuk::findOrFail($suratid);
        //Mengambil data disposisi berdasarkan $disposisiId
        $disposisi = Disposisi::findOrFail($disposisiId);
        
        //Request input disposisi
        $data['kepada'] = $request->kepada;
        $data['tanggal_surat'] = $request->tanggal_surat;
        $data['tenggat'] = $request->tenggat;
        $data['disposisi_kbnn'] = $request->disposisi_kbnn;
        $data['disposisi_kabid'] = $request->disposisi_kabid;
        $data['status'] = $request->status;
        $data['surat_id'] = $surat->id;
        $data['user_id'] = Auth::user()->id;

        //Update data disposisi
        $disposisi->update($data);

        return to_route('suratmasuk.show',['surat' => $surat->id])->withSuccess('Disposisi berhasil diubah.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function delete($surat, $disposisiId)
    {
        //Mengambil data surat berdasarkan $surat
        $surat = SuratMasuk::findOrFail($surat);
        //Mengambil data disposisi berdasarkan $disposisiId
        $disposisi = Disposisi::findOrFail($disposisiId);
        //Menghapus disposisi yang diambil
        $disposisi->delete();
        return to_route('suratmasuk.show',['surat' => $surat->id])->withSuccess('Disposisi berhasil dihapus.');
    }
}
