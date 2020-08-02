<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class pengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result =DB::table('pengunjung')->get();
        return response($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function getById($id)
{
    return response(DB::table('pengunjung')->where('id', $id)->get());
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
        $pengunjung = [
            'id' => Str::random(5),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'fasilitas' => $request->fasilitas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telpon' => $request->no_telpon
        ];
        try{
            DB::table('pengunjung')->insert($pengunjung);
            return response(['message' => 'Berhasil menambahkan pengunjung' .$pengunjung['nama']]);
    
        }catch(\Throwable $th){
            return response(['message' => 'Terjadi kesalahan','error' => $th],500);
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
    public function update(Request $request, $id)
    {
        $pengunjung =[];
        if(isset($request->$pengunjung))
        $pengunjung['nama'] = $request->$pengunjung;
        if(isset($request->alamat))
        $pengunjung['alamat'] = $request->alamat;
        if(isset($request->jenis_kelamin))
        $pengunjung['jenis_kelamin'] = $request->jenis_kelamin;
        if(isset($request->no_telpon))
        $pengunjung['no_telpon'] = $request->no_telpon;
        try {
            DB::table('pengunjung')->where('id' , $id)->update($pengunjung);
            return response(['message' => 'Berhasil memperbarui tempat pengunjung' . $id]);
        }catch(\Throwable $th){
            return response(['message' => 'Terjadi kesalahan','error' => $th],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('pengunjung')->where('id' ,$id)->delete();
            return response(['message' => 'Berhasil menghapus pengunjung' .$id]);
        }catch(\Throwable $th){
            return response(['message' => 'Terjadi kesalahan','error' => $th],500);
        }
    }
}
