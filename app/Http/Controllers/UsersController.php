<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User,
    App\Models\UserGroup;
/*use Yajra\DataTables\Html\Button,
    Yajra\DataTables\Html\Column,
    Yajra\DataTables\Html\Editor\Editor,
    Yajra\DataTables\Html\Editor\Fields,
    Yajra\DataTables\Services\DataTable;*/

class UsersController extends Controller
{
    //
    public function index()
    {
        if (request()->ajax()) 
        {
            /*
                if using server side
            $row = User::get();
            return \DataTables::of( $row )
                    ->addColumn('Actions', function($data) {

                    })->rawColumns(['Actions'])->make(true);*/

            $row = User::get();
            return response()->json(['data' => $row]);
        }
        return view('pages.users.index');
        
    }

    public function create()
    {
        $group = UserGroup::select('usergroupid', 'usergroupname')->orderBy('usergroupname')->get();

        return view('pages.users/form', compact('group'));
    }

    public function edit($user)
    {
        $group = UserGroup::select('usergroupid', 'usergroupname')->orderBy('usergroupname')->get();
        $user = User::where('userid', $user)->firstOrFail();
        return view('pages.users/form', compact('user', 'group'));
    }


    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'userid'    => 'required|min:5',
            'username' => 'required|min:5',
            'usergroupid' => 'required',
        ]);
        
        if($request->input('state') == 'insert'){
            $user = User::where('userid', trim($request->input('userid')) )->first();
            if($user)
            {
                return back()->withInput()->with('error_message', 'Userid & Username is registered!');
                
            }else{
                #insert
                User::create([
                    'usergroupid' => trim($request->input('usergroupid')),
                    'userid' => trim($request->input('userid')),
                    'username' => trim($request->input('username')),
                    'userpassword' => trim(\Hash::make($request->input('userpassword'))),
                    'aktif' => $request->input('aktif') ? '1' : '0'
                ]);
                return redirect()->route('users.index')->with('message', 'Users save successfully!');
            }

        }else{
            $user = User::where('userid', $request->input('userid'))->update(['usergroupid' => $request->input('usergroupid'), 'aktif' => $request->input('aktif') ? '1' : '0' ]);

            return redirect()->route('users.index')->with('message', 'Users save successfully!');
        }
        
    }

    public function destroy($id)
    {
        User::where('userid', $id)->update(['aktif' => '0']);

        return redirect()->route('users.index')->with('message', 'Users in active successfully!');
    }
}
