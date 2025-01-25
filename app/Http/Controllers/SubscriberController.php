<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
      $data=  $request->validate([
            'email'=>'required|email|unique:subscribers,email'
        ]);
        Subscriber::create($data);
        return back()->with('status','The Sbscriber is Scsessfuly');
    }
    public function store2(Request $request){
        // dd($request->all());
      $data=  $request->validate([
            'email'=>'required|email|unique:subscribers,email'
        ]);
        Subscriber::create($data);
        return back()->with('status2','The Sbscriber is Scsessfuly in footer');
    }
}
