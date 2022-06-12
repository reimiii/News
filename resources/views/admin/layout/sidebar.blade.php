<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('admin_home') }}">Admin Panel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('admin_home') }}"></a>
    </div>

    <ul class="sidebar-menu">

      <li class="{{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_home') }}">
          <i class="fas fa-hand-point-right"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="{{ Request::is('setting') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_setting') }}">
          <i class="fas fa-hand-point-right"></i>
          <span>Setting</span>
        </a>
      </li>

      {{-- Ads --}}
      <li class="nav-item dropdown
      {{
      Request::is('admin/ads/top-ads') ||
      Request::is('admin/ads/center-ads') ||
      Request::is('admin/ads/side-ads*') ? 'active' : ''
      }}
      ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-recycle"></i><span>Ads</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('admin/ads/top-ads') ? 'active' : '' }}"><a class="nav-link"
              href="{{ route('admin_ads_top') }}">
              <i class="fas fa-angle-right"></i> Top Ads</a></li>

          <li class="{{ Request::is('admin/ads/center-ads') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_ads_home') }}">
              <i class="fas fa-angle-right"></i> Center Ads</a>
          </li>
          <li class="{{ Request::is('admin/ads/side-ads*') ? 'active' : '' }}"><a class="nav-link"
              href="{{ route('admin_ads_side') }}"><i class="fas fa-angle-right"></i>
              Sidebar Ads</a></li>
        </ul>
      </li>

      {{-- News --}}
      <li class="nav-item dropdown {{
        Request::is('admin/category*') ||
        Request::is('admin/sub-category*') ||
        Request::is('admin/post*') ? 'active' : ''
        }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Post</span></a>
        <ul class="dropdown-menu">

          <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_category_show') }}">
              <i class="fas fa-angle-right"></i> Category</a>
          </li>

          <li class="{{ Request::is('admin/sub-category*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_sub_category_show') }}">
              <i class="fas fa-angle-right"></i> Sub-Category</a>
          </li>

          <li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_post_show') }}">
              <i class="fas fa-angle-right"></i> Post</a>
          </li>
        </ul>
      </li>

      <li class="{{ Request::is('admin/photo*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_photo_show') }}">
          <i class="fas fa-hand-point-right"></i>
          <span>Photo</span>
        </a>
      </li>




    </ul>
  </aside>
</div>
