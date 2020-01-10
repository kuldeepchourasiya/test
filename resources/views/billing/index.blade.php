
@extends('layouts/admin_template')

@section('content')
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('danger'))
    <div class="alert alert-danger">
      <p>{{ $message }}</p>
    </div>
    @endif
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Billing & Printing</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>S.No</th>
                            <th>Date</th>
                            <th>Report ID</th>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Last Update</th>
                            <th width="340px">Action</th>
                        </tr>
                       @foreach ($reports as $report)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$report->rpt_date}}</td>
                            <td>RPT{{$report->rpt_id}}</td>
                            <td>PNT{{$report->rpt_pnt_id}}</td>
                            <td>{{$report->pnt_name}}</td>
                            <td>{{$report->pnt_mobile}}</td>
                            <td>{{$report->rpt_amt}}</td>
                            <td>{{$report->rpt_status}}</td>
                            <td>{{date('d-m-Y', strtotime($report->rpt_up_date))}}</td>
                            <td>
                                <a href="{{route('billing.edit',$report->rpt_id)}}" class="btn btn-info" >Accept Payment</a>
                               <a href="{{route('billing.show',$report->rpt_id)}}" class="btn btn-success">Invoice</a>
                               <a href="{{url('/pdf/'.$report->rpt_id)}}" class="btn btn-primary"><i class="fa fa-download"></i>PDF</a>  
                            </td>
                            
                        </tr>
                       @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection