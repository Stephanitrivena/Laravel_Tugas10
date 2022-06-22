<?php

namespace App\Http\Controllers\Api;

use App\Models\Friends;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friends::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Daftar Nama Teman',
            'data' => $friends
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255|',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $friends = new Friends;
 
        $friends->nama = $request->nama;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;
        $friends->save();

        if($friends) {
            return response()->json([
                'success' => true,
                'message' => 'Teman berhasil di tambahkan',
                'data' => $friends
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Teman gagal di tambahkan',
                'data' => $friends
            ], 409);
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
        $friends = Friends::where('id',$id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail teman',
            'data' => $friends
        ],200);
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
        $friends = Friends::find($id)
        ->update([
        'nama'=>$request->nama,
        'no_tlp' =>$request->no_tlp,
        'alamat' => $request->alamat
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data teman berhasil di rubah',
            'data' => $friends
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friends = Friends::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data teman berhasil di hapus',
            'data' => $friends
        ],200);
    }
}
