<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user-management.admin.manage',[
            // 'users'=> User::all(),
            'admins'=>Admin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {    

        return view('backend.user-management.admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->user = User::saveData($request);
        $this->admin = Admin::saveData($request);
       

        return redirect()->route('admins.index')->with('success','Admin Create successfully');
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
    public function edit($slug)
    {
        return view('backend.user-management.admin.add',[
            // 'user'=> User::all()->last(),
            'admin'=>Admin::where('slug',$slug)->first(),
        ]);
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
       admin::updateData($request,$id);
        

        return redirect()->route('admins.index')->with('success','Admin Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // {   $user=User::find($id);
            $admin=Admin::find($id);
            if (file_exists($admin->image)){
                unlink($admin->image);
            }
            // $user->delete();
            $admin->delete();
            return redirect()->route('admins.index')->with('success','Admin Delete successfully');
            
        }
    }

