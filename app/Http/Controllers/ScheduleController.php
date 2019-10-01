<?php

namespace App\Http\Controllers;

use App\Bookedhall;
use App\Freehalls;
use App\Schedule;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{  /**
     * Display a listing of the resource for the schedules.
     *
 * @return Response
     */
    public function index()
    {
        $schedule= Schedule::orderBy('created_at','desc')->paginate(8); 
        return view('schedulepages.schedule')->with('schedule',$schedule);
    }

    public function lindex()
    {

        $freed=FreeHalls::all();
        $schedule= Schedule::where('Lecturer', Auth::user()->name)->select(DB::raw(' `Day` As "Day",`PeriodID` AS "PeriodID",`ClassroomID` As "ClassID",`Lecturer` AS "Username",`CourseCode` AS "Coursecode",`CourseName` AS "CourseName",`DepartmentID`as "DepartmentID" '))->whereNotIn(['Day','PeriodID','ClassID'],$freed);
        $booked= Bookedhall::where('Username',Auth::user()->name)->select(DB::raw(' `Day` As "Day",`PeriodID` AS "PeriodID",`ClassID` As "ClassID",Username AS "Username",CourseCode AS "Coursecode",CourseName AS "CourseName",DepartmentID as "DepartmentID"'))->whereNotIn(['Day','PeriodID','ClassID'],$freed);
        $all = $schedule->union($booked)->get();


        $schedul = Schedule::where('DepartmentID', Auth::user()->DepartmentID)->select(DB::raw(' `Day` As "Day",`PeriodID` AS "PeriodID",`ClassroomID` As "ClassID",`Lecturer` AS "Username",`CourseCode` AS "Coursecode",`CourseName` AS "CourseName",`DepartmentID`as "DepartmentID" '))->whereNotIn(['Day', 'PeriodID', 'ClassID'], $freed);
        $booke = Bookedhall::where('DepartmentID', Auth::user()->DepartmentID)->select(DB::raw(' `Day` As "Day",`PeriodID` AS "PeriodID",`ClassID` As "ClassID",Username AS "Username",CourseCode AS "Coursecode",CourseName AS "CourseName",DepartmentID as "DepartmentID"'))->whereNotIn(['Day', 'PeriodID', 'ClassID'], $freed);
        $al = $schedul->union($booke)->get();
        if (count($all) > 0) {

            return view('pages.lindex')->with('all', $all);
        } else {

            return view('pages.lindex')->with('all', $al);
        }
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('schedulepages.create');
    }

    /**
     * Store a newly created resource in storage.       
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {   
        $schedule = new Schedule();
        $data = $request->validate([
            'Day'=>'required',
            'CourseCode'=>'required',
            'CourseName'=>'required',
            'StartTime'=>'required',
            'EndTime'=>'required',
            'OptionID'=>'required',
            'ClassroomID'=>'required',
            'DepartmentID'=>'required',
            'Lecturer'=>'required',
            'Level'=>'required']);
            // function to save the data
            $schedule->saveData($data);
           return redirect()->route('schedule.index');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($Day, $id)
    {
        $display= Schedule::find($id);
        $schedule=Schedule::where('Day',$Day)->orderby('created_at','desc')->paginate(7);
    //    Sort data and display

         return view('schedulepages.show')->with('schedule', $schedule)->with('display',$display);
    }

 /**
     * Display the specified resource.
     *
     * @param  int  $id
  * @return Response
     */
    public function showCourse($CourseCode , $id)
    {
        $show= Schedule::find($id);
        $schedule=Schedule::where('CourseCode',$CourseCode)->paginate(5);
        //    Sort data and display
        return view('schedulepages.showCourse')->with('schedule', $schedule)->with('show',$show);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $schedule= Schedule::find($id);
        return view('schedulepages.edit', compact('schedule','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Day'=>'required',
            'CourseCode'=>'required',
            'CourseName'=>'required',
            'StartTime'=>'required',
            'EndTime'=>'required',
            'OptionID'=>'required',
            'ClassroomID'=>'required',
            'DepartmentID'=>'required',
            'Lecturer'=>'required',
            'Level'=>'required']);

            $schedule= Schedule::find($id);
            $schedule->Day=$request->get('Day');
            $schedule->CourseCode=$request->get('CourseCode');
            $schedule->CourseName=$request->get('CourseName');
            $schedule->OptionID=$request->get('OptionID');
            // gET AND STORE PERIOD id
            if (($request->get('StartTime')=='7:00am') && ( $request->get('EndTime')=='9:00am')) {
                $schedule->PeriodID='1';}
            else if (($request->get('StartTime')=='9:00am') && ($request->get('EndTime')=='11:00am')) {
                $schedule->PeriodID='2';
            }
            else if (($request->get('StartTime')=='11:00am') && ($request->get('EndTime')=='1:00pm')) {
                $schedule->PeriodID='3';
            }  
            else if (($request->get('StartTime')=='1:00pm') && ($request->get('EndTime')=='3:00pm')) {
                $schedule->PeriodID='4'; 
            }
            else if (($request->get('StartTime')=='3:00pm') && ( $request->get('EndTime')=='5:00pm')) {
                $schedule->PeriodID='5'; 
            }
            else if (($request->get('StartTime')=='5:00pm') && ($request->get('EndTime')=='7:00pm')) {
            $schedule->PeriodID='6';
            }
                else if (($request->get('StartTime')=='7:00am') && ($request->get('EndTime')=='11:00am')) {
                $schedule->PeriodID='7';
            }
            else if (($request->get('StartTime')=='9:00am') && ($request->get('EndTime')=='1:00pm')) {
                $schedule->PeriodID='8';
            }
            else if (($request->get('StartTime')=='11:00am') && ($request->get('EndTime')=='3:00pm')) {
                $schedule->PeriodID='9';
                            }
            else if (($request->get('StartTime')=='1:00pm') && ($request->get('EndTime')=='5:00pm')) {
                $schedule->PeriodID='10'; } 
            else if (($request->get('StartTime')=='3:00pm') && ($request->get('EndTime')=='7:00pm')) {
                $schedule->PeriodID='11';} 
                else {
                $schedule->PeriodID='Non Available';
                }               
            $schedule->ClassroomID=$request->get('ClassroomID');
            $schedule->DepartmentID=$request->get('DepartmentID');
            $schedule->Lecturer=$request->get('Lecturer');
                // try for existing data
                try {
                    $schedule->save();
                    return  redirect()->route('schedule.index')->with('success','Class Has Been Updated')->withInput();
                } catch (QueryException $ex) {
                    return  redirect()->route('schedule.index')->withError("This Venue is unavailable at this time")->withInput();
                    
                }
        }
        
        

    
    // SEARCH QUERY bASED ON DAY..
        public function search(Request $request){
            $search = $request->get('search');
            $schedule = Schedule::where('Day','like','%'.$search.'%')->paginate(5);
            return view('schedulepages.schedule',['schedule'=> $schedule]);   }    

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::findorFail($id);
            $schedule->delete();
        return redirect('/schedule')->with('success', 'Class has been deleted!!');
    }

  

}


