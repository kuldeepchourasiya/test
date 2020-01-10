<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset ("bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ("bower_components/font-awesome/css/font-awesome.min.css")}}">
  <!-- datatable -->
   <link href="{{ asset ("bower_components/admin-lte/dist/css/jquery.dataTables.min.css")}}" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset ("bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Header -->
    @include('layouts/header')

  <!-- Sidebar -->
    @include('layouts/sidebar')


  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        

        <!-- Main content -->
        <section class="content-header">
          <div class="content">
            <!-- Your Page Content Here -->
            @yield('content')
          </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

  <!-- Footer -->
    @include('layouts/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset ("bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset ("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
<!-- Datatable  -->
<script src="{{ asset ("bower_components/admin-lte/dist/js/jquery.dataTables.min.js") }}"></script>
<script>
  $('#test_report').change(function(){

  var id = $(this).val(); 
  $.ajax({
          url: '/get_by_category?id=' + $(this).val(), 
          data:{id:id},  
          success:function(data)
          {
            console.log(data,'data');
            var res='';
            $.each (data, function (key, value) {
            res +=
            '<tr>'+
                '<td>'+value.test_name+'</td>'+
                '<td>'+value.cat_name+'</td>'+
                '<td>'+value.test_charge+'</td>'+
                '<td>'+'<button class="btn btn-success" id='+ value.test_aid +' type="button" onclick=track('+ value.test_aid +','+ value.test_charge +','+ value.cat_aid +','+ value.test_aid +','+'"'+value.test_unit +'"'+') >+</button>'+'</td>'+
           '</tr>'

            });
            $('#city').html(res); 
          }  
      });  
  }); 
</script>
<script>
  function track(test_aid,test_charge,cat_aid,test_aid,test_unit) 
  {
    var real_id = $('#rpt_id').val();
    $.ajax({
        url: '/report_test?id=',
        data:{
          test_aid:test_aid,
          real_id:real_id,
          test_charge:test_charge,
          cat_aid:cat_aid,
          test_aid : test_aid,
          test_unit:test_unit
        }, 
        success:function(data)
        {
          console.log(data,'data');
          $("#records_test").load(location.href + " #records_test"); 
        }
    }); 
  }
</script>
<script>
  function reportremove(value)
  {
    var id = value.id;
    // alert(id);
    $.ajax({
        url: '/remove_report_test?id=', 
        data:{id:id},  
        success:function(data)
        {
          // console.log(data,'data');
          $("#records_test").load(location.href + " #records_test");
        }
    });

  }
</script>
<script>
  $(document).on("change keyup paste click pageload",  function() {
      var main      = $('#total_charge').val();
      var disc      = $('#discount').val();
      var paid_amt  = $('#paid_amt').val();
      var discont   = main - disc -paid_amt;
      $('#result').val(discont);
  });
</script>
<script>
  function PrintDiv(id) {
    var data=document.getElementById(id).innerHTML;
    var myWindow = window.open('', 'my div');
    myWindow.document.write('<link rel="stylesheet" href="{{ asset ("bower_components/bootstrap/dist/css/bootstrap.min.css")}}" type="text/css" />');
    var htmlToPrint = '' +
    '<style type="text/css">' +
    'body{' +
    'border:1px solid #000;' +
    'width:99%;' +
    '}' +
    '.row{'+
    'margin-left:-14px;'+
    '}'+
    '.btn{' +
    'display:none;' +
    '}'+
    '.box-footer{' +
    'margin-top:120px;'+
    '}'+
    '</style>';
    htmlToPrint += data;
    myWindow.document.write(htmlToPrint);
    myWindow.document.close();

    myWindow.onload=function(){ 

        myWindow.focus(); 
        myWindow.print();
        myWindow.close();
    };
  }
</script>
</body>
</html>
