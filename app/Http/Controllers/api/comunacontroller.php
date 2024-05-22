<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facade\DB;

class comunacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comuna = DB::table('tb_comuna')
        ->join('tb_municipio','tb_comuna.muni_codi','=','tb_municipio.muni_codi')
        ->select('tb_comuna.*',"tb_municipio.muni_nomb")
        ->get();
        return json_encode(['comunas'=>$comunas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comuna = new Comuna();
        $comuna ->comu_nomb = $request->comu_nob;
        $comuna ->muni_codi = $request->muni_codi;
        $comuna ->save();
        return json_decode(['comuna'=> $comuna]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comuna = Comuna::find($id);
        $municipios = DB::table('tb_municipio');
        ->orderby('muni_nomb')
        ->get();

        return json_encode(['comuna'=> $comuna,'municipios',=> $municipios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
