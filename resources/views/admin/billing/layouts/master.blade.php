@include('admin.billing.layouts.header')
 <title>logo</title>
</head>
<body class="app sidebar-mini rtl">
    <main class="app-content">
      <div class="app-title">
          <div>
            <h1><i class="fa fa-user" style="color:#663ab7"></i>  &nbsp @yield('Current-Page') </h1>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg" ></i> / @yield('Parent-Menu')</li>
            <li class="breadcrumb-item"><a href="#">@yield('Menu')</a></li>
          </ul>
      </div>
@include('admin.billing.layouts.sidemenu')
@include('admin.billing.layouts.menu')
@include('admin.billing.layouts.errors')	
@yield('content')
@include('admin.billing.layouts.script')
@include('admin.billing.layouts.footer')
