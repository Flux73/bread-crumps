<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\URL;

class ProcessController extends Controller
{
    public function getAllYears() 
    {
        Session::put('arr', [URL::current()]);
        return view('process.year');
    }

    public function getAllSemesters($year, Request $request) 
    {
        $arr = Session::get('arr', []);
        // dd($arr);
        Session::put('arr', [...$arr, URL::current()]);
        
        return view('process.semester', ['links' => $arr]);
    }

    public function getAllSubjects($year, $semester)
    {
        $arr = Session::get('arr', []);
        return view('process.subject', ['links' => $arr]);
    }

    public function getAllUnits($year, $semester, $subject)
    {
        return view('process.unit');
    }

    public function getAllLessons($year, $semester, $subject, $unit)
    {
        return view('process.lessons');
    }

    public function getLesson($year, $semester, $subject, $unit, $lesson)
    {
        return view('process.lesson', ['lesson' => $lesson]);
    }
}
