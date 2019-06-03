<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Schedule extends Model
{
    protected $fillable = ['Day','CourseCode','CourseName','OptionID','PeriodID', 'ClassroomID',
    'DepartmentID',
    'Lecturer','Level'];
  

    public function saveData($data){

    
        $this->Day=$data['Day'];
        $this->CourseCode=$data['CourseCode'];
        $this->CourseName=$data['CourseName'];
        $this->OptionID=$data['OptionID'];
    
        if (($data['StartTime']=='7:00am') && ( $data['EndTime']=='9:00am')) {
            $this->PeriodID='1';}
        else if (($data['StartTime']=='9:00am') && ($data['EndTime']=='11:00am')) {
            $this->PeriodID='2';
        }
        else if (($data['StartTime']=='11:00am') && ($data['EndTime']=='1:00pm')) {
            $this->PeriodID='3';
        }  
        else if (($data['StartTime']=='1:00pm') && ($data['EndTime']=='3:00pm')) {
            $this->PeriodID='4'; 
        }
        else if (($data['StartTime']=='3:00pm') && ( $data['EndTime']=='5:00pm')) {
            $this->PeriodID='5'; 
        }
        else if (($data['StartTime']=='5:00pm') && ($data['EndTime']=='7:00pm')) {
        $this->PeriodID='6';
        }
            else if (($data['StartTime']=='7:00am') && ($data['EndTime']=='11:00am')) {
            $this->PeriodID='7';
        }
        else if (($data['StartTime']=='9:00am') && ($data['EndTime']=='1:00pm')) {
            $this->PeriodID='8';
        }
        else if (($data['StartTime']=='11:00am') && ($data['EndTime']=='3:00pm')) {
            $this->PeriodID='9';
                        }
        else if (($data['StartTime']=='1:00pm') && ($data['EndTime']=='5:00pm')) {
            $this->PeriodID='10'; } 
        else if (($data['StartTime']=='3:00pm') && ($data['EndTime']=='7:00pm')) {
            $this->PeriodID='11';} 
            else {
            $this->PeriodID='Mouffff';
            }               
        
        
        $this->ClassroomID=$data['ClassroomID'];
        $this->DepartmentID=$data['DepartmentID'];
        $this->Lecturer=$data['Lecturer'];
        $this->Level=$data['Level'];
            // try for already existing data
         try {
            $this->save();
            return back()->with('success','New Entry created')->withInput();
        }  catch (\Illuminate\Database\QueryException $ex) {
            return back()->withError("This Venue is unavailable at this time")->withInput();
            
        }
       
        
       }

    public function updateData($data)
    {   
        $schedule =Schedule::find($data['id']);
        $this->Day=$data['Day'];
        $this->CourseCode=$data['CourseCode'];
        $this->CourseName=$data['CourseName'];
        $this->OptionID=$data['OptionID'];
    
        if (($data['StartTime']=='7:00am') && ( $data['EndTime']=='9:00am')) {
            $this->PeriodID='1';}
        else if (($data['StartTime']=='9:00am') && ($data['EndTime']=='11:00am')) {
            $this->PeriodID='2';
        }
        else if (($data['StartTime']=='11:00am') && ($data['EndTime']=='1:00pm')) {
            $this->PeriodID='3';
        }  
        else if (($data['StartTime']=='1:00pm') && ($data['EndTime']=='3:00pm')) {
            $this->PeriodID='4'; 
        }
        else if (($data['StartTime']=='3:00pm') && ( $data['EndTime']=='5:00pm')) {
            $this->PeriodID='5'; 
        }
        else if (($data['StartTime']=='5:00pm') && ($data['EndTime']=='7:00pm')) {
        $this->PeriodID='6';
        }
            else if (($data['StartTime']=='7:00am') && ($data['EndTime']=='11:00am')) {
            $this->PeriodID='7';
        }
        else if (($data['StartTime']=='9:00am') && ($data['EndTime']=='1:00pm')) {
            $this->PeriodID='8';
        }
        else if (($data['StartTime']=='11:00am') && ($data['EndTime']=='3:00pm')) {
            $this->PeriodID='9';
                        }
        else if (($data['StartTime']=='1:00pm') && ($data['EndTime']=='5:00pm')) {
            $this->PeriodID='10'; } 
        else if (($data['StartTime']=='3:00pm') && ($data['EndTime']=='7:00pm')) {
            $this->PeriodID='11';} 
            else {
            $this->PeriodID='Mouffff';
            }               
        $this->ClassroomID=$data['ClassroomID'];
        $this->DepartmentID=$data['DepartmentID'];
        $this->Lecturer=$data['Lecturer'];
        $this->Level=$data['Level'];
            // try for already existing data
            try {
                $this->save();
                return back()->with('success','New Entry created')->withInput();
            }  catch (\Illuminate\Database\QueryException $ex) {
                return back()->withError("This Venue is unavailable at this time")->withInput();
                
            }
    }

   public function classroom()
   {
       return $this->belongsTo('App\Classroom','ClassroomID','PeriodID');
   }
}


