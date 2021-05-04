<?php

namespace App\Http\Controllers;
use App\Models\Depolar;

use Illuminate\Http\Request;

class DepolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Depolar::get(),200);
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
        $depo = new Depolar();
        $depo->depo_adi = $request->depo_adi;
        $depo->save();
        
        return response()->json($depo,200);
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
    public function update(Request $request, $depo_id)
    {
        //
        $depo = Depolar::find($depo_id);
        $depo->depo_adi = $request->depo_adi;
        $depo->update();
        
        //firma bilgileri geri döndürülecek daha sonra 
        return response()->json($depo,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($depo_id)
    {
        //
        Depolar::destroy($depo_id); 
        return response()->json(['depo_id'=>$depo_id],200);
    }
}
