<?php

namespace App\Http\Controllers;
use App\Models\Student_classe;
use App\Models\Record;
use App\Models\Year;
use App\Models\Student;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
  
    public function classData($classes,$session){
        $year= Year::get();
        $class = Student_classe::get();
        $tests = Record::where("session","=",$session)->where("class_name","=",$classes)->get();
        foreach($year as $y){
            if($y->status==1){
                $y_name=$y->years;
            }
        }
        $b=array();
      
        foreach($tests as $t){
           $a=$t->students_id;
          
           $students = Student::where("id","=", $a)->get();
           
           foreach($students as $s){
            array_push($b,$s);
           }
           }
        
       
        return view('admin.sidebar.session',compact("b","tests","class","year","y_name"));
       
    }

    public function sessionData($class,$year){
        $year= Year::get();
        $class = Student_classe::get();
        $tests =Record::where("session","=",$year)->where("class_name","=",$class)->get();
         foreach($year as $y){
            if($y->status==1){
                $y_name=$y->years;
            }
        }
        $b=array();
        foreach($tests as $t){
            $a=$t->students_id;
            $students = Student::where("id","=", $a)->get();
            foreach($students as $s){
                array_push($b,$s);
               }
        }

        return view('admin.sidebar.views',compact("b","tests","class","year","y_name"));
    }
    public function YearData(Request $request,$id){
        $year= Year::get();
        $class = Student_classe::get();
        $tests =Record::where("session","=",$id)->get();
         foreach($year as $y){
            if($y->status==1){
                $y_name=$y->years;
            }
        }
        $b=array();
        foreach($tests as $t){
            $a=$t->students_id;
            $students = Student::where("id","=", $a)->get();
            foreach($students as $s){
                array_push($b,$s);
               }
        }

        return view('admin.sidebar.years',compact("b","tests","class","year","y_name"));
    }
}
