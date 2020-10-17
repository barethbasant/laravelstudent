<?php

namespace App\Http\Controllers;
use DB;
use App\branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $branches =branch::all();
        //return $branches;
        return view('branch.view',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required | unique:branches'
        ]);
        $newbranch = new branch;
        $newbranch->name = $request->name;
        $newbranch->save();

        return redirect('branch');
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
    public function edit(Branch $branch)
    {
       // $branch = branch::find($id);
       return view('branch.edit',compact('branch'));
        
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
        //
        $newbranch = branch::find($id);
        $request->validate([
            'name' =>'required | unique:branches,name,'.$id,
        ]);
        $newbranch->name = $request->name;
        $newbranch->save();
        return redirect('branch');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newbranch = branch::find($id);
        $newbranch->delete();
        return redirect('branch');
    }
}
