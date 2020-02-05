<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pasien;

class PasienController extends Controller
{
    public function index(){
        $pasiens = Pasien::with(['koneksi'])->get();
        return response()->json([
            'type' => 'Sukses',
            'data' => $pasiens
        ],200);
    }

    public function store(Request $request){
        $pasien = new Pasien;
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->keluhan = $request->keluhan;
        $pasien->koneksi()->attach($request->koneksi);
        $pasien->save();

        return response()->json([
            'type'=>'Sukses',
            'message' =>'Data pasien telah tersimpan'
        ],201);
    }

    public function show($id){
        $pasien = Pasien::find($id)->load(['koneksi']);

        return response()->json([
            'type' => 'Sukses',
            'data' => $pasien
        ],200);
    }

    public function update(Request $request, $id){
        $pasien = Pasien::find($id);
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->keluhan = $request->keluhan;
        $pasien->save();

        return response()->json([
            'type' => 'Sukses',
            'message' => 'Data telah diperbaharui'
        ],201);
    }
    public function destroy($id){
        $pasien = pasien::find($id);
        $pasien->delete();

        return response()->json([
            'type' => 'Sukses',
            'message' => 'Data telah dihapus'
        ],200);
    }
}
