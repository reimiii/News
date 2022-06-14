<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\setting;


class SettingSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'news_ticker_total'  => '3',
                'news_ticker_status' => 'Show',
                'video_total'        => '2',
                'video_status'       => 'Show',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ]
        ];

        setting::insert($category);
    }

}
