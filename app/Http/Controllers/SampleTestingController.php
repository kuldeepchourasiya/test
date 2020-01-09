<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SampleTestingController extends Controller
{
   public function index()
   {
   		$reports = DB::table('reports')
   			->where('rpt_status','SAMPLE TESTING')
            ->join('patients', 'patients.pnt_aid', '=', 'reports.rpt_pnt_id')
            ->get();

        return view('sampletesting.index',compact('reports'))
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
                     
     return view('sampletesting.edit',compact('reports','record_test')); 
   }

   public function update(request $request, $id)
   {
      $count=0;
      $id = count($request->r_test_aid);

      for($i=1;$i<=$id;$i++)
      {
         $r_test_aid = $request->r_test_aid[$count];
         $r_test_val = $request->r_test_val[$count];
         DB::table('reports_test')
            ->where('r_test_aid',$r_test_aid)
            ->update(['r_test_val' =>$r_test_val]);
      $count++;
      }
       
      return redirect()->route('sample_testing.index')
           ->with('success','Test value added successfully');
   }

   public function report_proceed($id)
   {
		$smp_check = DB::table('reports_test')->where('rpt_id',$id)->value('r_test_val');
      if($smp_check!="")
      {
         $rpt_status = "ASSINING DOCTOR";
         DB::table('reports')
            ->where('rpt_id',$id)
            ->update(['rpt_status'=>$rpt_status]);

         return redirect()->route('sample_testing.index')
                 ->with('success','Reports Proceed for Doctor successfully');
      }else
      {
         return redirect()->route('sample_testing.index')
              ->with('danger','Please enter Test value collection');
      }
   }
}
