<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Registration;
use App\branch;
use App\Cities;
use App\Course;
use Illuminate\Http\Request;
use App\Exports\RegistrationsExport;
use Maatwebsite\Excel\Facades\Excel;
use  PDF;
use DB;
class RegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::all();
        return view('registration.view',compact('registrations'));
    }

    public function pdf()
    {
             
        $registrations = Registration::all();
        $pdf = PDF::loadView('invoice', compact('registrations'));
        return $pdf->stream();
    }


    
    public function excel()
    {
         $registrations_array[] = array('fname','lname','dob','course','branch','city');      
       /* $registrations_data = DB::table('registrations')->get()->toArray();
      
        foreach($registrations_data as $registration) {
            $registrations_array[] = array(
                'fname' => $registration->fname,
                'lname'=>$registration->lname,
                'dob' => $registration->dob
        );
        }

      Excel::create('Customer Data', function($excel) use($registrations_array){
            $excel->setTitle('Customer Data');
            $excel->sheet('Customer Data', function($sheet) use ($registrations_array){
                $sheet->fromArray($registrations_array,null,'A1',false,false);
            });
        })->download('xlsx'); */

       // return Excel::download($registrations_data, 'invoices.xlsx');
 
       
        
       return Excel::download(new RegistrationsExport, 'registrations.xlsx');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $branches = branch::all();
        $cities = Cities::all();
        return view('registration.create',compact('courses','branches','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')) {
            //$request->photo->store('public');
            Storage::putFile('public',$request->file('photo'));
        }
        else
        {
            $photo = '';
        }
        
        $registration = new Registration;
        $registration->fname = $request->fname;
        $registration->lname = $request->lname;
        $registration->dob = date("Y-m-d", strtotime($request->dob));
        $registration->city_id = $request->city_id;
        $registration->course_id = $request->course_id;
        $registration->branch_id = $request->branch_id;
        $registration->save();

        return redirect('registration');
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
       
       // $registration =  Registration::find(1);
       // return $registration->courses->name;
        $courses = Course::all();
        $branches = branch::all();
        $cities = Cities::all();
        $registration = Registration::find($id);
        return view('registration.edit',compact('courses','branches','cities','registration'));
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
        $registration = Registration::find($id);
        $registration->fname = $request->fname;
        $registration->lname = $request->lname;
        $registration->dob = date("Y-m-d", strtotime($request->dob));
        $registration->city_id = $request->city_id;
        $registration->course_id = $request->course_id;
        $registration->branch_id = $request->branch_id;
        $registration->save();

        return redirect('registration');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registration = Registration::find($id);
        $registration->delete();
        return redirect('registration'); 
    }
}
