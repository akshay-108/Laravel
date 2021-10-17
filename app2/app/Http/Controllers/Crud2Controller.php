<?php

namespace App\Http\Controllers;

use App\Models\crud2;
use Illuminate\Http\Request;

class Crud2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show insert page
        return view('insert');
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

        // insert and validate data
        $crud2=new crud2;
        $crud2->name=$request->get('name');
        $crud2->email=$request->get('email');
        $crud2->cpass=$request->get('cpass');
        $crud2->save();
        return redirect('insert');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud2  $crud2
     * @return \Illuminate\Http\Response
     */
    public function show(crud2 $crud2)
    {
        //show data
        $crud2=crud2::all();
        return view('insert',compact('crud2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud2  $crud2
     * @return \Illuminate\Http\Response
     */
    public function edit(crud2 $crud2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crud2  $crud2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud2 $crud2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud2  $crud2
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud2 $crud2)
    {
        //
    }
}
