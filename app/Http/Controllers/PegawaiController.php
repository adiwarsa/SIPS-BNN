<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mengambil data pegawai terbaru berdasarkan created_at
        $pegawai = Pegawai::orderByDesc('created_at')->get();
		return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mendefinisikan Model Pegawai
        $pegawai = new Pegawai();
		return view('pegawai.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Request input dengan validasi
        $data = $request->validate([
			'nama' => 'required|string',
            'jabatan' => 'required|string',
		]);
        //Request input tanpa validasi
        $data['nip'] = $request->nip;
        $data['status'] = $request->status;

        //Store request input ke dalam database
        Pegawai::create($data);

		return to_route('pegawai.index')->withSuccess('Pegawai berhasil ditambahkan.');
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
        //Mengambil data pegawai berdasarkan id
        $pegawai = Pegawai::findOrFail($id);

        return view('pegawai.edit', compact('pegawai'));
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
        //Mengambil data pegawai berdasarkan id
        $pegawai = Pegawai::findOrFail($id);
        //Request input data pegawai
        $data['nama'] = $request->nama;
        $data['nip'] = $request->nip;
        $data['jabatan'] = $request->jabatan;
        $data['status'] = $request->status;
        //update data pegawai yang diubah
        $pegawai->update($data);

        return to_route('pegawai.index')->withSuccess('Data Pegawai berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //Mengambil data pegawai berdasarkan id
        $pegawai = Pegawai::findOrFail($id);
        //Menghapus data pegawai yang diambil
        $pegawai->delete();
        return to_route('pegawai.index')->withSuccess('Data Pegawai berhasil dihapus.');
    }
}
