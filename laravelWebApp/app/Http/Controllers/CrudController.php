<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\crud;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //stroe data in cruds table
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required',
            'pass1'=>'required|min:8',
            'pass2'=>'required|min:8',
        ]);
        $crud=new crud;
        $crud->name=$request->get('name');
        $crud->email=$request->get('email');
        $crud->tpassword=$request->get('pass1');
        $crud->password=$request->get('pass2');

        $request->session()->put('name',$crud->name);
        echo session('name');
        // return false;

        if(!$crud->password == $crud->tpassword) {
            return "Password not matched";
        }

        $crud->save();
        return redirect('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
        // show data
        $crud=crud::paginate(3);
        return view('read',compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(crud $crud,$id)
    {
       $crud=crud::find($id);
    //    return view('read',compact('crud'));

        return response()->json([
            'status'=>200,
            'crud'=>$crud,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crud  $crud
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
        return redirect('read')->with("success","Record updated Successfully...");;

        // crud::find($request->id)->update($request->all());
        // return redirect('read')->with('success', 'Student has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud $crud,$id)
    {
        crud::destroy(array('id',$id));
        return redirect('read')->with("success","Record deleted Successfully...");

    }
}
