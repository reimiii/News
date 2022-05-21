<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('admin_home') }}">Admin Panel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('admin_home') }}"></a>
    </div>

    <ul class="sidebar-menu">

      <li class="{{ request()->is('admin') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i
            class="fas fa-hand-point-right"></i>
          <span>Dashboard</span></a></li>

      <li class="nav-item dropdown {{ (request()->is('admin/*')) ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-recycle"></i><span>Ads</span></a>
        <ul class="dropdown-menu">
          <li class="{{ (request()->is('admin/ads/top-ads*')) ? 'active' : '' }}"><a class="nav-link"
              href="{{ route('admin_ads_top') }}">
              <i class="fas fa-angle-right"></i> Top Ads</a></li>
          <li class="{{ (request()->is('admin/ads/center-ads*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_ads_home') }}">
              <i class="fas fa-angle-right"></i> Center Ads</a>
          </li>
          <li class="{{ (request()->is('admin/ads/side-ads*')) ? 'active' : '' }}"><a class="nav-link"
              href="{{ route('admin_ads_side') }}"><i class="fas fa-angle-right"></i>
              Sidebar Ads</a></li>
        </ul>
      </li>


      {{-- <li class="nav-item dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
        <ul class="dropdown-menu">
          <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
          <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
        </ul>
      </li>
      <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i>
          <span>Setting</span></a></li> --}}

      {{-- <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i>
          <span>Setting</span></a></li>

      <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i> <span>Form</span></a>
      </li>

      <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a>
      </li>

      <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right">
          </i>
          <span>Invoice</span></a>
      </li> --}}

    </ul>
  </aside>
</div>
