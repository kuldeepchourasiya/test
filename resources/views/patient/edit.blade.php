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
    {!! Form::model($patient, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['patient.update', $patient->pnt_aid]]) !!}
    
    <div class="row">
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Patient</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                        <a class="btn close" href="{{ route('patient.index') }}"><span aria-hidden="true">×</span></a>
                      </div>
                    </div>
                </div>
                <div class="box-body">
                
                    <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                   {!! Form::text('pnt_name', null, array('placeholder' => 'PATIENT NAME','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Mobile:</strong>
                                   {!! Form::text('pnt_mobile', null, array('placeholder' => 'PATIENTMOBILE','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Gender:</strong>
                                    <select class="form-control" id="type" name="pnt_gender">
                                       <option value="MALE" @if($patient->pnt_gender=='male') selected='selected' @endif >MALE</option>
                                        <option value="FEMALE" @if($patient->pnt_gender=='FEMALE') selected='selected' @endif }}>FEMALE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                   {!! Form::text('pnt_address', null, array('placeholder' => 'ADDRESS','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                   {!! Form::text('pnt_email', null, array('placeholder' => 'EMAIL','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Age:</strong>
                                   {!! Form::text('pnt_age', null, array('placeholder' => 'AGE','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Status:</strong>
                                   <select name="pnt_status" class="form-control">
                                       <option value="ACTIVE" @if($patient->pnt_status=='ACTIVE') selected='selected' @endif >ACTIVE</option>
                                        <option value="INACTIVE" @if($patient->pnt_status=='INACTIVE') selected='selected' @endif }}>INACTIVE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection