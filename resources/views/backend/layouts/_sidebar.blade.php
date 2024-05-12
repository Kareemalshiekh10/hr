

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ url('https://cdn-icons-png.flaticon.com/512/6846/6846568.png')}}" alt="AdminLTELogo" height="100" width="100">
  </div>
   <!------------------------------------------------------------------------ side&nav bars starts------------------------------------------------------------------------ -->
   <nav class="navbar">
    <div class="navbar-left">

      <span class="navbar-brand">Employee Management System</span>
    </div>
    <div class="navbar-right">
      <a href="#"><i class="fas fa-bell"></i></a>
      <a href="{{ url('admin/my_account') }}"><i class="fas fa-user-cog @if (Request::segment(2) == 'my_account') active  @endif"></i> </a>
      <a href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
      <!-- <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a> -->
    </div>
  </nav>

  <div style="height: 100%" class="sidebar">
    <div class="user-profile">
      <div class="centered">
        @if (Auth::user()->profile_image)  
        <img src="{{ url('upload/'.Auth::user()->profile_image)}}" alt="User's Profile Picture" class="profile-picture">
        @endif
        <p class="user-name">{{ Auth::user()->name }}</p>
      </div>
    </div>
    <div class="menu-links">

      <a href="{{ url('admin/Dashboard') }}">Dashboard</a>

      <a href="#" class="dropdown-trigger">Employees</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/Employees') }}" @if (Request::segment(2) == 'employees') active @endif >View Employee</a>
        <a href="{{ url('admin/employees/add') }}">Add Employee</a>
        <!-- Add more dropdown links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Department</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/Departments') }}"  @if (Request::segment(2) == 'Departments') active @endif >View Department</a>
        <a href="{{ url('admin/Departments/add') }}">Add Department</a>
        <!-- Add more links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Loans</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/Loans') }}"  @if (Request::segment(2) == 'Loans') active @endif >View Loans</a>
        <a href="{{ url('admin/Loans/add') }}">Add Loans</a>
        <!-- Add more dropdown links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Incentives</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/Incentives') }}"  @if (Request::segment(2) == 'Incentives') active @endif >View Incentives</a>
        <a href="{{ url('admin/Incentives/add') }}">Add Incentives</a>
        <!-- Add more dropdown links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Deductions</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/Deductions') }}"  @if (Request::segment(2) == 'Deductions') active @endif >View Deductions</a>
        <a href="{{ url('admin/Deductions/add') }}">Add Deductions</a>
        <!-- Add more links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Annual Holidays</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/AnnualHolidays') }}"  @if (Request::segment(2) == 'AnnualHolidays') active @endif >View Annual Holidays</a>
        <a href="{{ url('admin/AnnualHolidays/add') }}">Add Annual Holidays</a>
        <!-- Add more dropdown links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Offical Holidays</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/OfficialHolidays') }}"  @if (Request::segment(2) == 'OfficialHolidays') active @endif >View Official Holidays</a>
        <a href="{{ url('admin/OfficialHolidays/add') }}">Add Offical Holidays</a>
        <!-- Add more links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Annual Increase</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/AnnualIncreases') }}"  @if (Request::segment(2) == 'AnnualIncreases') active @endif >View Annual Increase</a>
        <a href="{{ url('admin/AnnualIncreases/add') }}">Add Annual Increase</a>
        <!-- Add more links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Branches</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/Branches') }}"  @if (Request::segment(2) == 'Branches') active @endif >View Branches</a>
        <a href="{{ url('admin/Branches/add') }}">Add Branches</a>
        <!-- Add more links as needed -->
      </div>
      <a href="#" class="dropdown-trigger">Scores</a>
      <div class="dropdown-content">
        <a href="{{ url('admin/Scores') }}"  @if (Request::segment(2) == 'Scores') active @endif >View Scores</a>
        <a href="{{ url('admin/Scores/add') }}">Add Scores</a>
        <!-- Add more links as needed -->
      </div>
    </div>
  </div>
  <!------------------------------------------------------------------------ side&nav bars Ends------------------------------------------------------------------------ -->