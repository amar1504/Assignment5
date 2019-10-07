<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Subjectcontroller extends Controller
{
    public function index(){
        $label="Your Subjects and marks are:<br/>";
        $subjects=['Maths','Physics','Chemistry'];
        $marks=[20,30,40];
       // return view('subject')->with(['label'=>$label,'subjects'=>$subjects, 'marks'=>$marks]);
       // OR
       return view('subject')->withlabel($label)->withsubjects($subjects)->withmarks($marks);
    }
}
