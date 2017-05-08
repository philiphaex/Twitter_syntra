<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'message' => 'required|max:140',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $tweet = new Tweet;
        $tweet->message = $request->message;
        $tweet->user_id = $request->user()->id;
        $tweet->save();

        return redirect('profile/'.$request->user()->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Not used
    }

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
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $tweet =  Tweet::find($id);
        $tweet->message = $request->message;

        $tweet->save();

        $data= Tweet::orderby('created_at','dsc')->with('user')->get();

        return view('index',[
            'tweets' => $data,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tweet::findOrfail($id)->delete();

        $data= Tweet::orderby('created_at','dsc')->with('user')->get();

        return view('index',[
            'tweets' => $data,
        ]);
    }
}
