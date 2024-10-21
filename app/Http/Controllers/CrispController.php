<?php

namespace App\Http\Controllers;

use App\Models\Crisp;
use Illuminate\Http\Request;

class CrispController extends Controller
{
    public function cetak()
    {
        $data['title'] = 'Laporan Data Sub Kriteria';
        $data['rows'] = Crisp::leftJoin('tb_kriteria', 'tb_kriteria.kode_kriteria', '=', 'tb_crisp.kode_kriteria')
            ->orderBy('tb_crisp.kode_kriteria')
            ->orderBy('bobot_crisp')
            ->get();
        return view('crisp.cetak', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['q'] = $request->input('q');
        $data['title'] = 'Data Sub Criteria';
        $data['limit'] = 10;
        $data['rows'] = Crisp::where('nama_crisp', 'like', '%' . $data['q'] . '%')
            ->leftJoin('tb_kriteria', 'tb_kriteria.kode_kriteria', '=', 'tb_crisp.kode_kriteria')
            ->orderBy('tb_crisp.kode_kriteria')
            ->orderBy('bobot_crisp')
            ->paginate($data['limit'])->withQueryString();
        return view('crisp.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Crisp';
        return view('crisp.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_crisp' => 'required',
            'kode_kriteria' => 'required',
            'bobot_crisp' => 'required',
        ], [
            'nama_crisp.required' => 'Nama crisp harus diisi',
            'kode_kriteria.required' => 'Kriteria harus diisi',
            'bobot_crisp.required' => 'Bobot harus diisi',
        ]);
        $crisp = new Crisp($request->all());
        $crisp->save();
        return redirect('crisp')->with('message', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crisp  $crisp
     * @return \Illuminate\Http\Response
     */
    public function show(Crisp $crisp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crisp  $crisp
     * @return \Illuminate\Http\Response
     */
    public function edit(string $crisp)
    {
        $crisp = Crisp::findOrFail($crisp);
        $data['row'] = $crisp;
        $data['title'] = 'Ubah Sub Kriteria';
        return view('crisp.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crisp  $crisp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $crisp)
    {
        $request->validate([
            'nama_crisp' => 'required',
            'kode_kriteria' => 'required',
            'bobot_crisp' => 'required',
        ], [
            'nama_crisp.required' => 'Nama crisp harus diisi',
            'kode_kriteria.required' => 'Kriteria harus diisi',
            'bobot_crisp.required' => 'Bobot harus diisi',
        ]);
        $crisp = Crisp::findOrFail($crisp);
        $crisp->nama_crisp = $request->nama_crisp;
        $crisp->kode_kriteria = $request->kode_kriteria;
        $crisp->bobot_crisp = $request->bobot_crisp;
        $crisp->save();
        return redirect('crisp')->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crisp  $crisp
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $crisp)
    {
        $crisp = Crisp::findOrFail($crisp);
        $crisp->delete();
        return redirect('crisp')->with('message', 'Data berhasil dihapus!');
    }
}
