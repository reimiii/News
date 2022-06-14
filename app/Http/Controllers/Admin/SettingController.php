<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;


class SettingController extends Controller {

    public function index()
    {
        $setting = setting::where('id', 1)->first();

        return view('admin.setting.index', compact('setting'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'news_ticker_total'  => 'required|numeric',
            'news_ticker_status' => 'required',
            'video_total'        => 'required|numeric',
            'video_status'       => 'required',

        ]);

        $setting = setting::where('id', 1)->first();
        $setting->news_ticker_total = $request->news_ticker_total;
        $setting->news_ticker_status = $request->news_ticker_status;
        $setting->video_total = $request->video_total;
        $setting->video_status = $request->video_status;
        $setting->save();

        return redirect()->back()->with('success', 'Setting Updated');
    }

}
