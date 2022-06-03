<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeAdvertisment;
// use App\Models\SideAds;
use App\Models\TopAds;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $home_advertisments = [
        [
          'above_search_ad' => 'above_search_ad.png',
          'above_search_ad_url' => '',
          'above_search_ad_status' => 'Show',
          'above_footer_ad' => 'above_footer_ad.png',
          'above_footer_ad_url' => '',
          'above_footer_ad_status' => 'Show',

          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]
      ];

      $top_ads = [
        [
          'top_ad' => 'top_ad.png',
          'top_ad_url' => '',
          'top_ad_status' => 'Show',

          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]
      ];

      HomeAdvertisment::insert($home_advertisments);
      TopAds::insert($top_ads);
    }
}
