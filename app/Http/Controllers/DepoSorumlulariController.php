<?php

namespace App\Http\Controllers;
use App\Models\DepoSorumlulari;
use Illuminate\Http\Request;


class DepoSorumlulariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $deposorumlulari = $this->depo_sorumlularını_getir();
        return response()->json($deposorumlulari,200);
    }

    private function depo_sorumlularını_getir($id=null){

        if($id == null){
            $deposorumlulari = DepoSorumlulari::join('depolar', 'depolar.depo_id', '=', 'depo_sorumlulari.depo_id')
            ->join('sorumlular', 'sorumlular.sorumlu_id', '=', 'depo_sorumlulari.sorumlu_id')
            ->get(['depo_sorumlulari.*', 'sorumlular.sorumlu_ad_soyad','depolar.depo_adi']);
        }
        else{
        $deposorumlulari = DepoSorumlulari::join('depolar', 'depolar.depo_id', '=', 'depo_sorumlulari.depo_id')
              ->join('sorumlular', 'sorumlular.sorumlu_id', '=', 'depo_sorumlulari.sorumlu_id')
              ->where('depo_sorumlulari.depo_sorumlu_id', $id)
              ->get(['depo_sorumlulari.*', 'sorumlular.sorumlu_ad_soyad','depolar.depo_adi']);
        }
        
        return $deposorumlulari;
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
        $depo_sorumlulari= new DepoSorumlulari();
        $depo_sorumlulari->depo_id=$request->depo_id;
        $depo_sorumlulari->sorumlu_id=$request->sorumlu_id;
        $depo_sorumlulari->save();
        
        $deposorumlulari= self::depo_sorumlularını_getir($depo_sorumlulari->depo_sorumlu_id);
        return response()->json($deposorumlulari,200);
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
    public function edit($depo_sorumlu_id)
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
    public function update(Request $request, $depo_sorumlu_id)
    {
        //
        $depo_sorumlulari = DepoSorumlulari::find($depo_sorumlu_id);
        $depo_sorumlulari->sorumlu_id = $request->sorumlu_id;
        $depo_sorumlulari->depo_id=$request->depo_id;
        $depo_sorumlulari->update();
        
        //firma bilgileri geri döndürülecek daha sonra 
        $deposorumlulari= self::depo_sorumlularını_getir($depo_sorumlulari->depo_sorumlu_id);
        return response()->json($deposorumlulari,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($depo_sorumlu_id)
    {
        //
        DepoSorumlulari::destroy($depo_sorumlu_id); 
        return response()->json(['depo_sorumlu_id'=>$depo_sorumlu_id],200);
    }
}
