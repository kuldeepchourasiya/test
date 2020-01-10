<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .row_border
        {
            border: 1px solid silver;
        }
        .row_border_left
        {
            border-left: 1px solid silver;
        }
        .row_border_right
        {
            border-right: 1px solid silver;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class='col-md-12' >
            <!-- Box -->
            <div class="box box-primary" >
                <div class="box-header with-border text-center">
                    <h1 class="box-title">Report</h1>
                </div>
                <div class="box-body" >
                    <div class="row row_border">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Report ID:</strong>
                                RPT1{{$reports[0]->rpt_id}}
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <strong>Date:</strong>
                                {{$reports[0]->rpt_date}}
                            </div>
                        </div>
                    </div>
                     <div class="row row_border_left row_border_right">
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
                                <strong>Gender:</strong>
                                {{$reports[0]->pnt_gender}}
                            </div>
                        </div>
                    </div>
                    <div class="row row_border_left row_border_right">
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
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 row_border_left row_border_right">
                            <div class="form-group">
                                <strong>Sample collection At:</strong>
                                {{$reports[0]->pnt_address}}
                            </div>
                        </div>
                    </div>
                    <div class="row " >
                        <div class="box-body row_border_left row_border_right" >
                            <table class="table table-bordered"  >
                                <tr>
                                    <th>Test Name</th>
                                    <th>Test Value</th>
                                    <th>Test Unit</th>
                                </tr>
                                <tbody>
                                    @foreach($record_test as $test)
                                    <tr>
                                        <td>{{$test->test_name}}</td>
                                        <td>{{$test->r_test_val}}</td>
                                        <td>{{$test->test_unit}}</td>
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
                </div>
                <div class="box-footer with-border text-center" style="margin-top:100px;">
                    <h5 class="col-xs-3 col-sm-3 col-md-3 pull-right" ">Signature</h5>
                </div>          
            </div>
        </div>
    </div>
</body>
</html>