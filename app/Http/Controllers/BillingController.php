<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BillingController extends Controller
{
    public function index()
   	{
   		$reports = DB::table('reports')
   		->where('rpt_status','BILLING')
            ->join('patients', 'patients.pnt_aid', '=', 'reports.rpt_pnt_id')
            ->get();

        return view('billing.index',compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
   	}
   	public function show($id)
	{
    
	    $reports = DB::table('reports')
	                ->where('rpt_id',$id)
	                ->join('patients','patients.pnt_uhid','=','reports.rpt_pnt_uhid')
	                ->get();
	    $record_test = DB::table('reports_test')
	                    ->where('rpt_id',$id)
	                    ->join('tests','tests.test_aid','=','reports_test.r_test_id')
	                    ->get();
	                    
	    return view('billing.show',compact('reports','record_test'));   
	}
}
