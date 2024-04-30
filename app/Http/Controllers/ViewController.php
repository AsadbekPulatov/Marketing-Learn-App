<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        $lessons = Lesson::orderby('created_at', 'DESC')->get();
        return view('front.index', compact('lessons'));
    }

    public function service(){
        $services = Service::orderby('created_at', 'DESC')->get();
        return view('front.services', compact('services'));
    }

    public function single($id){
        $service = Service::FindOrFail($id);
        return view('front.single', compact('service'));
    }

    public function contact(){
        return view('front.contact');
    }
}
