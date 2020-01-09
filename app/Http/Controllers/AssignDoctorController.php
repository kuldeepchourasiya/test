<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AssignDoctorController extends Controller
{
    public function index()
   {
   		$reports = DB::table('reports')
   			->where('rpt_status','ASSINING DOCTOR')
            ->join('patients', 'patients.pnt_aid', '=', 'reports.rpt_pnt_id')
            ->get();

        return view('assigndoctor.index',compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
   }

   public function edit($id)
   {
      $reports = DB::table('reports')
                 ->where('rpt_id',$id)
                 ->join('patients','patients.pnt_uhid','=','reports.rpt_pnt_uhid')
                 ->get();
     $record_test = DB::table('reports_test')
                     ->where('rpt_id',$id)
                     ->join('tests','tests.test_aid','=','reports_test.r_test_id')
                     ->get();
                     
     return view('assigndoctor.edit',compact('reports','record_test')); 
   }

   public function update(request $request, $id)
   {
      DB::table('reports')
            ->where('rpt_id',$id)
            ->update(['rpt_remark' =>$request->rpt_remark]);
      
      return redirect()->route('assign_doctor.index')
           ->with('success','Test value added successfully');
   }

   public function proceed_doctor($id)
   {
		$rpt_status = "APPROVAL STAGE";
		DB::table('reports')
	    	->where('rpt_id',$id)
	    	->update(['rpt_status'=>$rpt_status]);

		return redirect()->route('assign_doctor.index')
	           ->with('success','Reports Proceed for completed successfully');
   }
}
