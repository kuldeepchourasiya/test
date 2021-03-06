<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('images/sys.jpeg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>PATH-LAB</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active treeview" style="height: auto;">
          <a href="#">
            <i class="fa fa-home"></i> <span>LAB TEST</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route('report.index')}}"><i class="fa fa-circle-o"></i> NEW REPORT</a></li>
            <li><a href="{{route('sample_collection.index')}}"><i class="fa fa-circle-o"></i> Sample Collection</a></li>
            <li><a href="{{route('sample_testing.index')}}"><i class="fa fa-circle-o"></i>Sample Testing</a></li>
            <li><a href="{{route('assign_doctor.index')}}"><i class="fa fa-circle-o"></i>Assign Doctor</a></li>
            <li><a href="{{route('report_complete.index')}}"><i class="fa fa-circle-o"></i>Report completed</a></li>
            <li><a href="{{route('billing.index')}}"><i class="fa fa-circle-o"></i>Billing & Printing</a></li>
          </ul>
        </li>
        <li class="active treeview" style="height: auto;">
          <a href="#">
            <i class="fa fa-home"></i> <span>PATIENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route ('patient.index')}}"><i class="fa fa-circle-o"></i>Patient Info</a></li>
          </ul>        </li>
        <li class="active treeview" style="height: auto;">
          <a href="#">
            <i class="fa fa-home"></i> <span>TEST MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route ('test_category.index')}}"><i class="fa fa-circle-o"></i>Test Category </a></li>
            <li><a href="{{route ('test.index')}}"><i class="fa fa-circle-o"></i>Add Test</a></li>
          </ul>
        </li>
        <li class="active treeview" style="height: auto;">
          <a href="#">
            <i class="fa fa-home"></i> <span>REPORTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu" style="display: none;">
            <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>
        <li class="active treeview" style="height: auto;">
          <a href="#">
            <i class="fa fa-home"></i> <span>USER MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href=""><i class="fa fa-circle-o"></i> </a></li>
          </ul>
        </li>
       
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>