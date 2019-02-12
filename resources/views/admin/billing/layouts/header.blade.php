<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('billing/css/main.css') }}">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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