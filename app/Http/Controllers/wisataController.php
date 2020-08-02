<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class wisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('wisata')->get();
        return response($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function getById($id_wisata)
    {
        return response(DB::table('wisata')->where('id_wisata', $id_wisata)->get());
    }
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
        // return response($_POST);
        $wisata = [
            'id_wisata' => Str::random(5),
            'kategori' => $request->kategori,
            'nama_wisata' => $request->nama_wisata,
            'alamat_wisata' => $request->alamat_wisata,
            'fasilitas' => $request->fasilitas,
        ];
        try {
            DB::table('wisata')->insert($wisata);
            return response(['message' => 'Berhasil menambahkan tempat wisata' . $wisata['nama_wisata']]);
        } catch (\Throwable $th) {
            return response(['message' => 'Terjadi kesalahan', 'error' => $th], 500);
        }
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
    public function update(Request $request, $id_wisata)
    {
        $wisata = [];
        if (isset($request->wisata))
            $wisata['nama_wisata'] = $request->wisata;
        if (isset($request->kategori))
            $wisata['kategori'] = $request->kategori;
        if (isset($request->alamat))
            $wisata['alamat_wisata'] = $request->alamat_wisata;
        if (isset($request->fasilitas))
            $wisata['fasilitas'] = $request->fasilitas;
        try {
            DB::table('wisata')->where('id_wisata', $id_wisata)->update($wisata);
            return response(['message' => 'Berhasil memperbarui tempat wisata' . $id_wisata]);
        } catch (\Throwable $th) {
            return response(['message' => 'Terjadi kesalahan', 'error' => $th], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_wisata)
    {
        try {
            DB::table('wisata')->where('id_wisata', $id_wisata)->delete();
            return response(['message' => 'Berhasil menghapus tempat wisata' . $id_wisata]);
        } catch (\Throwable $th) {
            return response(['message' => 'Terjadi kesalahan', 'error' => $th], 500);
        }
    }
}
