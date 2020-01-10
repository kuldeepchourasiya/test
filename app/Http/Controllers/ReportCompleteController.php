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
                     
     return view('reportcompleted.edit',compact('reports','record_test')); 
   }

   public function update(request $request, $id)
   {
      $count=0;
      $id = count($request->r_test_aid);

      for($i=1;$i<=$id;$i++)
      {
         $r_test_aid = $request->r_test_aid[$count];
         $r_test_remark = $request->r_test_remark[$count];
         DB::table('reports_test')
            ->where('r_test_aid',$r_test_aid)
            ->update(['r_test_remark' =>$r_test_remark]);
      $count++;
      }
       
      return redirect()->route('report_complete.index')
           ->with('success','Remark added successfully');
   }

   public function proceed_billing($id)
   {
   		$smp_check = DB::table('reports_test')->where('rpt_id',$id)->whereNotNull('r_test_remark')->count();
      	if($smp_check > 0)
      	{
	        $rpt_status = "BILLING";
			DB::table('reports')
		    	->where('rpt_id',$id)
		    	->update(['rpt_status'=>$rpt_status]);

			return redirect()->route('report_complete.index')
		           ->with('success','Reports Proceed for Billing successfully');
	    }else
      	{
         return redirect()->route('report_complete.index')
              ->with('danger','Please Add Test Remark');
      	}
   	}
}
