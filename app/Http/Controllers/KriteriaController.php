<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function cetak()
    {
        $data['title'] = 'Laporan Data Kriteria';
        $data['rows'] = Kriteria::orderBy('kode_kriteria')->get();
        $data['totalBobot'] = $data['rows']->sum('bobot');
        return view('kriteria.cetak', $data);
    }

    public function index(Request $request)
    {
        $data['q'] = $request->input('q');
        $data['title'] = 'Data Kriteria';
        $data['limit'] = 10;
        $data['rows'] = Kriteria::where('nama_kriteria', 'like', '%' . $data['q'] . '%')
            ->orderBy('kode_kriteria')
            ->paginate($data['limit'])->withQueryString();
        $data['totalBobot'] = Kriteria::sum('bobot');
        return view('kriteria.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Kriteria';
        return view('kriteria.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kriteria' => 'required|unique:tb_kriteria',
            'nama_kriteria' => 'required',
            'atribut' => 'required',
            'bobot' => 'required|numeric|min:0|max:100',
        ], [
            'kode_kriteria.required' => 'Kode kriteria harus diisi',
            'kode_kriteria.unique' => 'Kode kriteria harus unik',
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'atribut.required' => 'Atribut harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.min' => 'Bobot minimal adalah 0',
            'bobot.max' => 'Bobot maksimal adalah 100',
        ]);

        $totalBobot = Kriteria::sum('bobot') + $request->bobot;
        if ($totalBobot > 100) {
            return redirect()->back()->withErrors(['bobot' => 'Total bobot tidak boleh melebihi 100%']);
        }

        $kriteria = new Kriteria($request->all());
        $kriteria->save();

        return redirect('kriteria')->with('message', 'Data berhasil ditambah!');
    }

    public function edit(string $kriteria)
    {
        $data['row'] = Kriteria::findOrFail($kriteria);
        $data['title'] = 'Ubah Kriteria';
        return view('kriteria.edit', $data);
    }

    public function update(Request $request, string $kriteria)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'atribut' => 'required',
            'bobot' => 'required|numeric|min:0|max:100',
        ], [
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'atribut.required' => 'Atribut harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.min' => 'Bobot minimal adalah 0',
            'bobot.max' => 'Bobot maksimal adalah 100',
        ]);

        $kriteria = Kriteria::findOrFail($kriteria);
        $totalBobot = Kriteria::sum('bobot') - $kriteria->bobot + $request->bobot;
        if ($totalBobot > 100) {
            return redirect()->back()->withErrors(['bobot' => 'Total bobot tidak boleh melebihi 100%']);
        }

        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->atribut = $request->atribut;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();

        return redirect('kriteria')->with('message', 'Data berhasil diubah!');
    }

    public function destroy(string $kriteria)
    {
        $kriteria = Kriteria::findOrFail($kriteria);
        $kriteria->delete();
        return redirect('kriteria')->with('message', 'Data berhasil dihapus!');
    }
}
