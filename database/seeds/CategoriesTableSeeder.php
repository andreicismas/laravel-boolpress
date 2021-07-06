<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $categories =["car","moto","viaggi","paesi"];
        
        foreach ($categories as  $category) {
        
           $new_category_obj = new Category();
           $new_category_obj->name  = $category;
           $new_category_obj->surname = $category;
           $new_category_obj -> save();
        }
    }
}
