<?php

namespace App\Http\Controllers;
use App\Models\Firmalar;

use Illuminate\Http\Request;

class FirmalarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Firmalar::get(),200);
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
        $firma = new Firmalar();
        $firma->firma_unvan = $request->firma_unvan;
        $firma->firma_tip = $request->firma_tip;
        $firma->firma_tur = $request->firma_tur;
        $firma->save();
        
        return response()->json($firma,200);
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
    public function update(Request $request, $firma_id)
    {
        //
        $firma = Firmalar::find($firma_id);
        $firma->firma_unvan = $request->firma_unvan;
        $firma->firma_tip = $request->firma_tip;
        $firma->firma_tur = $request->firma_tur;
        $firma->update();
        
        //firma bilgileri geri döndürülecek daha sonra 
        return response()->json($firma,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($firma_id)
    {
        //
        Firmalar::destroy($firma_id); 
        return response()->json(['firma_id'=>$firma_id],200);
    }
}
