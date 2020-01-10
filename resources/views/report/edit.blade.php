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

   {!! Form::model($patient_data[0], ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['report.update', $rpt_id]]) !!}
    <div class="row">
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Report</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                        <a class="btn close" href="{{ route('report.index') }}"> <span aria-hidden="true">×</span></a>
                      </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 pull-left">
                            <div class="form-group">
                                <strong>Report ID:</strong>
                               <input type="text" class="form-control" name="rpt_id" id="rpt_id" value="{{$rpt_id}}" readonly>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 pull-right">
                            <div class="form-group">
                                <strong>Date:</strong>
                               {!! Form::text('date_created',        
                                old('date_created', 
                                    Carbon\Carbon::today()->format('Y-m-d')),
                                ['class'=>'form-control date-picker','readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Patient Name:</strong>
                                  {!! Form::text('pnt_name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Mobile No.:</strong>
                                   {!! Form::number('pnt_mobile', null, array('placeholder' => 'Patient Mobile ','class' => 'form-control', 'maxlength' => '1','step' => '1')) !!}
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Gender:</strong>
                                   <select class="form-control" name="pnt_gender" required>
                                    @foreach($patient_data as $patientdata)
                                     <option value="">Select Gender</option>
                                     <option value="Male" @if($patientdata->pnt_gender=="Male") selected="selected"@endif>Male</option>
                                     <option value="Female"@if($patientdata->pnt_gender=="Female") selected="selected"@endif>Female</option> 
                                     @endforeach 
                                   </select>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Age:</strong>
                                   {!! Form::text('pnt_age', null, array('placeholder' => 'Age','class' => 'form-control','required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                   {!! Form::text('pnt_email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <!-- <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                   {!! Form::text('pnt_address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="box-header with-border">
                                <h3 class="box-title">Select Test For Testing</h3>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 pull-left">
                                <div class="form-group">
                                    <strong>Select Category:</strong>
                                    <select  class="form-control " name="test_under" id="test_report" >
                                        <option value="">Select</option>
                                        @foreach($testcats as $testcat)
                                            <option value="{{ $testcat->cat_aid }}">{{ $testcat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" >
                            <div class="box-body">
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>Test Name</th>
                                        <th>Test Category</th>
                                        <th>Test Charge</th>
                                        <th >Add</th>
                                    </tr>
                                    <tbody id="city">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="box-body" id="records_test">
                                <table class="table table-bordered"  >
                                    <tr>
                                        <th>Test Name</th>
                                        <th>Test unit</th>
                                        <th>Test Charge</th>
                                        <th >Remove</th>
                                    </tr>
                                    <tbody >
                                      @foreach($record_test as $rec_test)
                                       <tr >
                                           <td>{{$rec_test->test_name}}</td>
                                           <td>{{$rec_test->test_unit}}</td>
                                           <td>{{$rec_test->test_charge}}</td>
                                           <td><button class="btn btn-danger" id="{{$rec_test->r_test_aid}}" type="button" onclick="reportremove(this)">X</button></td>
                                       </tr>
                                       @endforeach 
                                       <tr>
                                           <td colspan="2">Total Amount</td>
                                           <td colspan="2"><i class="fa fa-rupee"></i>&nbsp;<input type="hidden" id="total_charge" name="total_charge" value="{{$total_cahrge}}">{{$total_cahrge}}</td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">Discount</td>
                                           <td colspan="2"><i class="fa fa-rupee"></i>&nbsp;<input type="number" id="discount" name="discount" value="{{$patient_id[0]->rpt_tot_dis}}"></td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">Paid Amount</td>
                                           <td colspan="2"><i class="fa fa-rupee"></i>&nbsp;<input type="number" name="paid_amt" id="paid_amt" value="{{$patient_id[0]->rpt_amt_receive}}"></td>
                                       </tr>
                                       <tr>
                                           <td colspan="2">Remaining Amount</td>
                                           <td colspan="2"><i class="fa fa-rupee"></i>&nbsp;<input type="number" id="result" name="Remaining_amt" value="{{$patient_id[0]->rpt_amt_remain}}" readonly></td>
                                       </tr>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>            
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection