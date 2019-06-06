<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Bookedhall;
use Carbon\Carbon;
use Auth;

class BookedhallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $book = new Bookedhall;
        $book->Day = $request->Day;
        if(Auth::user()){
            $book['Username'] = auth()->user()->name;
        }
        else {return view('auth.login')->withErrors('You are not an Authenticated User');}
        $book->PeriodID = $request->PeriodID;
        $book->Building = $request->Building;
        $book->Capacity = $request->Capacity;
        $book->ClassID = $request->ClassID;
        $book->Access = $request->Access;
        return $request->PeriodID;
        $EndTime=null;
        switch ($request->PeriodID) {
            case '1':
            $EndTime ='9:00 am';
                break;
            case '2':
            $EndTime=  '11:00 am';
                break;
            case '3':
            $EndTime= '1:00 pm';
                break;
            case '4':
            $EndTime= '3:00 pm';
                break;
            case '5':
            $EndTime= '5:00pm';
                break;
            case '6':
            $EndTime='7:00pm';
                break;    
            case '7':
        $EndTime= '11:00am';
                break; 
            case '8':
            $EndTime='1:00pm';
                break; 
                case '9':
            $EndTime='3:00pm';
                break; 
                case '10':
            $EndTime='5:00pm';
                break; 
                case '11':
            $EndTime='7:00pm';
                break; 
                default:
                $EndTime= 'No entry';
            }
            return $EndTime;
        $book->Duration = Carbon::parse($EndTime)->format('Y-m-d H:i:s');
        return $book->Duration;
        $book->Note = $request->Note;
        $book->save();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
