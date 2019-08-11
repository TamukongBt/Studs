<?php

namespace App\Http\Controllers;
Use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Classroom;




class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class= Classroom::orderBy('Building','asc')->paginate(8); 
        return view('pages.classroom')->with('classroom',$class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classpages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = new Classroom();
        $data = $this->validate ($request, [
        
            'Building' => 'required|string|unique:classrooms',
            'ClassID' => 'required|string|max:50|unique:classrooms',
            'Capacity' => 'required',
            'Access' =>'required'
        ]);
        $class = Classroom::create($data);
         return redirect()->route('class.index')->with('success','New Entry created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        $class= Classroom::find($request);
        return view('classpages.modal')->with('class', $class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    // relink to edit page
        $class= Classroom::find($id);
        return view('classpages.edit', compact('class','id'));
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
        // validate and store
        $data = $this->validate ($request, [
        
            'Building' => 'required|string',
            'ClassID' => 'required|string|max:50',
            'Capacity' => 'required',
            'Access' =>'required'
        ]);
        Classroom::whereId($id)->update($data);
        return redirect('/class')->with('success', 'Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Class
        $classroom = Classroom::findorFail($id);
        Classroom::whereId($classroom['id'])->delete();
        return redirect('/class')->with('success', 'Classroom has been deleted!!');
    }

   
}
