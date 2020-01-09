<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::paginate(5);

        return view('patient.index',compact('patients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

	public function create()
    {
        return view('patient.create');
    }

    public function store(Request $request){
    	

       $this->validate($request, [
        'pnt_name' => 'required',
      ]);
      

        $input = $request->all();
      	Patient::create($input);
      	
        return redirect()->route('patient.index')
                        ->with('success','Patient Added successfully.');
    }


    public function edit($id)
    {
        $patient = Patient::where('pnt_aid',$id)->first();

    	return view('patient.edit',compact('patient'));
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
        $this->validate($request, [
            'pnt_name' => 'required',
            
        ]);
        $input = $request->only(['pnt_name','pnt_mobile','pnt_gender','pnt_address','pnt_email','pnt_age','pnt_status']);
        
        $category = Patient::where('pnt_aid', $id)
      	->update($input);
      
      
        return redirect()->route('patient.index')
                        ->with('success','Patient created successfully.');
    }

    public function destroy($id)
    {	
        Patient::where('pnt_aid',$id)->delete();
        return redirect()->route('patient.index')
                        ->with('success','patient deleted successfully');
    }
}
