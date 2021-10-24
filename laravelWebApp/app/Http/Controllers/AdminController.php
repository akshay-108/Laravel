<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Providers\adminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\admin;
use App\Models\crud;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    public function checkAdminData(Request $request,admin $admin)
    {
        $request->validate([
            'adminName'=>'required|min:5',
            'adminPass'=>'required|min:8|max:16',
        ]);

        $adminInfo=admin::where('admin_name','=',$request->adminName)->first();
        if(!$adminInfo)
        {
            return back()->with('fail','We do not recognize your user name');   
        }else{
            // check password
            if($request->adminPass === $adminInfo->admin_password)
            {
                // if password correct
                $request->session()->put('LoggedUser',$adminInfo->id);
                return redirect('read');
            }else{
                // if password wrong
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // show data
        $crud=crud::paginate(8);
        return view('admin.read',compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud=crud::find($id);
        // return view('read',compact('crud'));
    
        return response()->json([
            'status'=>200,
            'crud'=>$crud,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,crud $crud)
    {
        // $crud=crud::find($id);
        // $crud->name=$request->get('name');
        // $crud->email=$request->get('email');
        // $crud->save();
        // return redirect('read');
        $data_id=$request->get('data_id');
        $crud=crud::find($data_id);
        $crud->name=$request->get('name');
        $crud->email=$request->get('email');

        $crud->update();

        return redirect('read')->with("success","Record updated Successfully...");

        // crud::find($request->id)->update($request->all());
        // return redirect('read')->with('success', 'Student has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data
        crud::destroy(array('id',$id));
        return redirect('read')->with("success","Record deleted Successfully...");
    }
}
