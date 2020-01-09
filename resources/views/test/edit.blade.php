@extends('layouts/admin_template')

@section('content')

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
           @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
        </ul>
      </div>
    @endif
    {!! Form::model($test, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['test.update', $test->test_aid]]) !!}
    
    <div class="row">
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Test</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('test.index') }}"><i class="fa fa-reply"></i></a>
                      </div>
                    </div>
                </div>
                <div class="box-body">
                <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                   {!! Form::text('test_name', null, array('placeholder' => 'Test Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Select Category:</strong>
                                    <select name="test_under" class="form-control">
                                        <option value="">Select</option>
                                            @foreach($testcats as $testcat)
                                                <option value="{{ $testcat->cat_aid }}"@if($testcat->cat_aid== $test->cat_aid) selected='selected' @endif>{{ $testcat->cat_name }}</option>
                                            @endforeach
                                    </select>
                                </div>  
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Unit:</strong>
                                   <select name="test_unit" class="form-control">
                                        <option value="ng/ml"@if($test->test_unit=='ng/ml') selected='selected' @endif>ng/ml</option>
                                        <option value="pg/ml"@if($test->test_unit=='pg/ml') selected='selected' @endif>pg/ml</option>
                                        <option value="uU/ml"@if($test->test_unit=='uU/ml') selected='selected' @endif>uU/ml</option>
                                        <option value="ng/ml"@if($test->test_unit=='ng/ml') selected='selected' @endif>ng/ml</option>
                                        <option value="mg/dl"@if($test->test_unit=='mg/dl') selected='selected' @endif>mg/dl</option>
                                        <option value="U/L"@if($test->test_unit=='U/L') selected='selected' @endif>U/L</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Test Amount:</strong>
                                   {!! Form::text('test_charge', null, array('placeholder' => 'Test Amount','class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                   {!! Form::text('test_description', null, array('placeholder' => 'Test Description','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Status:</strong>
                                   <select name="test_status" class="form-control">
                                        <option value="ACTIVE"@if($test->test_status == 'ACTIVE') selected='selected'@endif>ACTIVE</option>
                                        <option value="INACTIVE"@if($test->test_status == 'INACTIVE') selected='selected'@endif>INACTIVE</option>
                                    </select>
                                </div>
                            </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection