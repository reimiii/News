<div class="top">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <ul>
          <li class="today-text">Today: January 20, 2022</li>
          <li class="email-text">contact@arefindev.com</li>
        </ul>
      </div>
      <div class="col-md-6">
        <ul class="right">
          <li class="menu"><a href="faq.html">FAQ</a></li>
          <li class="menu"><a href="{{ route('about') }}">About</a></li>
          <li class="menu"><a href="contact.html">Contact</a></li>
          <li class="menu"><a href="login.html">Login</a></li>
          <li>
            <div class="language-switch">
              <select name="">
                <option value="">English</option>
                <option value="">Hindi</option>
                <option value="">Arabic</option>
              </select>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="heading-area">
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex align-items-center">
        <div class="logo">
          <a href="{{ route('home') }}">
            <img src="{{ asset('uploads/logo.png') }}" alt="">
          </a>
        </div>
      </div>

      @if ($global_top_ads->top_ad_status == 'Show')
      <div class="col-md-8">
        <div class="ad-section-1">
          @if ($global_top_ads->top_ad_url == '')
          <img src="{{ asset('uploads/'.$global_top_ads->top_ad) }}" alt=""></a>
          @else
          <a href="{{ $global_top_ads->top_ad_url }}">
            <img src="{{ asset('uploads/'.$global_top_ads->top_ad) }}" alt=""></a>
          @endif
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
