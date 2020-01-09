<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\report;
use App\Test;
use App\TestCategory;
use DB;

class ReportController extends Controller
{
  	
	public function index()
    {
        
        $reports = DB::table('reports')
        	->where('rpt_status','REGISTERED')
            ->join('patients', 'patients.pnt_aid', '=', 'reports.rpt_pnt_id')
            ->get();

        return view('report.index',compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('report.index');
    }

    public function create()
    {
    	$testcats = TestCategory::all();
    	$rpt_id   = DB::table('id_number')
    					->where('type','rpt_id')
    					->value('real_id');
    	
    	$record_test = DB::table('reports_test')
    		->where('rpt_id',$rpt_id)
    		->join('tests', 'tests.test_aid', '=', 'reports_test.r_test_id')
			->select('reports_test.r_test_aid','tests.test_name','tests.test_unit','tests.test_charge')
            ->get();
        $total_cahrge = DB::table('reports_test')
        				->where('rpt_id',$rpt_id)
        				->get()
        				->sum('r_test_charge');
        return view('report.create',compact('testcats','record_test','rpt_id','total_cahrge'));
    }

    
    public function get_by_category(Request $request)
    {	
    	// $cities = TestCategory::where('cat_aid', $request->id)->get();
    	$tests = DB::table('tests')
    		->where('cat_aid', $request->id)
            ->join('test_categories', 'test_categories.cat_aid', '=', 'tests.test_under')
            ->get();
        
    return response()->json($tests);
    }

    public function report_test(Request $request)
    {	
    	$records_test_check = DB::table('reports_test')
        	->where('r_test_id',$request->test_aid)
        	->where('rpt_id',$request->real_id)
        	->count();
        if($records_test_check == 0)
        {
        	$inserts[] = [ 
			    		'r_test_id' 	=> $request->test_aid,
			    		'rpt_id' 		=> $request->real_id,
			           	'r_test_under' 	=> $request->cat_aid, 
			           	'r_test_charge' => $request->test_charge , 
			           	'r_test_value' 	=> $request->test_unit]; 
			$record_test = DB::table('reports_test')->insert($inserts);
 		}

 		return response()->json($record_test);
    }

    public function remove_report_test(Request $request)
    {
    	$record_test = DB::table('reports_test')
			->where('r_test_aid', $request->id)
			->delete();
        return response()->json($record_test);
    }
    public function store(Request $request)
    {	
    	$this->validate($request, [
            'pnt_mobile' => 'required|digits:10',
            
        ]);
    	$patient_uhid   = DB::table('id_number')
					->where('type','patient_uhid')
					->value('real_id');
    	$inserts[] =[
    		'pnt_name' 		=> $request->pnt_name,
    		'pnt_uhid' 		=> $patient_uhid,
    		'pnt_mobile' 	=> $request->pnt_mobile,
    		'pnt_gender' 	=> $request->pnt_gender,
    		'pnt_age' 		=> $request->pnt_age,
    		'pnt_email' 	=> $request->pnt_email,
    		'pnt_address' 	=> $request->pnt_address
    	];
    	$patient = DB::table('patients')->insert($inserts);
    	$real_id = $patient_uhid +1;
    	DB::table('id_number')
    		->where('type','patient_uhid')
    		->update(['real_id' => $real_id]);
    	
    	if(!empty($patient))
    	{	
    		$pnt_aid   = DB::table('patients')
						->get()->last()->pnt_aid;
			$rpt_status= "REGISTERED";
	    	$insert =[
	    		'rpt_id' 		=>	$request->rpt_id,
	    		'rpt_pnt_id' 	=>	$pnt_aid,
	    		'rpt_pnt_uhid' 	=>	$patient_uhid,
	    		'rpt_date' 		=>	$request->date_created,
	    		'rpt_amt_remain'=>	$request->Remaining_amt,
	    		'rpt_tot_dis' 	=>	$request->discount,
	    		'rpt_amt' 		=>	$request->total_charge,
	    		'rpt_amt_receive'=>	$request->paid_amt,
	    		'rpt_status'	 =>	$rpt_status
	    	];
	    	
	    	DB::table('reports')->insert($insert);
	    	$rpt_id = $request->rpt_id +1;
	    	DB::table('id_number')
	    		->where('type','rpt_id')
	    		->update(['real_id' => $rpt_id]);
	    }
      	return redirect()->route('report.index')
                         ->with('success','category created successfully.');
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
                        
        return view('report.show',compact('reports','record_test'));   
    }

    public function edit($id)
    {
     	$testcats = TestCategory::all();
    	// $rpt_id   = DB::table('id_number')
    	// 				->where('type','rpt_id')
    	// 				->value('real_id');
    	$rpt_id = $id;
    	$record_test = DB::table('reports_test')
				    		->where('rpt_id',$rpt_id)
				    		->join('tests', 'tests.test_aid', '=', 'reports_test.r_test_id')
							->select('reports_test.r_test_aid','tests.test_name','tests.test_unit','tests.test_charge')
				            ->get();
	    $patient_id   = DB::table('reports')
		        		   	->where('rpt_id',$rpt_id)
		        		   	->select('rpt_pnt_id','rpt_amt_receive','rpt_tot_dis','rpt_amt_remain')
		        		   	->get();
       	$patient_data = DB::table('patients')
		        		   	->where('pnt_aid',$patient_id[0]->rpt_pnt_id)
		        		   	->get();
        $total_cahrge = DB::table('reports_test')
	        				->where('rpt_id',$rpt_id)
	        				->get()
	        				->sum('r_test_charge');
        return view('report.edit',compact('testcats','record_test','rpt_id','total_cahrge','patient_data','patient_id'));
    	
    }
    
    // *
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
     
    public function update(Request $request, $id)
    {	
    	$input = $request->only([
       						'pnt_name',
       						'pnt_mobile',
       						'pnt_gender',
       						'pnt_age',
       						'pnt_email',
       						'pnt_address'
       					]);
    	$patient_id   = DB::table('reports')
		        		   	->where('rpt_id',$id)
		        		   	->value('rpt_pnt_uhid');
    	$patient = DB::table('patients')
	    			  ->where('pnt_uhid',$patient_id)
	    			  ->update($input);
		$updates = [
	    			'rpt_amt_remain'=>$request->Remaining_amt,
					'rpt_tot_dis'=>$request->discount,
					'rpt_amt'=>$request->total_charge,
					'rpt_amt_receive'=>$request->paid_amt
				];
		DB::table('reports')
		    	->where('rpt_id',$id)
		    	->update($updates);

        return redirect()->route('report.index')
                         ->with('success','Test Update successfully.');
    }

    public function destroy($id)
    {	
        DB::table('reports')
	        ->where('rpt_id',$id)
	        ->delete();
        DB::table('reports_test')
	        ->where('rpt_id',$id)
	        ->delete();

        return redirect()->route('report.index')
                        ->with('success','Reports deleted successfully');
    }

    public function report_proceed($id)
    {
    	$rpt_status = "SAMPLE COLLECTING";
    	DB::table('reports')
	    	->where('rpt_id',$id)
	    	->update(['rpt_status'=>$rpt_status]);

		return redirect()->route('report.index')
               ->with('success','Reports Proceed successfully');
    }
}