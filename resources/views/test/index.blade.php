
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
                    <h3 class="box-title">Test List</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                       
                        <a class="btn btn-success" href="{{route('test.create')}}">+</a>
                        
                      </div>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Test Name</th>
                             <th>Category</th>
                             <th>Test Unit</th>
                             <th>Test Charge</th>
                             <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($tests as $test)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $test->test_name }}</td>
                            <td>{{ $test->cat_name }}</td>
                            <td>{{ $test->test_unit }}</td>
                            <td>{{ $test->test_charge }}</td>
                            <td>{{ $test->test_status }}</td>
                            <td>
                                {!! Form::open(['route' => ['test.destroy', $test->test_aid], 'method' => 'delete']) !!}
                                
                                <a href="{!! route('test.edit', [$test->test_aid]) !!}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                
                                {!! Form::close() !!}
                            </td>
                            
                        </tr>
                        @endforeach
                    </table>
                    {{ $tests->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection