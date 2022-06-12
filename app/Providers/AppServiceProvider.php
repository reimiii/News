<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\TopAds;
use App\Models\SideAds;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      Paginator::useBootstrap();

      $top_ads_data = TopAds::where('id', 1)->first();
      $side_top_data = SideAds::where('side_ad_location', 'Top')->get();
      $side_bottom_data = SideAds::where('side_ad_location', 'Bottom')->get();

      View::share('global_top_ads', $top_ads_data);
      View::share('global_side_top_ads', $side_top_data);
      View::share('global_side_bottom_ads', $side_bottom_data);

    }
}
