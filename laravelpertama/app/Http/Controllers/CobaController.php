<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {

        $friends = \App\Models\Friends::orderBy('id','desc')->paginate(3);

        return view('friends.index', compact('friends'));
    }
    public function create()
    {
        
        return view('friends.create');
    }
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
        return redirect('/');
    }

    public function show($id){
        $friends = Friends::where('id', $id)->first();
        // dd($friends);
        return view('friends.show', ['friends' => $friends]);
    }

    public function edit($id)
    {
        $friends = Friends::where('id', $id)->first();
        // dd($friends);
        return view('friends.edit', ['friends' => $friends]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255|',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required'
        ]);
        
        $friends = Friends::find($id);
        $friends->nama = $request->nama;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;

        $friends->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        Friends::find($id)->delete();
        return redirect('/');
    }
}