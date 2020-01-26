<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\LessonFilters;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(LessonFilters $filters)
    {
        // This code is for small application
//        $lesson = (new Lesson)->newQuery();
//        //$lesson = Lesson::Query();
//        if($request->exists('popular')){
//            $lesson->orderBy('view', 'desc');
//        }
//
//        if($request->has('difficulty')){
//            $lesson->where('difficulty', $request->difficulty);
//        }
//        return $lesson->get();

        // This code is for large application
        return Lesson::filter($filters)->get();
    }
}
