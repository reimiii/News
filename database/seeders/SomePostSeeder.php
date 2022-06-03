<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\Category;


class SomePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category = [
        [
          'category_name' => 'Manga',
          'show_on_menu' => 'Show',
          'category_order' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
          'category_name' => 'Anime',
          'show_on_menu' => 'Show',
          'category_order' => '2',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]
      ];

      $subCategory = [
        [
          'category_id' => '1',
          'sub_category_name' => 'Action',
          'show_on_menu' => 'Show',
          'sub_category_order' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
          'category_id' => '1',
          'sub_category_name' => 'Harem',
          'show_on_menu' => 'Show',
          'sub_category_order' => '2',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
          'category_id' => '2',
          'sub_category_name' => 'Action',
          'show_on_menu' => 'Show',
          'sub_category_order' => '1',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
          'category_id' => '2',
          'sub_category_name' => 'Harem',
          'show_on_menu' => 'Show',
          'sub_category_order' => '2',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
          'category_id' => '2',
          'sub_category_name' => 'Super Power',
          'show_on_menu' => 'Show',
          'sub_category_order' => '3',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ],
      ];

      SubCategory::insert($subCategory);
      Category::insert($category);
    }
}
