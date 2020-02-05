<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Operasi;

class OperasiController extends Controller
{
    public function index(){
        $operasis = Operasi::with(['dokter'])->get();

        return response()->json([
            'type' => 'Sukses',
            'data' => $operasis
        ],200);
    }

    public function store(Request $request){
        $operasi = new Operasi;
        $operasi->tgl = $request->tgl;
        $operasi->kondisi = $request->kondisi;
        $operasi->save();

        return response()->json([
            'type'=>'Sukses',
            'message' =>'Data telah tersimpan'
        ],201);
    }

    public function show($id){
        $operasi = Operasi::find($id)->load(['dokter']);

        return response()->json([
            'type' => 'Sukses',
            'data' => $operasi
        ],200);
    }

    public function update(Request $request, $id){
        $operasi = Operasi::find($id);
        $operasi->tgl = $request->tgl;
        $operasi->kondisi = $request->kondisi;
        $operasi->save();

        return response()->json([
            'type' => 'Sukses',
            'message' => 'Data telah diperbaharui'
        ],201);
    }
    public function destroy($id){
        $operasi = Operasi::find($id);
        $operasi->delete();

        return response()->json([
            'type' => 'Sukses',
            'message' => 'Data telah dihapus'
        ],200);
    }
}
