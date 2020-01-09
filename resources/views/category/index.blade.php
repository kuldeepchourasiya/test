
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
                    <h3 class="box-title">Test Category</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                       
                        <a class="btn btn-success" href="{{route ('test_category.create')}}">+</a>
                        
                      </div>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Category_Name</th>
                             <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($categorys as $category)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $category->cat_name }}</td>
                            <td>{{ $category->cat_status }}</td>
                            <td>
                                {!! Form::open(['route' => ['test_category.destroy', $category->cat_aid], 'method' => 'delete']) !!}
                                
                                <a href="{!! route('test_category.edit', [$category->cat_aid]) !!}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                
                                {!! Form::close() !!}
                            </td>
                            
                        </tr>
                        @endforeach
                    </table>
                    {{ $categorys->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection