<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\TestCategory;

class TestCategoryController extends Controller
{
    public function index()
    {
        $categorys = TestCategory::paginate(5);

        return view('category.index',compact('categorys'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request){
    	

       $this->validate($request, [
        'cat_name' => 'required',
      ]);
      

        $input = $request->all();
      	$categorys = TestCategory::create($input);
      	
        return redirect()->route('test_category.index')
                        ->with('success','category created successfully.');
    }


    public function edit($id)
    {
        $category = TestCategory::where('cat_aid',$id)->first();

    	return view('category.edit',compact('category'));
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
            'cat_name' => 'required',
            
        ]);
        
        $cat_name = $request->cat_name;
        
        $category  = TestCategory::where('cat_aid', $id)
        ->update(['cat_name' => $cat_name]);
      
        return redirect()->route('test_category.index')
                        ->with('success','category created successfully.');
    }

    public function destroy($id)
    {	
        TestCategory::where('cat_aid',$id)->delete();
        return redirect()->route('test_category.index')
                        ->with('success','category deleted successfully');
    }
}
