<?php

namespace App\Http\Controllers;
use App\Models\Malzemeler;

use Illuminate\Http\Request;

class MalzemelerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Malzemeler::get(),200);
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
