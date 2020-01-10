<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
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

   	public function edit($id)
   	{
   		
   		$report = DB::table('reports')
   			->where('rpt_id',$id)
            ->join('patients', 'patients.pnt_aid', '=', 'reports.rpt_pnt_id')
            ->get();
        return view('billing.edit',compact('report'));
   	}

   	public function update(request $request , $id)
   	{
   		$paid = $request->rpt_amt_receive;
   		$remain = $request->rpt_amt_remain;
   		$payment = $request->payment;
   		$rpt_amt_remain = $remain - $payment;
   		$rpt_amt_receive = $paid + $payment;

   		if($payment <= $remain)
   		{
   			DB::table('reports')
   			->where('rpt_id',$id)
   			->update(['rpt_amt_receive' => $rpt_amt_receive,
   					  'rpt_amt_remain' => $rpt_amt_remain]);
   			return redirect()->route('billing.index')->with('success','Payment Add successfully');
   		}else
   		{
   			return redirect()->route('billing.index')->with('danger','Payment failed');
   		}
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
	public function PDF($id)
	{
		$reports = DB::table('reports')
	                ->where('rpt_id',$id)
	                ->join('patients','patients.pnt_uhid','=','reports.rpt_pnt_uhid')
	                ->get();
	    $record_test = DB::table('reports_test')
	                    ->where('rpt_id',$id)
	                    ->join('tests','tests.test_aid','=','reports_test.r_test_id')
	                    ->get();
	
		$pdf = PDF::loadView('billing.pdf',['reports' => $reports,'record_test' => $record_test]);
        return $pdf->stream('record.pdf');
    }
}
