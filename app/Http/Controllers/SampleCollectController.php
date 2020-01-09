<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SampleCollectController extends Controller
{
   	public function index()
   	{
   		$reports = DB::table('reports')
			->where('rpt_status','SAMPLE COLLECTING')
            ->join('patients', 'patients.pnt_aid', '=', 'reports.rpt_pnt_id')
            ->get();

        return view('samplecollection.index',compact('reports'))
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
                        
        return view('samplecollection.edit',compact('reports','record_test')); 
   	}

   	public function update(request $request, $id)
   	{
   		DB::table('reports')->where('rpt_id',$id)
   							->update(['rpt_smpl_collect_at'=> $request->rpt_smpl_collect_at]);
   		return redirect()->route('sample_collection.index')
	           ->with('success','Sample collect successfully');
   	}

   	public function report_proceed($id)
   	{
   		$smp_check = DB::table('reports')->where('rpt_id',$id)->count('rpt_smpl_collect_at');
   		
   		if($smp_check==1)
   		{
   			$rpt_status = "SAMPLE TESTING";
			DB::table('reports')
		    	->where('rpt_id',$id)
		    	->update(['rpt_status'=>$rpt_status]);
		    
			return redirect()->route('sample_collection.index')
		           ->with('success','Reports Proceed for Testing successfully');
   		}else
   		{
   			return redirect()->route('sample_collection.index')
		           ->with('danger','Please add sample collection');
   		}
	}
}
