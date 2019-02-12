<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">

  <ul class="app-menu">
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-exchange"></i><span class="app-menu__label">Transactions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ url('admin/add_deposit') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Deposit</a></li>
        <li><a class="treeview-item" href="{{ url('admin/view_deposit') }}"><i class="icon fa fa-chevron-circle-right"></i> View Deposit</a></li>
        <li><a class="treeview-item" href="{{ url('admin/add_expenses') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Expenses</a></li>
        <li><a class="treeview-item" href="{{ url('admin/view_expenses') }}"><i class="icon fa fa-chevron-circle-right"></i> View Expenses</a></li>
        <li><a class="treeview-item" href="{{ url('admin/ledger') }}"><i class="icon fa fa-chevron-circle-right"></i> Ledger</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-houzz"></i><span class="app-menu__label">Stock</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ url('admin/add_stock') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Stock</a></li>
        <li><a class="treeview-item" href="{{ url('admin/view_stock') }}"><i class="icon fa fa-chevron-circle-right"></i>View Stock</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-print"></i><span class="app-menu__label">Print</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ url('admin/add_print') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Print</a></li>
        <li><a class="treeview-item" href="{{ url('admin/view_stock') }}"><i class="icon fa fa-chevron-circle-right"></i>View Print</a></li>
      </ul>
    </li>
     <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Clients</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ url('admin/add_clients') }}"><i class="icon fa fa-chevron-circle-right"></i> Add Clients</a></li>
        <li><a class="treeview-item" href="{{ url('admin/view_clients') }}"><i class="icon fa fa-chevron-circle-right"></i>View Clients</a></li>
      </ul>
    </li>
  </ul>
</aside>
