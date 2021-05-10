<?php

namespace App\Http\Controllers;
use App\Models\Malzemeler;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MalzemelerController extends Controller
{
    /**
     * Display a listing                                                                                               *f the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $get_messages=DB::table('malzemeler as m')
        ->selectRaw('m.malzeme_id,m.malzeme_adi,m.depo_id,m.malzeme_birim,d.depo_adi')
        ->selectRaw('(SUM(IF(s.hareket_tipi = 1, s.miktar, 0))+SUM(IF(s.hareket_tipi = 2, s.miktar*-1, 0))) as malzeme_miktar')
        ->leftJoin('depolar as d', 'd.depo_id', '=', 'm.depo_id')
        ->leftJoin('stok-hareketleri as s', 's.malzeme_id', '=', 'm.malzeme_id')
        ->groupBy('m.malzeme_id')->get();


        //$get_messages->selectRaw('m.malzeme_adi,m.depo_id,m.malzeme_birim,d.depo_adi')->get();

        //CONVERT(INT, game_points)
           /*
        SELECT m.malzeme_adi,m.depo_id,m.malzeme_birim,d.depo_adi,
        (SUM(IF(s.hareket_tipi = 1, s.miktar, 0))+SUM(IF(s.hareket_tipi = 2, s.miktar*-1, 0))) as miktar
        FROM depo_backend.`malzemeler` m
        JOIN depo_backend.`depolar` d on d.depo_id=m.depo_id
        JOIN depo_backend.`stok-hareketleri` s on s.malzeme_id=m.malzeme_id
        group by m.malzeme_id
        */
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
        $malzeme = new Malzemeler();
        $malzeme->malzeme_adi = $request->malzeme_adi;
        $malzeme->malzeme_birim = $request->malzeme_birim;
        $malzeme->depo_id=$request->depo_id;
        $malzeme->malzeme_miktar = 0;
        $malzeme->save();

        return response()->json($malzeme,200);
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
    public function update(Request $request, $malzeme_id)
    {
        //
        $malzeme = Malzemeler::find($malzeme_id);
        $malzeme->malzeme_adi = $request->malzeme_adi;
        $malzeme->malzeme_birim=$request->malzeme_birim;
        $malzeme->depo_id=$request->depo_id;
        $malzeme->update();

        //firma bilgileri geri döndürülecek daha sonra
        return response()->json($malzeme,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($malzeme_id)
    {
        //
        Malzemeler::destroy($malzeme_id);
        return response()->json(['malzeme_id'=>$malzeme_id],200);
    }
}
