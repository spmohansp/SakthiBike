  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <ul class="app-menu">
      <li class="treeview">
        <a class="app-menu__item" href="{{ url('admin/home') }}" ><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
      </li>
       <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="fa fa-motorcycle"></i><span class="app-menu__label">Vehicle Type</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ action('BillingController\VehicleTypeController@create') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Vehicle</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Customer</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ url('admin/client/add') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Customer</a></li>
          <li><a class="treeview-item" href="{{ url('admin/clients') }}"><i class="icon fa fa-chevron-circle-right"></i>View Customer</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Employee</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ action('BillingController\EmployeeController@create') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Employee</a></li>
          <li><a class="treeview-item" href="{{ action('BillingController\EmployeeController@index') }}"><i class="icon fa fa-chevron-circle-right"></i>View Employee</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Shops</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ action('BillingController\ShopController@create') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Shops</a></li>
          <li><a class="treeview-item" href="{{ action('BillingController\ShopController@index') }}"><i class="icon fa fa-chevron-circle-right"></i>View Shops</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-houzz"></i><span class="app-menu__label">Products</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          {{-- <li><a class="treeview-item" href="{{ url('admin/product/add') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Product</a></li> --}}
          <li><a class="treeview-item" href="{{ url('admin/products') }}"><i class="icon fa fa-chevron-circle-right"></i>View Product</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-houzz"></i><span class="app-menu__label">Stock</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ url('admin/stock/add') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Stock</a></li>
          <li><a class="treeview-item" href="{{ url('admin/stock/view') }}"><i class="icon fa fa-chevron-circle-right"></i>View Stock</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-exchange"></i><span class="app-menu__label">Extra Works</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ action('BillingController\ExtraWorkController@create') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Extra Works</a></li>
          {{-- <li><a class="treeview-item" href="{{ action('BillingController\ExtraWorkController@index') }}"><i class="icon fa fa-chevron-circle-right"></i> View Extra Works</a></li> --}}
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-print"></i><span class="app-menu__label">Bill</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ url('admin/bill/add') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Bill</a></li>
          <li><a class="treeview-item" href="{{ url('admin/bills') }}"><i class="icon fa fa-chevron-circle-right"></i>View Bill</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-print"></i><span class="app-menu__label">Expense</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ action('BillingController\ExpenseCategoryController@create') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Expense Category</a></li>
          <li><a class="treeview-item" href="{{ url('admin/expense/add') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Expense</a></li>
          <li><a class="treeview-item" href="{{ url('admin/expenses') }}"><i class="icon fa fa-chevron-circle-right"></i>View Expense</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Extra Income</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ action('BillingController\ExtraIncomeController@create') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Income</a></li>
          <li><a class="treeview-item" href="{{ action('BillingController\ExtraIncomeController@index') }}"><i class="icon fa fa-chevron-circle-right"></i> View Income</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-print"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ action('BillingController\SalaryController@create') }}"><i class="icon fa fa-chevron-circle-right"></i>Add Salary</a></li>
          <li><a class="treeview-item" href="{{ action('BillingController\SalaryController@index') }}"><i class="icon fa fa-chevron-circle-right"></i>View Salary</a></li>
        </ul>
      </li>
    </ul>
  </aside>