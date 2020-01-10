
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
                    <h3 class="box-title">Patient List</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                       <!--   <a class="btn btn-success" href="{{route ('patient.create')}}">+</a> -->
                        
                      </div>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($patients as $patient)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $patient->pnt_name }}</td>
                            <td>{{ $patient->pnt_mobile }}</td>
                            <td>{{ $patient->pnt_age }}</td>
                            <td>{{ $patient->pnt_gender }}</td>
                            <td>{{ $patient->pnt_address }}</td>
                            <td>{{ $patient->pnt_email }}</td>
                            <td>{{ $patient->pnt_status }}</td>
                            <td>
                                {!! Form::open(['route' => ['patient.destroy', $patient->pnt_aid], 'method' => 'delete']) !!}
                                
                                <a href="{!! route('patient.edit', [$patient->pnt_aid]) !!}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection