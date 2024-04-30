<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $massages=Message::OrderBy('id','desc')->get();
        return view('admin.messages.index',[
            'massages'=>$massages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'title'=>'required',
            'message'=>'required',
        ]);
        $http = strpos($request->message, 'http');
        if ($http !== false) {
            return  redirect()->route('contact')->with('error', 'created');
        }
        $massage=[
            'name'=>htmlspecialchars($request->name),
            'email'=>htmlspecialchars($request->email),
            'title'=>htmlspecialchars($request->title),
            'message'=>htmlspecialchars($request->message),
        ];
        Message::create($massage);
        return  redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $massage
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $message->activity = false;
        $message->save();
        return view('admin.messages.show',[
            'massage'=>$message
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $massage
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $massage)
    {
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $massage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $massage)
    {
        abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $massage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $massage)
    {
        $massage->delete();
        return  redirect()->route('massage.index');
    }
}
