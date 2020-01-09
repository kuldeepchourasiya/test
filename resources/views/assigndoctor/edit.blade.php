@extends('layouts/admin_template')

@section('content')
    <div class="row" id="myDiv" >
        <div class='col-md-12' >
            <!-- Box -->
            <div class="box box-primary" >
                <div class="box-header with-border text-center">
                    <h1 class="box-title">Report Detail</h1>
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
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Sample collection At:</strong>
                                {{$reports[0]->rpt_smpl_collect_at}}
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                      <div class="box-header with-border">
                            <h1 class="box-title">Review:</h1>
                          </div>
                        {!! Form::model($reports, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['assign_doctor.update', $reports[0]->rpt_id]]) !!}
                          <div class="box-body">
                             
                            <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
                                <div class="form-group">
                                    <strong>Remark About Report:</strong><br>
                                    <textarea type="text" class="form-control" name="rpt_remark" placeholder="we have assign report please check and proceed to complete"></textarea> 
                                </div>
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