<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\TestCategory;
use DB;

class TestController extends Controller
{
    public function index()
    {
        
        $tests = DB::table('tests')
            ->join('test_categories', 'test_categories.cat_aid', '=', 'tests.test_under')
            ->select('tests.test_aid','tests.test_name', 'tests.test_unit', 'tests.test_charge', 'tests.test_status','test_categories.cat_name')
            ->paginate(5);
        return view('test.index',compact('tests'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
    	$testcats = TestCategory::all();
        return view('test.create',compact('testcats'));
    }

    public function store(Request $request)
    {

       $this->validate($request, [
        'test_name' => 'required',
      ]);
      

      $input = $request->only(['test_name','test_under','test_unit','test_description','test_charge','test_status']);
      Test::create($input);
      
      return redirect()->route('test.index')
                        ->with('success','category created successfully.');
    }


    public function edit($id)
    {
        $test = DB::table('tests')
        ->where('tests.test_aid',$id)
        ->join('test_categories', 'test_categories.cat_aid', '=', 'tests.test_under')
       	->first();
        $testcats = TestCategory::all();
        
    	return view('test.edit',compact('test','testcats'));
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
            'test_name' => 'required',
            
        ]);
        
        $input = $request->only(['test_name','test_under','test_unit','test_description','test_charge','test_status']);
      
      	$category  = Test::where('test_aid', $id)
        ->update($input);

        return redirect()->route('test.index')
                        ->with('success','Test Update successfully.');
    }

    public function destroy($id)
    {
        Test::where('test_aid',$id)->delete();

        return redirect()->route('test.index')
                        ->with('success','Test deleted successfully');
    }
}
