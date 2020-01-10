@extends('layouts/admin_template')

@section('content')
    <div class="row" id="myDiv" >
        <div class='col-md-12' >
            <!-- Box -->
            <div class="box box-primary" >
                <div class="box-header with-border text-center">
                    <h1 class="box-title" style="font-size:25px;">Receipt</h1>
                    <a href="{{route('billing.index')}}" class="btn close"><span aria-hidden="true">&times;</span></a>
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
                                {{$reports[0]->pnt_address}}
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="box-body" >
                            <table class="table table-bordered"  >
                                <tr>
                                    <th>Test Name</th>
                                    <th>Test Value</th>
                                    <th>Test Unit</th>
                                    <!-- <th>Test Charge</th> -->
                                </tr>
                                <tbody>
                                    @foreach($record_test as $test)
                                    <tr>
                                        <td>{{$test->test_name}}</td>
                                        <td>{{$test->r_test_val}}</td>
                                        <td>{{$test->test_unit}}</td>
                                        <!-- <td>{{$test->test_charge}}</td> -->
                                    </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                            
                        </div>
                    </div>
                    <div class="row" >
                        <div class="box-body" >
                            <table class="table table-bordered"  >
                                <tr>
                                    <td><div class="form-group">
                                        <strong>Remark:</strong>
                                        {{$reports[0]->rpt_remark}}
                                    </div></td>
                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box-body" >
                            <div class="box-footer with-border text-center">
                            <h5 class="col-xs-3 col-sm-3 col-md-3 pull-right">Signature</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer with-border">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                       <button type="button" class="btn btn-primary" onclick="PrintDiv('myDiv')">Print</button>
                    </div>
                </div>           
            </div>
        </div>
    </div>
@endsection