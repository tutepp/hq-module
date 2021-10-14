<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::paginate(5);
        return view ('backend.group',['groups'=>$groups]);
    }
    public function create()
    {
        $groups =Group::where('parent_id',0)->get();
        return view('backend.create-edit-group', ['groups'=>$groups]);
    }
    public function store(Request $request)
    {
        $group =Group::create($request->all());
        $group->save();
        Toastr::success('Create new Item complete', 'Success', ["positionClass" => "toast-top-right"]);
        return Redirect::back();
    }
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        $groups = Group::all();
        return view('backend.create-edit-group', ['group'=>$group ,'groups'=>$groups]);
    }
    public function update(Request $request,$id)
    {
        $group = Group::find($id);
        $group->update($request->all());
        return redirect()->route('groups.index');
    }



}
