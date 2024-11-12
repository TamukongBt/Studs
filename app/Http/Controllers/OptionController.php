<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $option= Option::orderBy('OptionName','asc')->paginate(8); 
        return view('option.option')->with('option',$option);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('option.create');
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
        'Optionname' => 'required',
        'OptionID' => 'required',  
        'DepartmentID' =>'required', 
        'FacultyID' => 'required'
            
        ]);
        Option::create($data);
         return redirect()->route('option.index')->with('success','New Entry created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $option = Option::find($id);
        return view('option.show')->with('option',$option);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::find($id);
        return view('option.edit',compact('option','id'));
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
        'Optionname' => 'required',
        'OptionID' => 'required',
        'DepartmentID' =>'required', 
        'FacultyID' => 'required'
            
        ]);
        Option::whereId($id)->update($data);
         return redirect()->route('option.index')->with('Updated','New Entry created succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::findorFail($id);
        Option::whereId($option['id'])->delete();
        return redirect('/option')->with('success', 'Option has been deleted!!');
    }
}
