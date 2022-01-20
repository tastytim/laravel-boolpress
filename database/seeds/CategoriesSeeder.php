<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['News', 'Computer', 'Storia', 'Cucina', 'Turismo'];
        
        foreach($categories as $key){
            $newCategory = new Category();
            $newCategory->name = $key;
            $newCategory->save();
        }
    }
}
