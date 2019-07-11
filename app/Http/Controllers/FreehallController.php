<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Pagination\LengthAwarePaginator;
use App\FreeHalls;
use DB;
use Auth;
use Carbon\Carbon;

class FreehallController extends Controller
{ 
    // query to fetch all the existing free periods on the tables based on what is on the bookedhalls freehalls and what is available on the schedule
    public function all(){
        $data=DB::select('SELECT  Building, Capacity, ClassID, Access, 1 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 1 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 1 and Day = "Monday") UNION (SELECT Building, Capacity, ClassID, Access,1 as PeriodID, "Monday" as Day from free_halls where PeriodID = 1 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 2 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 2 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 2 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 2 as PeriodID, "Monday" as Day from free_halls where PeriodID = 2 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 3 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 3 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 3 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 3 as PeriodID, "Monday" as Day from free_halls where PeriodID = 3 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 4 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 4 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 4 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 4 as PeriodID, "Monday" as Day from free_halls where PeriodID = 4 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 5 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 5 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 5 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 5 as PeriodID, "Monday" as Day from free_halls where PeriodID = 5 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 6 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 6 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 6 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 6 as PeriodID, "Monday" as Day from free_halls where PeriodID = 6 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 7 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 7 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 7 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 7 as PeriodID, "Monday" as Day from free_halls where PeriodID = 7 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 8 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 8 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 8 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 8 as PeriodID, "Monday" as Day from free_halls where PeriodID = 8 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 9 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 9 and Day = "Monday" UNION select ClassID from bookedhalls where PeriodID = 9 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 9 as PeriodID, "Monday" as Day from free_halls where PeriodID = 9 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 10 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 10 and Day ="Monday" UNION select ClassID from bookedhalls where PeriodID = 10 and Day = "Monday")) UNION (SELECT Building, Capacity, ClassID, Access, 10 as PeriodID, "Monday" as Day from free_halls where PeriodID = 10 and Day = "Monday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 11 as PeriodID, "Monday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 11 and Day ="Monday" UNION select ClassID from bookedhalls where PeriodID = 11 and Day = "Monday") ) UNION (SELECT Building, Capacity, ClassID, Access, 11 as PeriodID, "Monday" as Day from free_halls where PeriodID = 11 and Day = "Monday"  ) UNION 
        
        (select  Building, Capacity, ClassID, Access, 1 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 1 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 1 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 1 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 1 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 2 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 2 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 2 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 2 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 2 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 3 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 3 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 3 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 3 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 3 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 4 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 4 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 4 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 4 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 4 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 5 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 5 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 5 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 5 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 5 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 6 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 6 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 6 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 6 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 6 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 7 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 7 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 7 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 7 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 7 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 8 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 8 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 8 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 8 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 8 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 9 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 9 and Day = "Tuesday" UNION select ClassID from bookedhalls where PeriodID = 9 and Day = "Tuesday"))  UNION (SELECT Building, Capacity, ClassID, Access, 9 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 9 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 10 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 10 and Day ="Tuesday" UNION select ClassID from bookedhalls where PeriodID = 10 and Day = "Tuesday")) UNION (SELECT Building, Capacity, ClassID, Access, 10 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 10 and Day = "Tuesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 11 as PeriodID, "Tuesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 11 and Day ="Tuesday" UNION select ClassID from bookedhalls where PeriodID = 11 and Day = "Tuesday")) UNION (SELECT Building, Capacity, ClassID, Access, 11 as PeriodID, "Tuesday" as Day from free_halls where PeriodID = 11 and Day = "Tuesday"  ) UNION 
        
        (select  Building, Capacity, ClassID, Access, 1 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 1 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 1 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 1 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 1 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 2 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 2 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 2 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 2 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 2 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 3 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 3 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 3 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 3 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 3 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 4 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 4 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 4 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 4 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 4 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 5 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 5 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 5 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 5 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 5 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 6 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 6 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 6 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 6 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 6 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 7 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 7 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 7 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 7 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 7 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 8 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 8 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 8 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 8 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 8 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 9 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 9 and Day = "Wednesday" UNION select ClassID from bookedhalls where PeriodID = 9 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 9 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 9 and Day = "Wednesday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 10 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 10 and Day ="Wednesday" UNION select ClassID from bookedhalls where PeriodID = 10 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 10 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 10 and Day = "Wednesday" ) UNION 
        (select  Building, Capacity, ClassID, Access, 11 as PeriodID, "Wednesday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 11 and Day ="Wednesday" UNION select ClassID from bookedhalls where PeriodID = 11 and Day = "Wednesday")) UNION (SELECT Building, Capacity, ClassID, Access, 10 as PeriodID, "Wednesday" as Day from free_halls where PeriodID = 1 and Day = "Wednesday"  ) UNION 
        
        (select  Building, Capacity, ClassID, Access, 1 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 1 and Day = "Thursday"  UNION select ClassID from bookedhalls where PeriodID = 1 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 1 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 1 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 2 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 2 and Day = "Thursday"  UNION select ClassID from bookedhalls where PeriodID = 2 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 2 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 2 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 3 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 3 and Day = "Thursday" UNION  select ClassID from bookedhalls where PeriodID = 3 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 3 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 3 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 4 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 4 and Day = "Thursday" UNION  select ClassID from bookedhalls where PeriodID = 4 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 4 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 4 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 5 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 5 and Day = "Thursday" UNION  select ClassID from bookedhalls where PeriodID = 5 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 5 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 5 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 6 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 6 and Day = "Thursday" UNION  select ClassID from bookedhalls where PeriodID = 6 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 6 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 6 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 7 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 7 and Day = "Thursday" UNION  select ClassID from bookedhalls where PeriodID = 7 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 7 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 7 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 8 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 8 and Day = "Thursday" UNION  select ClassID from bookedhalls where PeriodID = 8 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 8 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 8 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 9 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 9 and Day = "Thursday" UNION  select ClassID from bookedhalls where PeriodID = 9 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 9 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 9 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 10 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 10 and Day ="Thursday" UNION  select ClassID from bookedhalls where PeriodID = 10 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 10 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 10 and Day = "Thursday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 11 as PeriodID, "Thursday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 11 and Day ="Thursday" UNION  select ClassID from bookedhalls where PeriodID = 11 and Day = "Thursday")) UNION (SELECT Building, Capacity, ClassID, Access, 11 as PeriodID, "Thursday" as Day from free_halls where PeriodID = 11 and Day = "Thursday"  ) UNION 
        
        (select  Building, Capacity, ClassID, Access, 1 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 1 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 1 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 1 as PeriodID, "Friday" as Day from free_halls where PeriodID = 1 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 2 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 2 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 2 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 2 as PeriodID, "Friday" as Day from free_halls where PeriodID = 2 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 3 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 3 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 3 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 3 as PeriodID, "Friday" as Day from free_halls where PeriodID = 3 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 4 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 4 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 4 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 4 as PeriodID, "Friday" as Day from free_halls where PeriodID = 4 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 5 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 5 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 5 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 5 as PeriodID, "Friday" as Day from free_halls where PeriodID = 5 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 6 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 6 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 6 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 6 as PeriodID, "Friday" as Day from free_halls where PeriodID = 6 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 7 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 7 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 7 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 7 as PeriodID, "Friday" as Day from free_halls where PeriodID = 7 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 8 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 8 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 8 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 8 as PeriodID, "Friday" as Day from free_halls where PeriodID = 8 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 9 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 9 and Day = "Friday" UNION select ClassID from bookedhalls where PeriodID = 9 and Day = "Friday"))  UNION (SELECT Building, Capacity, ClassID, Access, 9 as PeriodID, "Friday" as Day from free_halls where PeriodID = 9 and Day = "Friday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 10 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 10 and Day ="Friday" UNION select ClassID from bookedhalls where PeriodID = 10 and Day = "Friday") ) UNION (SELECT Building, Capacity, ClassID, Access, 10 as PeriodID, "Friday" as Day from free_halls where PeriodID = 10 and Day = "Friday" ) UNION 
        (select  Building, Capacity, ClassID, Access, 11 as PeriodID, "Friday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 11 and Day ="Friday" UNION select ClassID from bookedhalls where PeriodID = 11 and Day = "Friday") ) UNION (SELECT Building, Capacity, ClassID, Access, 11 as PeriodID, "Friday" as Day from free_halls where PeriodID = 11 and Day = "Friday" ) UNION 
        
        (select  Building, Capacity, ClassID, Access, 1 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 1 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 1 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 1 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 1 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 2 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 2 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 2 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 2 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 2 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 3 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 3 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 3 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 3 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 3 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 4 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 4 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 4 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 4 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 4 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 5 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 5 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 5 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 5 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 5 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 6 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 6 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 6 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 6 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 6 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 7 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 7 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 7 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 7 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 7 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 8 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 8 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 8 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 8 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 8 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 9 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 9 and Day = "Saturday" UNION select ClassID from bookedhalls where PeriodID = 9 and Day = "Saturday"))  UNION (SELECT Building, Capacity, ClassID, Access, 9 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 9 and Day = "Saturday"  ) UNION 
        (select  Building, Capacity, ClassID, Access, 10 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 10 and Day ="Saturday" UNION select ClassID from bookedhalls where PeriodID = 10 and Day = "Saturday")) UNION (SELECT Building, Capacity, ClassID, Access, 10 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 10 and Day = "Saturday" )  UNION 
        (select  Building, Capacity, ClassID, Access, 11 as PeriodID, "Saturday" as Day from classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = 11 and Day ="Saturday" UNION select ClassID from bookedhalls where PeriodID = 11 and Day = "Saturday")) UNION (SELECT Building, Capacity, ClassID, Access, 11 as PeriodID, "Saturday" as Day from free_halls where PeriodID = 11 and Day = "Saturday" ) 
        '); 
        
           // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($data);
 
        // Define how many items we want to be visible in each page
        $perPage = 15;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
               
        // set url path for generted links
        $paginatedItems->setPath(url('http://studs.test/generate'));
        return view('free.all')->with('all', $paginatedItems);
    }


    public function freehall(Request $request){
        // Getting PeriodID
        $PeriodID=null;
        if (($request->get('StartTime')=='7:00am') && ( $request->get('EndTime')=='9:00am')) {
            $PeriodID='1';}
        else if (($request->get('StartTime')=='9:00am') && ($request->get('EndTime')=='11:00am')) {
            $PeriodID='2';
        }
        else if (($request->get('StartTime')=='11:00am') && ($request->get('EndTime')=='1:00pm')) {
            $PeriodID='3';
        }  
        else if (($request->get('StartTime')=='1:00pm') && ($request->get('EndTime')=='3:00pm')) {
            $PeriodID='4'; 
        }
        else if (($request->get('StartTime')=='3:00pm') && ( $request->get('EndTime')=='5:00pm')) {
            $PeriodID='5'; 
        }
        else if (($request->get('StartTime')=='5:00pm') && ($request->get('EndTime')=='7:00pm')) {
        $PeriodID='6';
        }
            else if (($request->get('StartTime')=='7:00am') && ($request->get('EndTime')=='11:00am')) {
            $PeriodID='7';
        }
        else if (($request->get('StartTime')=='9:00am') && ($request->get('EndTime')=='1:00pm')) {
            $PeriodID='8';
        }
        else if (($request->get('StartTime')=='11:00am') && ($request->get('EndTime')=='3:00pm')) {
            $PeriodID='9';
                        }
        else if (($request->get('StartTime')=='1:00pm') && ($request->get('EndTime')=='5:00pm')) {
            $PeriodID='10'; } 
        else if (($request->get('StartTime')=='3:00pm') && ($request->get('EndTime')=='7:00pm')) {
            $PeriodID='11';} 
        // Query to get Classroom
        $free=DB::select('SELECT Building, Capacity, ClassID, Access, ? AS PeriodID,? AS Day FROM classrooms where classrooms.ClassID NOT IN (select ClassroomID from schedules where PeriodID = ? and Day = ?)', [ $PeriodID,$request->Day,$PeriodID,$request->Day]);
        // Get current page form url e.x. &page=1
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($free);
 
        // Define how many items we want to be visible in each page
        $perPage = 3;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
               
        // set url path for generted links
        $paginatedItems->setPath($request->url());
        
        return view('free.free')->with('free', $paginatedItems);
    }

    public function store(Request $request)
    {
        $book = new Freehalls;
        $book->Day = $request->Day;
        $book->PeriodID = $request->PeriodID;
        $book->Building = $request->Building;
        $book->ClassID = $request->ClassID;
        $book->Access = $request->Access;
        $book->Capacity = $request->Capacity;
        $book->Duration = Carbon::parse($request->EndTime)->format('Y-m-d H:i:s');
        $due=Carbon::parse($book->Duration)->format('Y-m-d');
        $book->Note = $request->Note;
        $book->DepartmentID=$request->DepartmentID;
        if (($request->get('StartTime')=='7:00am') && ( $request->get('EndTime')=='9:00am')) {
            $book->PeriodID='1';}
        else if (($request->get('StartTime')=='9:00am') && ($request->get('EndTime')=='11:00am')) {
            $book->PeriodID='2';
        }
        else if (($request->get('StartTime')=='11:00am') && ($request->get('EndTime')=='1:00pm')) {
            $book->PeriodID='3';
        }  
        else if (($request->get('StartTime')=='1:00pm') && ($request->get('EndTime')=='3:00pm')) {
            $book->PeriodID='4'; 
        }
        else if (($request->get('StartTime')=='3:00pm') && ( $request->get('EndTime')=='5:00pm')) {
            $book->PeriodID='5'; 
        }
        else if (($request->get('StartTime')=='5:00pm') && ($request->get('EndTime')=='7:00pm')) {
        $book->PeriodID='6';
        }
            else if (($request->get('StartTime')=='7:00am') && ($request->get('EndTime')=='11:00am')) {
            $book->PeriodID='7';
        }
        else if (($request->get('StartTime')=='9:00am') && ($request->get('EndTime')=='1:00pm')) {
            $book->PeriodID='8';
        }
        else if (($request->get('StartTime')=='11:00am') && ($request->get('EndTime')=='3:00pm')) {
            $book->PeriodID='9';
                        }
        else if (($request->get('StartTime')=='1:00pm') && ($request->get('EndTime')=='5:00pm')) {
            $book->PeriodID='10'; } 
        else if (($request->get('StartTime')=='3:00pm') && ($request->get('EndTime')=='7:00pm')) {
            $book->PeriodID='11';} 
            else {
            $book->PeriodID='Non Available';
            }    
                       
        $book->save();
         return redirect()->back()->with('success','Course Has Been freed Until '. $due);
        

    }

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
