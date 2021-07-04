<?php

namespace App\Http\Controllers;
use App\Models\StokHareketleri;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BelgeHareketleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $get_messages=DB::table('stok_hareketleri as s')
                 ->selectRaw('Count(s.hareket_id) as kalem_sayisi,dp.depo_adi,s.belge_no,s.belge_tipi_id,s.hareket_tarihi')
                 ->selectRaw('IF(s.tedarik_turu=1, f.firma_unvan,d.depo_adi) firma_depo')
                 ->selectRaw('IF(s.hareket_tipi=1, "GİRİŞ","ÇIKIŞ") hareket_tipi')
                 ->leftJoin('depolar as d', 'd.depo_id', '=', 's.firma_depo_id')
                 ->leftJoin('firmalar as f', 'f.firma_id', '=', 's.firma_depo_id')
                 ->leftJoin('malzemeler as m', 'm.malzeme_id', '=', 's.malzeme_id')
                 ->leftJoin('depolar as dp','dp.depo_id', '=', 's.depo_id')
                 ->groupBy('belge_no')
                 ->get();



                 return response()->json($get_messages,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
