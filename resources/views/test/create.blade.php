@extends('layouts/admin_template')

@section('content')

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </ul>
      </div>
    @endif
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Test</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('test.index') }}"> <i class="fa fa-undo"></i></a>
                      </div>
                    </div>
                </div>
                <div class="box-body">
                   {!! Form::open(array('route' => 'test.store','method'=>'POST')) !!}
                       
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                   {!! Form::text('test_name', null, array('placeholder' => 'Test Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Select Category:</strong>
                                   <select  class="form-control" name="test_under">
                                        <option value="">Select</option>
                                        @foreach($testcats as $testcat)
                                            <option value="{{ $testcat->cat_aid }}">{{ $testcat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Unit:</strong>
                                   <select name="test_unit" class="form-control">
                                        <option value="ng/ml">ng/ml</option>
                                        <option value="pg/ml">pg/ml</option>
                                        <option value="uU/ml">uU/ml</option>
                                        <option value="ng/ml">ng/ml</option>
                                        <option value="mg/dl">mg/dl</option>
                                        <option value="U/L">U/L</option>
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
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="INACTIVE">INACTIVE</option>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection