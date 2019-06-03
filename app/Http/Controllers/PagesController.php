<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='Welcome to Studs';
    return view('index')->with('title',$title);
    }

    public function about(){
        return view('pages.about');
        }

    public function classroom(){
        return view('pages.classroom');
        }

       
    }