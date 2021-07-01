<?php

namespace App\Http\Controllers;
use App\Models\StokHareketleri;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StokHareketleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hareket_getir($id=null){

          $get_messages=DB::table('stok_hareketleri as s')
         ->selectRaw('s.hareket_id,s.miktar,dp.depo_adi,s.belge_no,s.belge_tipi_id,s.hareket_tarihi,m.malzeme_adi,m.malzeme_birim')
         ->selectRaw('IF(s.tedarik_turu=1, f.firma_unvan,d.depo_adi) firma_depo')
         ->selectRaw('IF(s.hareket_tipi=1, "GİRİŞ","ÇIKIŞ") hareket_tipi')
         ->leftJoin('depolar as d', 'd.depo_id', '=', 's.firma_depo_id')
         ->leftJoin('firmalar as f', 'f.firma_id', '=', 's.firma_depo_id')
         ->leftJoin('malzemeler as m', 'm.malzeme_id', '=', 's.malzeme_id')
         ->leftJoin('depolar as dp','dp.depo_id', '=', 's.depo_id')
         ->whereIn('hareket_id', $id)
         ->get();



         return $get_messages;
    }

    public function index()
    {
         //tedarik turu 1 ise
         $get_messages=DB::table('stok_hareketleri as s')
         ->selectRaw('s.hareket_id,s.miktar,dp.depo_adi,s.belge_no,s.belge_tipi_id,s.hareket_tarihi,m.malzeme_adi,m.malzeme_birim')
         ->selectRaw('IF(s.tedarik_turu=1, f.firma_unvan,d.depo_adi) firma_depo')
         ->selectRaw('IF(s.hareket_tipi=1, "GİRİŞ","ÇIKIŞ") hareket_tipi')
         ->leftJoin('depolar as d', 'd.depo_id', '=', 's.firma_depo_id')
         ->leftJoin('firmalar as f', 'f.firma_id', '=', 's.firma_depo_id')
         ->leftJoin('malzemeler as m', 'm.malzeme_id', '=', 's.malzeme_id')
         ->leftJoin('depolar as dp','dp.depo_id', '=', 's.depo_id')
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
        $total=count($request->malzemeler);

        for ($i = 0; $i < $total; $i++) {
                $hareketler[] = [
                    'malzeme_id' => $request->malzemeler[$i]['malzeme'],
                    'miktar' => $request->malzemeler[$i]['miktar'],
                    'belge_no' => $request->belge_no,
                    'belge_tipi_id' => $request->belge_tipi_id,
                    'firma_depo_id' => $request->firma_depo_id,
                    'hareket_tarihi' => $request->hareket_tarihi,
                    'hareket_tipi' => $request->hareket_tipi,
                    'sorumlu_id' => $request->sorumlu_id,
                    'tedarik_turu'=>$request->tedarik_turu,
                    'depo_id'=>$request->depo_id,
                ];

         }

         StokHareketleri::insert($hareketler);
         $lastIds = StokHareketleri::orderBy('hareket_id', 'desc')->take($total)->pluck('hareket_id');
         return response()->json(self::hareket_getir($lastIds), 200);

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
