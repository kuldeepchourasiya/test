
@extends('layouts/admin_template')

@section('content')
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Report Registration</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                       
                        <a class="btn btn-success" href="{{route('report.create')}}">+</a>
                        
                      </div>
                    </div>
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
                            <td>RPT1{{$report->rpt_id}}</td>
                            <td>PNT1{{$report->rpt_pnt_uhid}}</td>
                            <td>{{$report->pnt_name}}</td>
                            <td>{{$report->pnt_mobile}}</td>
                            <td>{{$report->rpt_amt}}</td>
                            <td>{{$report->rpt_status}}</td>
                            <td>{{date('d-m-Y', strtotime($report->rpt_up_date))}}</td>
                            <td>
                                {!! Form::open(['route' => ['report.destroy', $report->rpt_id], 'method' => 'delete']) !!}
                                
                                <a href="{{route('report.edit',$report->rpt_id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                
                                <a href="{{route('report.show',$report->rpt_id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                <!-- <a href="" class="btn btn-primary">Accept</a> -->
                                <a href="{{url('/report_proceed/'.$report->rpt_id)}}" class="btn btn-primary">sample collecting </a>
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                
                                {!! Form::close() !!}
                            </td>
                            
                        </tr>
                       @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

@endsection