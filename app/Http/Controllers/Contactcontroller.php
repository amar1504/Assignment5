<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Contact;

class Contactcontroller extends Controller
{
    public function index(){

        return view('contact');

    }

    public function store(Request $request){
        //dd($request->all());
        $this->validate($request,['name'=>'required|max:7'],
        [
            'name.required'=>'Please Enter Name ',
            'max'=>'enter valid length' 
        ]);
        $contact= new Contact();
        $contact->name=$request->name;
        $contact->save();
        return view ('add_category');
    }
}
