<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Pagination\LengthAwarePaginator;
use App\Lecturer;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturer= Lecturer::orderBy('LecturerName','desc')->paginate(12);
        $show= Lecturer::all(); 
      
        return view('lecturer.lecturer')->with('lecturer',$lecturer)->with('show',$show);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $lecturer = new Lecturer();
        $data = $this->validate ($request, [
        
            'title' => 'required|string',
            'LecturerName' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'telephone' => 'required|string|max:50',
            'DepartmentID' => 'required|string|max:50',
            'FacultyID' => 'required|string|max:50'
        ]);

         try {
            $lecturer = Lecturer::create($data);
            return redirect()->route('lecturer.index')->with('success','New Entry created');
        }  catch (\Illuminate\Database\QueryException $ex) {
            return back()->withError("This Lecturer already exist on the database.")->withInput();
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Lecturer::find($id);
        return view()->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturer.edit', compact('lecturer'));
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
        $lecturer = Lecturer::findorFail($id);
        $data = $this->validate ($request, [
        
            'title' => 'required|string',
            'LecturerName' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'telephone' => 'required|string|max:50',
            'DepartmentID' => 'required|string|max:50',
            'FacultyID' => 'required|string|max:50'
        ]);
        $lecturer= Lecturer::whereId($lecturer['id'])->update($data);
        return redirect()->route('lecturer.index')->with('success','Your changes have been Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::findorFail($id);
        Lecturer::whereId($lecturer['id'])->delete();
        return redirect()->route('lecturer.index')->with('success','Your entry has been succesfully deleted');

    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
    
        if($request->ajax())
    {
    $output="";
    $lecturer=Lecturer::where('title','LIKE','%'.$request->search."%")->get();
    if($lecturer)
    {
    foreach ($lecturer as  $lecture) {
    $output.='<tr>'.
    '<td>'.$lecture->id.'</td>'.
    '<td>'.$lecture->title.'</td>'.
    '<td>'.$lecture->LecturerName.'</td>'.
    '<td>'.$lecture->telephone.'</td>'.
    '</tr>';
    }
    return Response($output);
    }  }  }
}
