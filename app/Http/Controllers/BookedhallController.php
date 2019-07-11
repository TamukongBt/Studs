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
        $book = Bookedhall::orderBy('Building', 'asc')->paginate(8);
        return view('book.index')->with('book', $book);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
        $book->PeriodID = $request->PeriodID;
        $book->Building = $request->Building;
        $book->ClassID = $request->ClassID;
        $book->Duration = Carbon::parse($request->EndTime)->format('Y-m-d H:i:s');
        $book->Note = $request->Note;
        if (($request->get('StartTime') == '7:00am') && ($request->get('EndTime') == '9:00am')) {
            $book->PeriodID = '1';
        } else if (($request->get('StartTime') == '9:00am') && ($request->get('EndTime') == '11:00am')) {
            $book->PeriodID = '2';
        } else if (($request->get('StartTime') == '11:00am') && ($request->get('EndTime') == '1:00pm')) {
            $book->PeriodID = '3';
        } else if (($request->get('StartTime') == '1:00pm') && ($request->get('EndTime') == '3:00pm')) {
            $book->PeriodID = '4';
        } else if (($request->get('StartTime') == '3:00pm') && ($request->get('EndTime') == '5:00pm')) {
            $book->PeriodID = '5';
        } else if (($request->get('StartTime') == '5:00pm') && ($request->get('EndTime') == '7:00pm')) {
            $book->PeriodID = '6';
        } else if (($request->get('StartTime') == '7:00am') && ($request->get('EndTime') == '11:00am')) {
            $book->PeriodID = '7';
        } else if (($request->get('StartTime') == '9:00am') && ($request->get('EndTime') == '1:00pm')) {
            $book->PeriodID = '8';
        } else if (($request->get('StartTime') == '11:00am') && ($request->get('EndTime') == '3:00pm')) {
            $book->PeriodID = '9';
        } else if (($request->get('StartTime') == '1:00pm') && ($request->get('EndTime') == '5:00pm')) {
            $book->PeriodID = '10';
        } else if (($request->get('StartTime') == '3:00pm') && ($request->get('EndTime') == '7:00pm')) {
            $book->PeriodID = '11';
        } else {
            $book->PeriodID = 'Non Available';
        }
        $book->save();
        return redirect()->route('book.index')->with('success', 'New Entry created succesfully');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroyed()
    {
        $deleted = Bookedhall::onlyTrashed()->get();
        return view('book.deleted')->with('deleted', $deleted);
    }
}
