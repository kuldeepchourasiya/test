@extends('layouts/admin_template')

@section('content')

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </ul>
      </div>
    @endif
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Category</h3>
                    <div class="pull-right">
                      <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('test_category.index') }}"> <i class="fa fa-undo"></i></a>
                      </div>
                    </div>
                </div>
                <div class="box-body">
                   {!! Form::open(array('route' => 'test_category.store','method'=>'POST')) !!}
                       
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                   {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection