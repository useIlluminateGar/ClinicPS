<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
        ]);
        $pasien = new \App\Models\Pasien;
    $pasien->fill($requestData);
    $pasien->save();
    flash('Data pasien berhasil disimpan')->success();
    return redirect('/pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $requestData = $request->validate([
            'nama' => 'required|min:3',
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($requestData);
        $pasien->save();
        flash('Data pasien berhasil diupdate')->success();
         return redirect('/pasien');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);

        if($pasien->daftar->count() >= 1) {
            flash('Maaf, data tidak bisa dihapus karena terkait dengan data pendaftaran')->error();
            return back();
        }

        $pasien->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
