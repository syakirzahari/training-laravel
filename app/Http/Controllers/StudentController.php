<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Hash;
use DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){

        $students = User::latest()->paginate(5);
  
        return view('crud.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::pluck('name', 'id');


        return view('crud.create', compact('groups'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'group_id' => $request->group_id,
        ]);
  
        // User::create($request->all());
   
        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        return view('crud.show',compact('student'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $groups = Group::pluck('name', 'id');

        return view('crud.edit',compact('student', 'groups'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'group_id' => $request->group_id
        ]);
  
        // $student->update($request->all());
  
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $student->delete();
  
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}
