<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGroup;

class GroupController extends Controller
{
    public function index()
    {
        if (request()->ajax()) 
        {
            $row = UserGroup::get();
            return response()->json(['data' => $row]);
        }
        return view('pages.group.index');
    }

    public function create()
    {
        return view('pages.group/form');
    }

    public function edit($id)
    {
        $group = UserGroup::where('usergroupid', $id)->firstOrFail();
        return view('pages.group/form', compact('group'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'usergroupid'    => 'required|min:5',
            'usergroupname' => 'required',
        ]);
        
        if($request->input('state') == 'insert'){
            $user = UserGroup::where('usergroupid', trim($request->input('usergroupid')) )->first();
            if($user)
            {
                return back()->withInput()->with('error_message', 'GroupId is registered!');
                
            }else{
                #insert
                UserGroup::create([
                    'usergroupid' => trim($request->input('usergroupid')),
                    'usergroupname' => trim($request->input('usergroupname')),
                ]);
                return redirect()->route('group.index')->with('message', 'Group save successfully!');
            }

        }else{
            $user = User::where('usergroupid', $request->input('usergroupid'))->update(['usergroupname' => $request->input('usergroupname')]);

            return redirect()->route('group.index')->with('message', 'Group save successfully!');
        }
    }

    public function delete($id)
    {
        UserGroup::where('usergroupid', $id)->delete();

        return redirect()->route('group.index')->with('message', 'Group deleted successfully!');
    }
}
