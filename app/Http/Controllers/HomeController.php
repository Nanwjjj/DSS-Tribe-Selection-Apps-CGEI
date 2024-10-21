<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        $data['title'] = 'MSIB Chakra Giri Energi Indonesia';
        $data['categories'] = [];
        $data['series'][0] = [
            'name' => 'Total',
            'data' => [],
        ];
        foreach (Alternatif::get() as $alternatif) {
            $data['categories'][] = $alternatif->nama_alternatif;
            $data['series'][0]['data'][] = round($alternatif->total * 1, 2);
        }

        $data['alternatifs'] = Alternatif::orderBy('rank')->limit(100)
            ->get();
        $data['kriterias'] = Kriteria::orderBy('kode_kriteria')->limit(10)
            ->get();

        return view('home', $data);
    }
}
