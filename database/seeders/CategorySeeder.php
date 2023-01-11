<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //
      $category = [
        [
           'name'=>'Social Media',
           
        ],
        [
           'name'=>'Retail Artwork',
         
        ],
        [
           'name'=>'Website / NEXSTMALL',
    
        ],
        [
           'name'=>'SEO',
         
        ],
        [
           'name'=>'Print Ads / Outdoor',
         
        ],
        [
            'name'=>'Content',
      
        ],
        [
            'name'=>'Reporting',
      
        ],
        [
            'name'=>'EDM',
      
        ],
        [
            'name'=>'3rd Party eCommerce',
      
        ],
        [
            'name'=>'Application Support',
      
        ],
        [
            'name'=>'Misc Work',
      
        ],
    ];

    foreach ($category as $key => $value) {
        Category::create($value);
    }
    }
}
