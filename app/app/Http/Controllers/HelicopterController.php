<?php

namespace App\Http\Controllers;

use App\Helicopter;
use Illuminate\Http\Request;

class HelicopterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helicopters = Helicopter::latest()->paginate(5);
  
        return view('helicopters.index',compact('helicopters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('helicopters.create');

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
            'name' => 'required',
        ]);
  
        Helicopter::create($request->all());
   
        return redirect()->route('helicopters.index')
                        ->with('success','Helicopter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function show(Helicopter $helicopter)
    {
        return view('helicopters.show',compact('helicopter'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function edit(Helicopter $helicopter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helicopter $helicopter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helicopter $helicopter)
    {
        //
    }
}
