<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course= Courses::orderBy('CourseName','asc')->paginate(8); 
        return view('course.course')->with('course',$course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
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
        'CourseCode' => 'required',
        'CourseName' => 'required',
        'OptionID' => 'required',  
        'CourseType' =>'required', 
        'Level' => 'required',
        'LecturerName' => 'required',
        'LecturerName2' => 'string',
        'DepartmentID' => 'required        '
        ]);
        
        Courses::create($data);
         return redirect()->route('course.index')->with('success','New Entry created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CourseCode)
    {
        $course = Courses::where('CourseCode',$CourseCode)->first();
        if ($course==null) {
           return back()->withError('Sorry....No Course Of That Name Exist');
        }
        else {
            return view('course.show')->with('course',$course);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::find($id);
        return view('course.edit',compact('course','id'));
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
            'CourseCode' => 'required',
            'CourseName' => 'required',
            'OptionID' => 'required',  
            'CourseType' =>'required', 
            'Level' => 'required',
            'LecturerName' => 'required', 
            'LecturerName2' => 'string',
            'DepartmentID' => 'required'    
            ]);
        Courses::whereId($id)->update($data);
         return redirect()->route('course.index')->with('Updated','New Entry created succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::findorFail($id);
        Courses::whereId($course['id'])->delete();
        return redirect('/course')->with('success', 'Course has been deleted!!');
    }
}
