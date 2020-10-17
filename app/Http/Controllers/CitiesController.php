<?php

namespace App\Http\Controllers;
use App\Cities;
use App\User;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Cities::all();
        $users = User::all();
      // $users = $users->take(5);

       /* dd($users->contains('name','Mr. Milford Casper Sr.'));*/

      // return $users->sortByDesc('name')->values();

    /*  
        foreach ($users as $user) {
            $user['abc'] = 'xyz';
        }
    

        return $users->each(function($user) {
            $user['nn'] = 'nn';
        });

        return $users->map(function($user) {
            return $user->name;
        });*/

            $collection = collect([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
            ]);

            return $collection->all();

            $plucked = $collection->pluck('name');

            return $plucked->all();
 
        
        return $users->groupBy('is_admin');

        return view('city.view',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new Cities;
        $city->name = $request->name;
        $city->save();
        return redirect('city');
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
    public function edit($id)
    {
        $city = Cities::find($id);
        return view('city.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = Cities::find($id);
        $city->name = $request->name;
        $city->save();
        return redirect('city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Cities::find($id);
        $city->delete();
        return redirect('city');
    }
}
