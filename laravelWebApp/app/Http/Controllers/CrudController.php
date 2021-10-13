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
            'name'=>'required',
            'email'=>'required'
        ]);
        $crud=new crud;
        $crud->name=$request->get('name');
        $crud->email=$request->get('email');
        $crud->save();
        return redirect('create');
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
        return view('home',compact('crud'));
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
       return view('edit',compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,crud $crud,$id)
    {
        $crud=crud::find($id);
        $crud->name=$request->get('name');
        $crud->email=$request->get('email');
        $crud->save();
        return redirect('create');
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
        return redirect('create');
    }
}
