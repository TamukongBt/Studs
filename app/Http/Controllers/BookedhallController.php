<?php

namespace App\Http\Controllers;

use App\Bookedhall;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookedhallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $book = Bookedhall::orderBy('Building', 'asc')->paginate(8);
        return view('book.index')->with('book', $book);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $book = new Bookedhall;
        $book->Day = $request->Day;
        if (Auth::user()) {
            $book['Username'] = auth()->user()->name;
        } else {
            return view('auth.login')->withErrors('You are not an Authenticated User');
        }

        $book->Building = $request->Building;
        $book->ClassID = $request->ClassID;
        $book->Duration = Carbon::parse($request->EndTime)->format('Y-m-d H:i:s');
        $book->Note = $request->Note;
        if (($request->StartTime == '7:00 am') && ($request->EndTime == '9:00 am')) {
            $book->PeriodID = '1';
        } else if (($request->StartTime == '9:00 am') && ($request->EndTime == '11:00 am')) {
            $book->PeriodID = '2';
        } else if (($request->StartTime == '11:00 am') && ($request->EndTime == '1:00 pm')) {
            $book->PeriodID = '3';
        } else if (($request->StartTime == '1:00 pm') && ($request->EndTime == '3:00 pm')) {
            $book->PeriodID = '4';
        } else if (($request->StartTime == '3:00 pm') && ($request->EndTime == '5:00 pm')) {
            $book->PeriodID = '5';
        } else if (($request->StartTime == '5:00 pm') && ($request->EndTime == '7:00 pm')) {
            $book->PeriodID = '6';
        } else if (($request->StartTime == '7:00 am') && ($request->EndTime == '11:00 am')) {
            $book->PeriodID = '7';
        } else if (($request->StartTime == '9:00 am') && ($request->EndTime == '1:00 pm')) {
            $book->PeriodID = '8';
        } else if (($request->StartTime == '11:00 am') && ($request->EndTime == '3:00 pm')) {
            $book->PeriodID = '9';
        } else if (($request->StartTime == '1:00 pm') && ($request->EndTime == '5:00 pm')) {
            $book->PeriodID = '10';
        } else if (($request->StartTime == '3:00 pm') && ($request->EndTime == '7:00 pm')) {
            $book->PeriodID = '11';
        } else {
            $book->PeriodID = 'Non Available';
        }
        $book->CourseName = $request->CourseName;
        $book->CourseCode = $request->CourseCode;
        $book->DepartmentID = $request->DepartmentID;
        $book->save();
        return redirect()->route('book.index')->with('success', 'New Entry created succesfully');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

//    Show th orm for editing the specified resource.
//     *
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroyed()
    {
        $deleted = Bookedhall::onlyTrashed()->get();
        return view('book.deleted')->with('deleted', $deleted);
    }
}
