<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Friends;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = \App\Models\Groups::orderBy('id','desc')->paginate(4);
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Groups.create');
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
            'name' => 'required|max:255|',
            'description' => 'required'
        ]);
 
        $group = new groups;
 
        $group->name = $request->name;
        $group->description = $request->description;
 
        $group->save();
        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Groups::where('id', $id)->first();
        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Groups::where('id', $id)->first();
        return view('groups.edit', ['groups' => $groups]);
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
        $request->validate([
            'name' => 'required|unique:groups|max:255|',
            'description' => 'required'
        ]);

        $group = Groups::find($id);
        $group->name = $request->name;
        $group->description = $request->description;
 
        $group->save();

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Groups::find($id)->delete();
        return redirect('/groups');
    }

    // menambahkan member
    public function addmember($id)
    {
        $friends = Friends::where('groups_id','=', 0)->get();
        
        $group = Groups::where('id', $id)->first();

        return view('groups.addmember', ['group' => $group, 'friends' => $friends]);
    }
// mengupdate data member
    public function updatemember(Request $request, $id)
    {
        $friends = Friends::where('id', $request->friend_id)->first();
        Friends::find($friends->id)->update([
            'groups_id' => $id
        ]);

        return redirect('/groups/#portfolio' );
    }
    // menghapus data member
    public function deletemember($id)
    {
        Friends::find($id)->update([
            'groups_id' => 0
        ]);
        return redirect('/groups/#portfolio');
    }
}
