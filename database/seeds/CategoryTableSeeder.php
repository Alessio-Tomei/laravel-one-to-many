<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['food','cars','animals','news'];

        foreach ($categories as $value) {
            $newCategory = new Category();
            $newCategory->name = $value;
            $newCategory->slug = Str::slug($value);
            $newCategory->save();
        }
    }
}
