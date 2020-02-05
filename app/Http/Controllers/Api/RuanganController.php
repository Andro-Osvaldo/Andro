<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ruangan;

class RuanganController extends Controller
{
    public function index(){
        $ruangan = Ruangan::get();

        return response()->json([
            'type' => 'Sukses',
            'data' => $ruangan
        ],200);
    }
    public function show($id){
        $ruangan = Ruangan::find($id);

        return response()->json([
            'type' => 'Sukses',
            'data' => $ruangan
        ],200);
    }
    public function store(Request $request){
        $ruangan = new Ruangan;
        $ruangan->no= $request->no;
        $ruangan->ket= $request->ket;
        $ruangan->save();
        
        return response()->json([
            'type'=>'Sukses',
            'message' =>'Data telah tersimpan'
        ],201);
    }

    public function update(Request $request, $id){
        $ruangan = Ruangan::find($id);
        $ruangan->no= $request->no;
        $ruangan->ket= $request->ket;
        $ruangan->save();

        return response()->json([
            'type' => 'Sukses',
            'message' => 'Data telah diperbaharui'
        ],201);
    }
    public function destroy($id){
        $ruangan = Ruangan::find($id);
        $ruangan->delete();

        return response()->json([
            'type' => 'Sukses',
            'message' => 'Data telah dihapus'
        ],200);
    }
}
