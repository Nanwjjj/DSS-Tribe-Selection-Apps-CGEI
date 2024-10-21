<?php

namespace App\Http\Controllers;

use AHP;
use App\Models\Crisp;
use Illuminate\Http\Request;

class Rel_CrispController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Bobot Crisp';
        $data['kode_kriteria'] = $request->get('kode_kriteria');
        $data['rel_crisp'] = get_rel_crisp($data['kode_kriteria']);
        $data['ahp'] = new AHP($data['rel_crisp']);
        $data['crisps'] = get_crisp();
        foreach ($data['ahp']->prioritas as $key => $val) {
            $crisp = Crisp::find($key);
            $crisp->bobot_crisp = $val;
            $crisp->save();
        }
        return view('rel_crisp.index', $data);
    }

    function simpan(Request $request)
    {
        if ($request->ID1 == $request->ID2 && $request->nilai != 1)
            return back()->withInput()->withErrors([
                'nilai' => 'Crisp yang sama harus bernilai 1!',
            ]);

        query("UPDATE tb_rel_crisp SET nilai='$request->nilai' WHERE ID1='$request->ID1' AND ID2='$request->ID2'");
        $nilai = 1 / $request->nilai;
        query("UPDATE tb_rel_crisp SET nilai='$nilai' WHERE ID1='$request->ID2' AND ID2='$request->ID1'");

        return redirect()->route('rel_crisp.index', ['kode_kriteria' => $request->kode_kriteria])->with('message', 'Data berhasil diubah!');
    }
}
