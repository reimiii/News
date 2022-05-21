<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisment;
use App\Models\TopAds;
use App\Models\SideAds;


class AdminAdsController extends Controller
{
  public function home_ad_show()
  {
    $home_ads = HomeAdvertisment::where('id', 1)->first();
    return view('admin.ads.home', compact('home_ads'));
  }

  public function home_ad_update(Request $request)
  {
    $home_ads = HomeAdvertisment::where('id', 1)->first();

    if ($request->hasFile('above_search_ad')) {

      $request->validate([
        'above_search_ad' => 'image|mimes:jpeg,png,jpg,gif,svg',
      ]);

      unlink(public_path('uploads/' . $home_ads->above_search_ad));
      $ext = $request->file('above_search_ad')->extension();
      $file_name = 'above_search_ad' . '.' . $ext;
      $request->file('above_search_ad')->move(public_path('uploads/'), $file_name);
      $home_ads->above_search_ad = $file_name;
    }

    if ($request->hasFile('above_footer_ad')) {

      $request->validate([
        'above_footer_ad' => 'image|mimes:jpeg,png,jpg,gif,svg',
      ]);

      unlink(public_path('uploads/' . $home_ads->above_footer_ad));
      $ext = $request->file('above_footer_ad')->extension();
      $file_name = 'above_footer_ad' . '.' . $ext;
      $request->file('above_footer_ad')->move(public_path('uploads/'), $file_name);
      $home_ads->above_footer_ad = $file_name;
    }

    $home_ads->above_search_ad_url = $request->above_search_ad_url;
    $home_ads->above_search_ad_status = $request->above_search_ad_status;
    //
    $home_ads->above_footer_ad_url = $request->above_footer_ad_url;
    $home_ads->above_footer_ad_status = $request->above_footer_ad_status;
    $home_ads->update();
    return redirect()->back()->with('success', 'Ads Center & Footer updated successfully');

  }

  public function top_ad_show()
  {
    $top_ads = TopAds::where('id', 1)->first();
    return view('admin.ads.top', compact('top_ads'));
  }

  public function top_ad_update(Request $request)
  {
    $top_ads = TopAds::where('id', 1)->first();

    if ($request->hasFile('top_ad')) {

      $request->validate([
        'top_ad' => 'image|mimes:jpeg,png,jpg,gif,svg',
      ]);

      unlink(public_path('uploads/' . $top_ads->top_ad));
      $ext = $request->file('top_ad')->extension();
      $file_name = 'top_ad' . '.' . $ext;
      $request->file('top_ad')->move(public_path('uploads/'), $file_name);
      $top_ads->top_ad = $file_name;
    }

    $top_ads->top_ad_url = $request->top_ad_url;
    $top_ads->top_ad_status = $request->top_ad_status;
    $top_ads->update();
    return redirect()->back()->with('success', 'Ads Top updated successfully');

  }

  public function side_ad_show()
  {
    $side_ads = SideAds::get();
    return view('admin.ads.side.index', compact('side_ads'));
  }

  public function side_ad_show_create()
  {
    return view('admin.ads.side.add');
  }

  public function side_ad_store(Request $request)
  {


    $request->validate([
      'side_ad' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ],[
      'side_ad.required' => 'Select Photo Ads',
    ]);

    $now = time();
    $ext = $request->file('side_ad')->extension();
    $file_name = 'side_ad_'.$now.'.'.$ext;
    $request->file('side_ad')->move(public_path('uploads/'), $file_name);

    $side_ads_data = new SideAds();
    $side_ads_data->side_ad = $file_name;
    $side_ads_data->side_ad_url = $request->side_ad_url;
    $side_ads_data->side_ad_location = $request->side_ad_location;
    $side_ads_data->save();

    return redirect()->back()->with('success', 'Ads Side created successfully');
  }

  public function side_ad_show_edit($id)
  {
    $side_ads = SideAds::where('id', $id)->first();
    return view('admin.ads.side.edit', compact('side_ads'));
  }

  public function side_ad_update(Request $request, $id)
  {
    $side_ads = SideAds::where('id', $id)->first();

    if ($request->hasFile('side_ad')) {

      $request->validate([
        'side_ad' => 'image|mimes:jpeg,png,jpg,gif,svg',
      ]);

      unlink(public_path('uploads/' . $side_ads->side_ad));
      $now = time();
      $ext = $request->file('side_ad')->extension();
      $file_name = 'side_ad_'.$now.'.'.$ext;
      $request->file('side_ad')->move(public_path('uploads/'), $file_name);
      $side_ads->side_ad = $file_name;
    }

    $side_ads->side_ad_url = $request->side_ad_url;
    $side_ads->side_ad_location = $request->side_ad_location;
    $side_ads->update();

    return redirect()->route('admin_ads_side')->with('success', 'Ads Side updated successfully');
  }

  public function side_ad_show_delet($id)
  {
    $side_ads = SideAds::where('id', $id)->first();

    unlink(public_path('uploads/' . $side_ads->side_ad));

    $side_ads->delete();
    return redirect()->back()->with('success', 'Ads Side deleted successfully');

  }
}
