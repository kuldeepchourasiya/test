@extends('layouts/admin_template')

@section('content')
    <div class="row" id="myDiv" >
        <div class='col-md-12' >
            <!-- Box -->
            <div class="box box-primary" >
                <div class="box-header with-border text-center">
                    <h1 class="box-title">Enter Test Value Data</h1>
                    <a class="btn close" href="{{ route('sample_testing.index') }}"><span aria-hidden="true">×</span></a>
                </div>
                <div class="box-body" >
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 pull-left">
                            <div class="form-group">
                                <strong>Report ID:</strong>
                                RPT1{{$reports[0]->rpt_id}}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 pull-right">
                            <div class="form-group">
                                <strong>Date:</strong>
                                {{$reports[0]->rpt_date}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Patient ID:</strong>
                                PNT1{{$reports[0]->rpt_pnt_uhid}}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Patient Name:</strong>
                                {{$reports[0]->pnt_name}}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Mobile No.:</strong>
                                {{$reports[0]->pnt_mobile}}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Gender:</strong>
                                {{$reports[0]->pnt_gender}}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Age:</strong>
                                {{$reports[0]->pnt_age}}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{$reports[0]->pnt_email}}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Sample collection At:</strong>
                                {{$reports[0]->rpt_smpl_collect_at}}
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                      <div class="box-header with-border">
                            <h1 class="box-title">Test Detail:</h1>
                          </div>
                        {!! Form::model($reports, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['sample_testing.update', $reports[0]->rpt_id]]) !!}
                          <div class="box-body">
                             <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
                                <table class="table table-bordered"  >
                                    <tr>
                                        <th>Test Name</th>
                                        <th>Test Value</th>
                                        <th>Test unit</th>
                                    </tr>
                                    <tbody >
                                      @foreach($record_test as $rec_test)
                                       <tr >
                                           <td>{{$rec_test->test_name}}</td>
                                           <input type="hidden" name="r_test_aid[]" value="{{$rec_test->r_test_aid}}"></td>
                                           <td ><input type="text" name="r_test_val[]" value="{{$rec_test->r_test_val}}"></td>
                                           <td>{{$rec_test->test_unit}}</td>
                                        </tr>
                                       @endforeach  
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="box-footer with-border">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                       
                    </div>
                </div>           
            </div>
        </div>

    </div>
@endsection