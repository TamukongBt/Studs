<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department= Department::orderBy('DepartmentName','asc')->paginate(8); 
        return view('department.department')->with('department',$department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $this->validate ($request, [
        
            'DepartmentID' => 'required|string',
            'DepartmentName' => 'required|string',
            'FacultyID' => 'required',
            'FacultyName' =>'required'
        ]);
        Department::create($data);
         return redirect()->route('department.index')->with('success','New Entry created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $department = Department::find($id);
       return view('department.show')->with('department',$department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('department.edit', compact('department','id'));
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
        $data = $this->validate ($request, [
        
            'DepartmentID' => 'required|string',
            'DepartmentName' => 'required|string',
            'FacultyID' => 'required',
            'FacultyName' =>'required'
        ]);
        Department::whereId($id)->update($data);
         return redirect()->route('department.index')->with('Updated','New Entry created succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findorFail($id);
        Department::whereId($department['id'])->delete();
        return redirect('/department')->with('success', 'Department has been deleted!!');
    }
}
