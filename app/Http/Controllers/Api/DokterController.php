<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dokter;

class DokterController extends Controller
{
    public function index(){
        $dokters = Dokter::with(['ruangan','operasi','koneksi'])->get();
        return response()->json([
            'type' => 'Sukses',
            'data' => $dokters
        ],200);
    }

    public function store(Request $request){
        $dokter = new Dokter;
        $dokter->name = $request->name;
        $dokter->specialist = $request->specialist;
        $dokter->ruangan_id = $request->ruangan_id;
        $dokter->operasi_id = $request->operasi_id;
        $dokter->koneksi()->attach($request->koneksi);
        $dokter->save();

        return response()->json([
            'type'=>'Sukses',
            'message' =>'Data dokter telah tersimpan'
        ],201);
    }

    public function show($id){
        $dokter = Dokter::find($id)->load(['ruangan','operasi','koneksi']);

        return response()->json([
            'type' => 'Sukses',
            'data' => $dokter
        ],200);
    }

    public function update(Request $request, $id){
        $dokter = Dokter::find($id);
        $dokter->name = $request->name;
        $dokter->specialist = $request->specialist;
        $dokter->ruangan_id = $request->ruangan_id;
        $dokter->operasi_id = $request->operasi_id;
        $dokter->save();

        return response()->json([
            'type' => 'Sukses',
            'message' => 'Data telah diperbaharui'
        ],201);
    }
    public function destroy($id){
        $dokter = dokter::find($id);
        $dokter->delete();

        return response()->json([
            'type' => 'Sukses',
            'message' => 'Data telah dihapus'
        ],200);
    }
}
