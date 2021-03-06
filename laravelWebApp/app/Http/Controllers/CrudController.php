<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check validate or not
        $request->validate([
            'name'=>'required|min:5|unique:cruds',
            'email'=>'required|email|unique:cruds',
            'password'=>'required|min:8|max:16',
        ]);

        // insert data in database
        $crud=new crud;
        $crud->name=$request->get('name');
        $crud->email=$request->get('email');
        $crud->password=$request->get('password');

        // if(!$crud->password === $tp_pass){
        //     return "Password not matched";
        // }

        $crud->save();

        // check data added or not in database
        if($crud)
        {
            return back()->with('success','new user added to the database');
        }else{
            return back()->with('fail','something went wrong, try again later');
        }
        return redirect('profile');
    }

    // view login page
    function getLogData()
    {
        return view('userlogin');
    }

    // check user are already member or not
    function userCheck(Request $request)
    {
        // return $request->input();

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:16',
        ]);

        $userInfo=crud::where('email','=',$request->email)->first();

        if(!$userInfo)
        {
            //check email
            return back()->with('fail','we do not recognize your email address');
        }else{
            //check password
            if($request->password == $userInfo->password)
            {
                // if password correct
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('profile');

            }else{
                // if password wrong
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    // if email and password are correct then open this page
    function profile()
    {
        $data=['LoggedUserInfo'=>crud::where('id','=',session('LoggedUser'))->first()];
        return view('profile',$data);
    }

    function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('userlogin');
        }
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(crud $crud)
    {
      
        
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud $crud,$id)
    {
        

    }
}
