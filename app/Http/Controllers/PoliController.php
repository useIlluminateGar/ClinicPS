<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $data['poli'] = \App\Models\Poli::latest()->paginate(10);
        return view('poli_index', $data);
    }

    public function create()
    {
        return view('poli_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);
         $poli = new \App\Models\Poli;
    $poli->fill($requestData);
    $poli->save();
    flash('Data poli berhasil disimpan')->success();
    return redirect('/poli');
    }

    public function edit(string $id)
    {
        $data['poli'] = \App\Models\Poli::findOrFail($id);
        return view('poli_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);
        $poli = \App\Models\Poli::findOrFail($id);
        $poli->fill($requestData);
        $poli->save();
        flash('Data poli berhasil diupdate')->success();
         return redirect('/poli');
    }

    public function destroy(string $id)
    {
        $poli = \App\Models\Poli::findOrFail($id);

        if($poli->daftar->count() >= 1) {
            flash('Maaf, data tidak bisa dihapus karena terkait dengan data pendaftaran')->error();
            return back();
        }

        $poli->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}