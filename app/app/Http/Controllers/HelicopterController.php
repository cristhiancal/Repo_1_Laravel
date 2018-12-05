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
        return view('helicopters.edit',compact('helicopter'));

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
        $request->validate([
            'name' => 'required',
            'speed' => 'required',
            'color' => 'required',
            'detail' => 'required'

        ]);
  
        $helicopter->update($request->all());
  
        return redirect()->route('helicopters.index')
                        ->with('success','helicopter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helicopter $helicopter)
    {
        $helicopter->delete();

        return redirect()->route('helicopters.index')
                        ->with('success','helicopter deleted successfully');
    }

    public function getHelicopterApi()
   {
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:8000/api/helicopters";
        $res = $client->request('GET',$url,
        ['headers' => [
        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjdlYTkxYWMwMTc0MjNjNjYxY2FlODFmYTdiMjgzZGJlYTJlZjQyMTYzMDUwNjFiMzEwYTBkNzFlMjQ3YTgwMWE4YmJiZDFmZGQ1MjJiZDUwIn0.eyJhdWQiOiIyIiwianRpIjoiN2VhOTFhYzAxNzQyM2M2NjFjYWU4MWZhN2IyODNkYmVhMmVmNDIxNjMwNTA2MWIzMTBhMGQ3MWUyNDdhODAxYThiYmJkMWZkZDUyMmJkNTAiLCJpYXQiOjE1NDM2ODA1NjIsIm5iZiI6MTU0MzY4MDU2MiwiZXhwIjoxNTc1MjE2NTYyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Rz_9WDHGNiJ8aj63tb82MKlJxBURodEL510h_a0JF7k1r6YnVpDUcpcN3GhHIcBVRDRV1Gp8g0k63VdYh3Is64T3yOQE1f_0PJD6D_gdZrIEiRJKvnZoH4lrLA3z-y2yBEHna8nyC8wJrOh9ZgY-G48cDtX5vyvjL6NbTE6hoCzWGWdjr6sDt_PCqbSzTVkoMrg8efxVE1H12MeLpzBcUgnRMIdnCKxyYrvqERX_NC4dPTemWYS0K5VNISX708ysd0eXVz9SyoI7Aizb4fIqVQ_7oW7iBH3NjgUB_KXmBVjHK0EwvcbTk6bfcOerPoxJlJqFcVoIxdjMsQIWyxnx5QH6_XaRAs8BZyN44JKAfD907LvhmG1YNrzlkLzDqMjdXfYRBw6kYpmXLeWoeGUKpzCRfbLELFF3ZcuuGCtG7Tdhlx01K0HGTu0dmSsOBQFR3rQAa6bPbV5qQgI1LOamfvbwKz8sZuUY7hMghFF2mXzD_d_TWTFEi82ye1fV02gpxTmEdOkZ9nVbqe032JavIehdOk3DEmnJebhwwnpeH2rNmuYhSu4EhzeM_D97Ja-Xc9uTsN1tKT3w47-NYxEISv-hJcfkI6cypWg7mu067pctMfI7uHwe8XgqdAsvkqhRY0XG6aqLd6euvrNPI7lIFBJKHEfnIDwm5gzLV6ux6W0',
        'Accept'  => 'application/json']]);

       $conten =$res->getBody();
       $contents = $conten->getContents();
       $arrayData=(json_decode($contents , true));
       $helicopters = $arrayData['data'];

       return $helicopters;
   }
}
