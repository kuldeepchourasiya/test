<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReportCompleteController extends Controller
{
   public function index()
   {
   		$reports = DB::table('reports')
		   			->where('rpt_status','APPROVAL STAGE')
		            ->join('patients', 'patients.pnt_aid', '=', 'reports.rpt_pnt_id')
		            ->get();
		return view('reportcompleted.index',compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
   }

   public function proceed_billing($id)
   {
		$rpt_status = "BILLING";
		DB::table('reports')
	    	->where('rpt_id',$id)
	    	->update(['rpt_status'=>$rpt_status]);

		return redirect()->route('report_complete.index')
	           ->with('success','Reports Proceed for Billing successfully');
   }
}
