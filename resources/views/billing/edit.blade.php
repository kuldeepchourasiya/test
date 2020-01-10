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

   {!! Form::model($report[0], ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['billing.update', $report[0]->rpt_id]]) !!}
    <div class="row">
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Report Payment</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                        <a class="btn close" href="{{ route('billing.index') }}"><span aria-hidden="true">×</span></a>
                      </div>
                    </div>
                </div>
                <div class="box-body">
                   <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Report ID:</strong>
                            RPT1{{$report[0]->rpt_id}}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Patient ID:</strong>
                            PNT1{{$report[0]->rpt_pnt_uhid}}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Patient Name:</strong>
                            {{$report[0]->pnt_name}}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Mobile No.:</strong>
                            {{$report[0]->pnt_mobile}}
                        </div>
                    </div>
                </div>
                
                <div class="row" >
                    <table class="table table-bordered"  >
                        <tbody>
                            <tr>
                               <td colspan="2">Sub Total</td>
                               <td colspan="2">₹{{$report[0]->rpt_amt}}</td>
                           </tr>
                           <tr>
                               <td colspan="2">Discount</td>
                               <td colspan="2">₹{{$report[0]->rpt_tot_dis}}</td>
                           </tr>
                           <tr>
                               <td colspan="2">Paid Amount</td>
                               <td colspan="2">₹{{$report[0]->rpt_amt_receive}}</td>
                           </tr>
                           <tr>
                               <td colspan="2">Remaining Amount</td>
                               <td colspan="2">₹{{$report[0]->rpt_amt_remain}}</td>
                           </tr> 
                           <tr>
                               <td colspan="2">Enter Pending Amount</td>
                               <td colspan="2">
                                <input type="hidden" name="rpt_amt_remain" value="{{$report[0]->rpt_amt_remain}}">
                                <input type="hidden" name="rpt_amt_receive" value="{{$report[0]->rpt_amt_receive}}">
                                <input type="number" min=0 name="payment"></td>
                           </tr> 
                        </tbody>
                    </table>
                </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Payment</button>
                  </div>
                </div>            
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection