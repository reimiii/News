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

      {{-- Ads --}}
      <li class="nav-item dropdown {{ (request()->is('admin/ads/*')) ? 'active' : '' }}">
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

      {{-- News --}}
      <li class="nav-item dropdown {{ (request()->is('admin/category*', '')) ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-recycle"></i><span>News</span></a>
        <ul class="dropdown-menu">
          <li class="{{ (request()->is('admin/category*')) ? 'active' : '' }}"><a class="nav-link"
              href="{{ route('admin_category_show') }}">
              <i class="fas fa-angle-right"></i> Category</a></li>
          <li class="{{ (request()->is('admin/subcategory')) ? 'active' : '' }}">
            <a class="nav-link" href="">
              <i class="fas fa-angle-right"></i> SubCategory</a>
          </li>
          <li class="{{ (request()->is('admin/subcategory')) ? 'active' : '' }}">
            <a class="nav-link" href="">
              <i class="fas fa-angle-right"></i> Post</a>
          </li>
        </ul>
      </li>




    </ul>
  </aside>
</div>
